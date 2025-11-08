<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Message;
use App\Models\PostView; // <-- 1. Import PostView
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // <-- 2. Import DB Facade
use Carbon\Carbon; // <-- 3. Import Carbon

class WelcomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan slider postingan terbaru
     * dan hasil pencarian/paginasi.
     */
    public function index(Request $request)
    {
        // 1. Ambil data untuk Slider Berita (5 terbaru)
        $sliderPosts = Post::with(['user.profile'])
                           ->latest()
                           ->take(5)
                           ->get();

        // 2. Ambil Post Terpopuler HARI INI
        $hottestPostToday = Post::with(['user.profile']) // Muat relasi user & profile
            ->whereHas('views', function ($query) { // Cari post yang punya view
                $query->whereDate('post_views.created_at', Carbon::today()); // Hanya view hari ini
            })
            ->withCount(['views' => function ($query) { // Hitung jumlah view HARI INI
                $query->whereDate('created_at', Carbon::today());
            }])
            ->orderByDesc('views_count') // Urutkan berdasarkan jumlah view hari ini
            ->first(); // Ambil satu teratas

        // 3. Query dasar untuk hasil utama (dengan pencarian & paginasi)
        $query = Post::with(['user.profile']);
        if ($request->has('search') && $request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('isi', 'like', "%{$search}%")
                  ->orWhere('topik_utama', 'like', "%{$search}%");
            });
        }
        $posts = $query->latest()->paginate(9); // Hasil utama tetap dipaginasi

        // 4. Kirim semua data ke view 'welcome'
        return view('welcome', compact('posts', 'sliderPosts', 'hottestPostToday'));
    }

    /**
     * Menyimpan pesan kontak baru ke database.
     */
    public function storeContactMessage(Request $request)
    {
        // ... (Logika storeContactMessage Anda tetap sama) ...
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string|max:5000',
        ]);
        Message::create($request->all());
        return back()->with('success', 'Pesan Anda telah terkirim! Terima kasih.');
    }
}