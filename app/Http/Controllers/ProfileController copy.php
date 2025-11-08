<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage; // Import Storage facade
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    
    public function show(Request $request, User $user): View
    {
        $filter = $request->input('filter', 'terbaru');
        $posts = collect(); // Inisialisasi $posts
        $savedPosts = collect(); // Inisialisasi $savedPosts
        $user->load('profile', 'posts');

        if ($user->role === 'masjid') {
            // Jika masjid, ambil postingan yang MEREKA BUAT
            $postsQuery = $user->posts(); 
            if ($filter === 'populer') {
                $postsQuery->orderByDesc('views_count');
            } elseif ($filter === 'terlama') {
                $postsQuery->oldest();
            } else {
                $postsQuery->latest();
            }
            $posts = $postsQuery->paginate(9)->withQueryString(); 
        
        } elseif ($user->role === 'pembaca') {
            // Jika pembaca, ambil postingan yang MEREKA SIMPAN
            // Gunakan nama 'savedPage' agar paginasi tidak konflik
            $savedPosts = $user->savedPosts()->paginate(9, ['*'], 'savedPage');
        }

        return view('user-profile.profile', [
            'user' => $user,
            'posts' => $posts, 
            'savedPosts' => $savedPosts,
            'filter' => $filter, 
        ]);
    }

    public function edit(Request $request): View
{
    // Ambil data post milik user, diurutkan dari yang paling lama (asc)
    $posts = $request->user()->posts()->oldest()->get();
    // BARU: Ambil data post yang disimpan user
    $savedPosts = $request->user()->savedPosts;

    return view('dashboard.profile-edit', [
        'user' => $request->user(),
        'posts' => $posts,
        'savedPosts' => $savedPosts, // Kirim data savedPosts ke view
    ]);
}

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        $profileData = $request->validate([
            'nama_belakang' => ['string', 'max:255', 'nullable'],
            'no_telp' => ['string', 'max:20', 'nullable'],
            'bio' => ['string', 'nullable'],
            'foto_profil' => ['image', 'mimes:jpg,jpeg,png', 'max:2048', 'nullable'],
            'banner_image' => ['image', 'mimes:jpg,jpeg,png', 'max:2048', 'nullable'],
            'lokasi_maps'   => ['url', 'nullable'],
        ]);

        // === LOGIKA UPLOAD FOTO PROFIL DIUBAH ===
        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filename = $file->hashName(); // Mendapat nama unik (misal: aBc123.jpg)
            $destinationPath = public_path('profile-photos'); // Tujuan: public/profile-photos

            // Hapus foto lama jika ada (dari folder public)
            if ($request->user()->profile && $request->user()->profile->foto_profil) {
                $oldPath = public_path($request->user()->profile->foto_profil);
                if (file_exists($oldPath)) {
                    @unlink($oldPath); // Hapus file lama dari public
                }
            }
            
            // Pindahkan file baru ke public/profile-photos
            $file->move($destinationPath, $filename);
            
            // Simpan path relatif ke database
            $profileData['foto_profil'] = 'profile-photos/' . $filename;
        }

        // === LOGIKA UPLOAD BANNER DIUBAH ===
        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = $file->hashName();
            $destinationPath = public_path('banner-images'); // Tujuan: public/banner-images

            // Hapus banner lama jika ada (dari folder public)
            if ($request->user()->profile && $request->user()->profile->banner_image) {
                $oldPath = public_path($request->user()->profile->banner_image);
                if (file_exists($oldPath)) {
                    @unlink($oldPath); // Hapus file lama dari public
                }
            }
            
            // Pindahkan file baru ke public/banner-images
            $file->move($destinationPath, $filename);
            
            // Simpan path relatif ke database
            $profileData['banner_image'] = 'banner-images/' . $filename;
        }

        // Simpan atau update data ke tabel 'profiles'
        $request->user()->profile()->updateOrCreate(
            ['user_id' => $request->user()->id],
            $profileData
        );

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    
    
}
