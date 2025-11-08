<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Menyimpan komentar baru ke database.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|string|max:2500',
            // Pastikan parent_id adalah angka dan ada di tabel comments (jika diisi)
            'parent_id' => 'nullable|integer|exists:comments,id',
        ]);

        $post->comments()->create([
            'user_id' => Auth::id(),
            'body' => $request->input('body'),
            'parent_id' => $request->input('parent_id'), // Simpan parent_id
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}