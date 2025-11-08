<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\PostView; 
use App\Models\PostLike;
use App\Models\PostShare;
use App\Models\RedeemItem;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard dengan data statistik.
     */
    public function index()
    {
        $user = Auth::user();
        $isMasjid = $user->role === 'masjid';

        // =======================================================
        // ▼▼▼ LOGIKA YANG KITA TAMBAHKAN ▼▼▼
        // =======================================================

        // 1. Ambil Total Poin (untuk ditampilkan di kartu)
        $userPoin = $user->profile->poin ?? 0;

        // 2. Ambil Daftar Hadiah (untuk ditampilkan di kartu)
        // Ambil 2 hadiah termurah sebagai contoh
        $redeemItems = RedeemItem::orderBy('points_cost', 'asc')->take(2)->get();
        
        // =======================================================

        // Inisialisasi semua variabel yang akan dikirim ke view
        $posts = collect();
        $chartLabels = collect();
        $chartValues = collect();
        $postsToday = 0;
        $viewsToday = 0;
        $likesToday = 0;
        $sharesToday = 0;
        $percentageChange = 0;
        $changeDirection = 'no_change';
        $currentWeekViews = 0;
        $savedPosts = collect(); 

        if ($isMasjid) {
            // ... (sisa logika Anda untuk masjid tetap sama) ...
            $posts = $user->posts()->oldest()->get();
            $postIds = $posts->pluck('id');
            if ($postIds->isNotEmpty()) {
                $dates = collect();
                for ($i = 6; $i >= 0; $i--) { $dates->push(Carbon::now()->subDays($i)->format('Y-m-d')); }
                $viewsData = DB::table('post_views')->join('posts', 'post_views.post_id', '=', 'posts.id')->where('posts.user_id', $user->id)->where('post_views.created_at', '>=', Carbon::now()->subDays(6)->startOfDay())->select(DB::raw('DATE(post_views.created_at) as date'), DB::raw('COUNT(post_views.id) as total_views'))->groupBy('date')->orderBy('date')->get()->keyBy('date');
                $chartData = $dates->map(function ($date) use ($viewsData) { return $viewsData->get($date)->total_views ?? 0; });
                $chartLabels = $dates->map(function ($date) { return Carbon::parse($date)->format('d M'); });
                $chartValues = $chartData->values();
                $currentWeekViews = $chartValues->sum();
                $previousWeekViews = DB::table('post_views')->join('posts', 'post_views.post_id', '=', 'posts.id')->where('posts.user_id', $user->id)->whereBetween('post_views.created_at', [Carbon::now()->subDays(13)->startOfDay(), Carbon::now()->subDays(7)->endOfDay()])->count();
                if ($previousWeekViews > 0) {
                    $percentageChange = (($currentWeekViews - $previousWeekViews) / $previousWeekViews) * 100;
                    if ($percentageChange > 0) $changeDirection = 'increase';
                    elseif ($percentageChange < 0) $changeDirection = 'decrease';
                } elseif ($currentWeekViews > 0) { $changeDirection = 'new'; $percentageChange = 100; }
                $postsToday = Post::where('user_id', $user->id)->whereDate('created_at', Carbon::today())->count();
                $viewsToday = PostView::whereIn('post_id', $postIds)->whereDate('created_at', Carbon::today())->count();
                $likesToday = PostLike::whereIn('post_id', $postIds)->whereDate('created_at', Carbon::today())->count();
                $sharesToday = PostShare::whereIn('post_id', $postIds)->whereDate('created_at', Carbon::today())->count();
            }
        } else {
            $savedPosts = $user->savedPosts()->with(['user.profile'])->latest()->paginate(10);
        }

        // Kirim SEMUA data ke view
        return view('dashboard.dashboard', [
            'posts' => $posts,
            'chartLabels' => $chartLabels,
            'chartValues' => $chartValues,
            'postsToday' => $postsToday,
            'viewsToday' => $viewsToday,
            'likesToday' => $likesToday,
            'sharesToday' => $sharesToday,
            'percentageChange' => round($percentageChange),
            'changeDirection' => $changeDirection,
            'currentWeekViews' => $currentWeekViews,
            'savedPosts' => $savedPosts, 
            'isMasjid' => $isMasjid,
            
            // --- Variabel Baru yang Kita Kirim ---
            'userPoin' => $userPoin,
            'redeemItems' => $redeemItems
        ]);
    }

    /**
     * Method alternatif untuk mendapatkan data chart via AJAX
     */
    public function getChartData(Request $request)
    {
        $user = Auth::user();
        $isMasjid = $user->role === 'masjid';

        $days = $request->get('days', 7); // Default 7 hari
        
        $dates = collect();
        for ($i = $days - 1; $i >= 0; $i--) {
            $dates->push(Carbon::now()->subDays($i)->format('Y-m-d'));
        }

        $viewsQuery = DB::table('post_views')
            ->join('posts', 'post_views.post_id', '=', 'posts.id')
            ->where('post_views.created_at', '>=', Carbon::now()->subDays($days)->startOfDay());

        if ($isMasjid) {
            $viewsQuery->where('posts.user_id', $user->id);
        }

        $viewsData = $viewsQuery
            ->select(
                DB::raw('DATE(post_views.created_at) as date'),
                DB::raw('COUNT(post_views.id) as total_views')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $chartData = $dates->map(function ($date) use ($viewsData) {
            return $viewsData->has($date) ? $viewsData->get($date)->total_views : 0;
        });

        return response()->json([
            'labels' => $dates->map(function ($date) {
                return Carbon::parse($date)->format('d M');
            })->values(),
            'values' => $chartData->values(),
        ]);
    }

    /**
     * Method untuk mendapatkan statistik ringkas
     */
    public function getStats()
    {
        $user = Auth::user();
        
        
        if ($user->role !== 'masjid') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $stats = [
            'total_posts' => $user->posts()->count(),
            'total_views' => $user->posts()->sum('views_count'),
            'total_likes' => DB::table('post_likes')
                ->join('posts', 'post_likes.post_id', '=', 'posts.id')
                ->where('posts.user_id', $user->id)
                ->count(),
            'total_comments' => DB::table('comments')
                ->join('posts', 'comments.post_id', '=', 'posts.id')
                ->where('posts.user_id', $user->id)
                ->count(),
        ];

        return response()->json($stats);
    }
}