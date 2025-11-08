<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostView;
use App\Models\PostShare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Menampilkan form untuk membuat post baru.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'masjid') {
            return redirect()->route('dashboard')->with('error', 'Hanya masjid yang dapat mengakses halaman unggahan.');
        }

        $filter = $request->input('filter', 'terbaru'); 

        // Query dasar untuk tabel utama
        $postsQuery = $user->posts(); 

        // Terapkan pengurutan
        if ($filter === 'populer') {
            $postsQuery->orderByDesc('views_count');
        } else { // 'terbaru' atau 'semua' (default)
            $postsQuery->latest();
        }

        // =======================================================
        // UBAH PAGINATE MENJADI 6
        // =======================================================
        $posts = $postsQuery->paginate(6)->withQueryString(); // Tampilkan 6 post per halaman
        // =======================================================

        // Ambil 3 KONTEN terpopuler (tidak berubah)
        $popularPosts = $user->posts()
                             ->orderByDesc('views_count')
                             ->take(3)
                             ->get();
        
        $totalShares = 0; 
        $postIds = $user->posts->pluck('id'); // Ambil ID postingan
        if ($postIds->isNotEmpty()) {
        $totalShares = PostShare::whereIn('post_id', $postIds)->count();
        }

        // Kirim semua data ke view
        return view('dashboard.unggahan', compact('posts', 'popularPosts', 'filter', 'totalShares'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'masjid') {
            abort(403, 'UNAUTHORIZED ACTION.');
        }
        return view('posts.create');
    }

    /**
     * Menyimpan post baru ke database.
     */
     public function store(Request $request)
    {
        if (Auth::user()->role !== 'masjid') {
            abort(403, 'UNAUTHORIZED ACTION.');
        }

        $validated = $request->validate([
            'judul' => 'required|string|max:255|unique:posts,judul',
            'type' => 'required|in:artikel,video',
            // Thumbnail sekarang hanya wajib jika tidak ada video_url
            'thumbnail' => 'required_without:video_url|nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'isi' => 'required|string',
            'video_url' => 'nullable|url',
            'topik_utama' => 'required|string|max:255',
        ]);

        $thumbnailPath = null;

        // PRIORITAS 1: Jika pengguna mengunggah file kustom, gunakan itu.
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('post-thumbnails', 'public');
        } 
        // PRIORITAS 2: Jika tidak ada file, tapi ada link video, coba ambil thumbnail dari YouTube.
        elseif ($request->filled('video_url')) {
            $thumbnailPath = $this->getYoutubeThumbnailUrl($request->video_url);
        }

        // Jika thumbnail masih null (misalnya URL video bukan YouTube), dan tipenya artikel, validasi akan gagal.
        // Jika tipenya video dan URL thumbnail gagal diambil, kita bisa siapkan fallback.
        if (is_null($thumbnailPath) && $validated['type'] === 'video') {
            // Anda bisa set gambar default di sini jika mau
            $thumbnailPath = 'path/to/default-video-thumbnail.jpg'; 
        }

        // Buat slug yang unik
        $slug = Str::slug($validated['judul']);
        $count = Post::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

         $post = Post::create([
            'user_id' => Auth::id(),
            'judul' => $validated['judul'],
            'slug' => $slug,
            'type' => $validated['type'],
            'thumbnail' => $thumbnailPath,
            'isi' => $validated['isi'],
            'video_url' => $validated['video_url'],
            'topik_utama' => $validated['topik_utama'],
        ]);
        
         return redirect()->route('posts.show', $post)->with('success', 'Postingan berhasil dibuat!');
    }

    /**
     * Helper function untuk mendapatkan URL thumbnail dari link YouTube.
     * @param string $youtubeUrl
     * @return string|null
     */
    private function getYoutubeThumbnailUrl(string $youtubeUrl): ?string
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtubeUrl, $match);
        $videoId = $match[1] ?? null;

        if ($videoId) {
            // hqdefault adalah resolusi 720p, maxresdefault adalah kualitas tertinggi
            return "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
        }

        return null;
    }

    /**
     * Menampilkan satu post.
     */
    public function show(Post $post)
    {
        $viewedPosts = session()->get('viewed_posts', []);

        if (!in_array($post->id, $viewedPosts)) {

            $post->increment('views_count');
            session()->push('viewed_posts', $post->id);
            $post->refresh();

            // --- LOGIKA POIN BARU ---
            $authorProfile = $post->user->profile;
            if ($authorProfile) {
                // 1. Tambah 1 view ke counter
                $authorProfile->increment('unredeemed_views');

                // 2. Cek apakah sudah mencapai 50
                if ($authorProfile->unredeemed_views >= 50) {
                    // 3. Tambah 1 poin
                    $authorProfile->increment('poin');
                    // 4. Reset counter views ke 0
                    $authorProfile->unredeemed_views = 0;
                }
                // 5. Simpan perubahan ke database
                $authorProfile->save();
            }
        }

        return view('posts.show', compact('post'));
    }

    public function recordShare(Request $request, Post $post)
    {
        // Validasi sederhana (opsional)
        $request->validate(['platform' => 'nullable|string|max:50']);

        PostShare::create([
            'post_id' => $post->id,
            'user_id' => Auth::id(), // Akan null jika tamu
            'ip_address' => $request->ip(),
            'platform' => $request->input('platform'),
        ]);
        return response()->json(['success' => true, 'message' => 'Share recorded.']);
    }

    /**
     * Get chart data for dashboard
     */
    public function getChartData()
    {
        if (Auth::user()->role !== 'masjid') {
            abort(403, 'UNAUTHORIZED ACTION.');
        }

        // Ambil data 7 hari terakhir
        $startDate = now()->subDays(6)->startOfDay();
        $endDate = now()->endOfDay();

        $chartData = PostView::whereHas('post', function($query) {
                $query->where('user_id', Auth::id());
            })
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as views')
            )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Format data untuk chart
        $labels = [];
        $values = [];

        // Isi data untuk 7 hari terakhir (termasuk hari dengan 0 view)
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $labels[] = now()->subDays($i)->format('d M');
            
            $dataForDate = $chartData->firstWhere('date', $date);
            $values[] = $dataForDate ? $dataForDate->views : 0;
        }

        return [
            'labels' => $labels,
            'values' => $values
        ];
    }

    /**
     * Handle a like/unlike request for a post.
     */
    public function toggleLike(Post $post)
    {
        $user = Auth::user();
        $post->likes()->toggle($user->id);
        $post->update(['likes_count' => $post->likes()->count()]);
        return back();
    }

    /**
     * Handle a save/unsave request for a post.
     */
    public function toggleSave(Post $post)
    {
        Auth::user()->savedPosts()->toggle($post->id);
        return back();
    }
}