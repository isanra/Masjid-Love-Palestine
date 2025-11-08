<div class="dashboard-topbar">
    <div class="dashboard-toggle">
        <i class="fas fa-bars dashboard-toggle-icon"></i>
    </div>

    <div class="dashboard-search">
        <label class="dashboard-search-label">
            <input type="text" placeholder="Search here" class="dashboard-search-input" />
            <i class="fas fa-search dashboard-search-icon"></i>
        </label>
    </div>

    <a href="{{ route('profile.show', Auth::user()) }}" class="dashboard-user" title="Lihat Profil Publik">
        @php
            $userPhotoPath = Auth::user()->profile?->foto_profil; // Path dari DB, misal: 'profile-photos/foto.jpg'
            $defaultPhotoPath = 'profile-photos/default.jpg';    // Path default Anda

            if ($userPhotoPath && file_exists(public_path($userPhotoPath))) {
                // 1. Gunakan foto spesifik user jika ada di folder public
                $photoUrl = asset($userPhotoPath);
            } else if (file_exists(public_path($defaultPhotoPath))) {
                // 2. Jika tidak ada, gunakan foto default dari folder public
                $photoUrl = asset($defaultPhotoPath);
            } else {
                // 3. Jika semua gagal, gunakan placeholder lama
                $photoUrl = asset('images/placeholder.png'); 
            }
        @endphp
        <img
            src="{{ $photoUrl }}"
            alt="{{ Auth::user()->nama }}"
            class="dashboard-user-image"
        />
    </a>
</div>