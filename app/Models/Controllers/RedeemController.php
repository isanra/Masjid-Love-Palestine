<?php

namespace App\Http\Controllers;

use App\Models\RedeemItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedeemController extends Controller
{
    /**
     * Menampilkan halaman katalog redeem dan histori.
     */
    public function index(Request $request) // <-- TAMBAHKAN Request $request
    {
        $user = Auth::user();

        // 1. Ambil semua kategori unik yang aktif
        $categories = RedeemItem::where('is_active', true)
                            ->whereNotNull('category')
                            ->select('category')
                            ->distinct()
                            ->pluck('category');

        // 2. Mulai query untuk item
        $itemsQuery = RedeemItem::where('is_active', true)
                            ->orderBy('points_cost');

        // 3. Filter berdasarkan kategori JIKA ada di URL (?category=...)
        if ($request->has('category') && $request->category != '') {
            $itemsQuery->where('category', $request->category);
        }

        // 4. Eksekusi query
        $items = $itemsQuery->get();
        
        // Ambil histori penukaran poin
        $histories = $user->redeemHistories()->with('redeemItem')->latest()->paginate(10);

        // 5. Kirim data baru (termasuk $categories) ke view
        return view('dashboard.redeem', compact(
            'user', 
            'items', 
            'histories', 
            'categories' // <-- KIRIM KATEGORI KE VIEW
        ));
    }

    /**
     * Memproses permintaan penukaran item.
     */
    public function store(Request $request)
    {
        $request->validate(['redeem_item_id' => 'required|exists:redeem_items,id']);

        $user = Auth::user();
        $item = RedeemItem::findOrFail($request->redeem_item_id);

        // Cek apakah poin mencukupi
        if ($user->profile->poin < $item->points_cost) {
            return back()->with('error', 'Poin Anda tidak mencukupi untuk menukar item ini.');
        }

        // Kurangi poin & Catat ke histori
        $user->profile->decrement('poin', $item->points_cost);
        
        $user->redeemHistories()->create([
            'redeem_item_id' => $item->id,
            'points_redeemed' => $item->points_cost,
        ]);

        return back()->with('success', "Anda berhasil menukar item: {$item->name}!");
    }
}
