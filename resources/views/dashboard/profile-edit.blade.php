<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profil - Dashboard User</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    {{-- CSRF Token for JavaScript --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
  
<body class="min-h-screen bg-gray-50 dashboard-body">
    <div class="dashboard-container">
        @include('components.dashboard-navigation')

        <div class="dashboard-main-content">
            @include('components.dashboard-topbar')

            <div class="dashboard-content">
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Profil</h1>
                    <p class="text-gray-600">Kelola informasi profil dan preferensi akun Anda</p>
                </div>

                @if (session('status') === 'profile-updated')
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Sukses!</strong>
                        <span class="block sm:inline">Informasi profil berhasil diperbarui.</span>
                    </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                    <div class="dashboard-card">
                        <h2 class="dashboard-card-title">Foto Profil</h2>
                        <div class="text-center">
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
                              id="profileImagePreview" {{-- ID untuk preview JS --}}
                              src="{{ $photoUrl }}"
                              alt="{{ $user->name }}" {{-- Alt text dinamis --}}
                              class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-gray-200 object-cover" {{-- Border disesuaikan --}}
                            />
                            {{-- Tombol upload ada di form bawah --}}
                            <p class="text-xs text-gray-500 mt-4">Upload foto baru di bagian "Informasi Profil".</p>
                            {{-- Tombol Hapus Foto (memerlukan logika backend tambahan) --}}
                            {{-- <button class="dashboard-button dashboard-button-danger w-full mt-2">
                                <i class="fas fa-trash dashboard-button-icon"></i>Hapus Foto
                            </button> --}}
                        </div>
                    </div>

                    <div class="dashboard-card">
                        <h2 class="dashboard-card-title">Banner Profil</h2>
                        <div class="mb-4">
                            @php
                                $defaultBannerPath = 'banner-images/default-banner.jpeg'; // Path di public
                                $userBannerPath = $user->profile?->banner_image; // Path dari DB, misal: 'banner-images/banner.jpg'
                                $bannerUrl = asset('images/placeholder-banner.png'); // Fallback

                                if ($userBannerPath && file_exists(public_path($userBannerPath))) {
                                    // 1. Gunakan banner spesifik user jika ada di folder public
                                    $bannerUrl = asset($userBannerPath);
                                } else if (file_exists(public_path($defaultBannerPath))) {
                                    // 2. Jika tidak ada, gunakan banner default dari folder public
                                    $bannerUrl = asset($defaultBannerPath);
                                }
                                // 3. Jika semua gagal, $bannerUrl akan tetap 'images/placeholder-banner.png'
                            @endphp
                            
                            {{-- Tampilkan Pratinjau Banner --}}
                            <div class="h-32 bg-gray-200 rounded-xl mb-4 overflow-hidden">
                                <img src="{{ $bannerUrl }}" alt="Banner" class="w-full h-full object-cover" id="bannerPreview" />
                            </div>
                            
                            {{-- Input file ini HARUS menjadi bagian dari form utama di bawah --}}
                            {{-- Jadi, kita akan pindahkan input ini ke dalam <form> --}}
                            <p class="text-center text-sm text-gray-500">Ubah banner di form "Informasi Profil" di bawah.</p>
                        </div>
                    </div>

                    <div class="dashboard-card">
                        <h2 class="dashboard-card-title">Statistik Akun</h2>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg border">
                                <span class="text-sm text-gray-600">Bergabung Sejak</span>
                                {{-- Tampilkan tanggal bergabung dinamis --}}
                                <span class="font-semibold">{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</span> 
                            </div>
                             {{-- Statistik ini hanya relevan untuk masjid --}}
                             @if($user->role == 'masjid') 
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg border">
                                <span class="text-sm text-gray-600">Total Konten</span>
                                {{-- Tampilkan jumlah post dinamis --}}
                                <span class="font-semibold text-gray-800">{{ $posts->count() ?? 0 }}</span> 
                            </div>
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg border">
                                <span class="text-sm text-gray-600">Total Poin</span>
                                {{-- Tampilkan poin dinamis --}}
                                <span class="font-semibold text-indigo-600">{{ number_format($user->profile?->poin ?? 0) }}</span> 
                            </div>
                             <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg border">
                                <span class="text-sm text-gray-600">Views Belum Jadi Poin</span>
                                {{-- Tampilkan unredeemed views dinamis --}}
                                <span class="font-semibold text-gray-800">{{ number_format($user->profile?->unredeemed_views ?? 0) }}</span> 
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="dashboard-card mb-8">
                    <h2 class="dashboard-card-title">Informasi Profil</h2>
                    {{-- Form mengarah ke route 'profile.update' --}}
                    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="dashboard-profile-form mt-6 space-y-6"> 
                        @csrf
                        @method('patch')

                        {{-- Nama Depan (dari tabel users) --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="dashboard-form-group">
                                <label for="name" class="dashboard-form-label">Nama Depan</label>
                                <input type="text" id="name" name="name" class="dashboard-form-input" value="{{ old('name', $user->name) }}" placeholder="Masukkan nama depan" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-600" />
                            </div>

                            {{-- Nama Belakang (dari tabel profiles) --}}
                            <div class="dashboard-form-group">
                                <label for="nama_belakang" class="dashboard-form-label">Nama Belakang</label>
                                <input type="text" id="nama_belakang" name="nama_belakang" class="dashboard-form-input" value="{{ old('nama_belakang', $user->profile?->nama_belakang) }}" placeholder="Masukkan nama belakang (opsional)" />
                                <x-input-error :messages="$errors->get('nama_belakang')" class="mt-1 text-xs text-red-600" />
                            </div>
                        </div>

                        {{-- Email (dari tabel users) --}}
                         <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="dashboard-form-group">
                                 <label for="email" class="dashboard-form-label">Email</label>
                                 <input type="email" id="email" name="email" class="dashboard-form-input" value="{{ old('email', $user->email) }}" placeholder="Masukkan alamat email" required />
                                 <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-600" />
                                 {{-- Kode verifikasi email jika diperlukan --}}
                                 @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div class="mt-2 text-sm text-yellow-800">
                                        Email Anda belum diverifikasi.
                                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                             Kirim ulang email verifikasi.
                                        </button>
                                         @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600">
                                                Link verifikasi baru telah dikirim.
                                            </p>
                                        @endif
                                    </div>
                                    <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="hidden">@csrf</form>
                                 @endif
                            </div>

                            {{-- Nomor Telepon (dari tabel profiles) --}}
                            <div class="dashboard-form-group">
                                 <label for="no_telp" class="dashboard-form-label">Nomor Telepon</label>
                                 <input type="tel" id="no_telp" name="no_telp" class="dashboard-form-input" value="{{ old('no_telp', $user->profile?->no_telp) }}" placeholder="Masukkan nomor telepon (opsional)" />
                                 <x-input-error :messages="$errors->get('no_telp')" class="mt-1 text-xs text-red-600" />
                            </div>
                        </div>
                        
                        {{-- Lokasi Maps (dari tabel profiles) --}}
                        <div class="dashboard-form-group">
                             <label for="lokasi_maps" class="dashboard-form-label">Link Lokasi Google Maps</label>
                             <input type="url" id="lokasi_maps" name="lokasi_maps" class="dashboard-form-input" value="{{ old('lokasi_maps', $user->profile?->lokasi_maps) }}" placeholder="Tempel link Google Maps di sini (opsional)" />
                             <x-input-error :messages="$errors->get('lokasi_maps')" class="mt-1 text-xs text-red-600" />
                        </div>

                        {{-- Bio / Deskripsi (dari tabel profiles) --}}
                        <div class="dashboard-form-group">
                             <label for="bio" class="dashboard-form-label">Bio / Deskripsi</label>
                             <textarea id="bio" name="bio" class="dashboard-form-input dashboard-form-textarea" rows="3" placeholder="Ceritakan tentang diri atau organisasi Anda (opsional)">{{ old('bio', $user->profile?->bio) }}</textarea>
                             <x-input-error :messages="$errors->get('bio')" class="mt-1 text-xs text-red-600" />
                        </div>
                        
                        {{-- TAMBAHKAN INPUT FILE BANNER DI SINI --}}
                        <div class="dashboard-form-group">
                             <label for="banner_image" class="dashboard-form-label">Ganti Banner Profil</label>
                             <input type="file" id="banner_image" name="banner_image" accept="image/png, image/jpeg, image/jpg" onchange="previewBanner(this)" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                             <p class="mt-1 text-xs text-gray-500">Rekomendasi: 1200x300px. Maks 2MB.</p>
                             <x-input-error :messages="$errors->get('banner_image')" class="mt-1 text-xs text-red-600" />
                        </div>

                        {{-- Upload Foto Profil --}}
                        <div class="dashboard-form-group">
                             <label for="foto_profil" class="dashboard-form-label">Ganti Foto Profil</label>
                             <input type="file" id="foto_profil" name="foto_profil" accept="image/png, image/jpeg, image/jpg" onchange="previewProfileImage(this)" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                             <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG. Maksimal 2MB.</p>
                             <x-input-error :messages="$errors->get('foto_profil')" class="mt-1 text-xs text-red-600" />
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 justify-end mt-6">
                            {{-- Tombol Batal bisa disesuaikan href-nya --}}
                            <a href="{{ route('dashboard') }}" class="dashboard-button dashboard-button-secondary order-2 sm:order-1 text-center">Batal</a>
                            <button type="submit" class="dashboard-button dashboard-button-primary order-1 sm:order-2">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>

                {{-- Bagian Security Settings & Delete Account dari Breeze --}}
                 <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8">
                     <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dashboard-card">
                         <div class="max-w-xl">
                             @include('profile.partials.update-password-form')
                         </div>
                     </div>
                     <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dashboard-card">
                         <div class="max-w-xl">
                              @include('profile.partials.delete-user-form')
                         </div>
                     </div>
                 </div>

            </div>
        </div>
    </div>

    {{-- Script JavaScript Anda (modal, dll.) --}}
    <script>
      // ... (Kode JavaScript Anda untuk modal, preview banner, dll. tetap di sini) ...

      // Script untuk preview foto profil
      function previewProfileImage(input) {
        const preview = document.getElementById('profileImagePreview');
        if (input.files && input.files[0]) {
          const reader = new FileReader();
          reader.onload = function(e) {
            preview.src = e.target.result;
          }
          reader.readAsDataURL(input.files[0]);
        }
      }

      // Script untuk Modal Hapus Akun (Jika menggunakan partial Breeze)
      document.addEventListener("DOMContentLoaded", function () {
          // --- Logika Modal Hapus Akun (BARU) ---
          const openButton = document.getElementById('openDeleteModalButton');
          const deleteModal = document.getElementById('deleteModal');
          const cancelButton = document.getElementById('cancelDelete');
          const confirmButton = document.getElementById('confirmDelete');
          
          // Form asli dari Breeze
          const deleteUserForm = document.getElementById('deleteUserForm');
          // Input password asli dari Breeze
          const passwordInput = document.getElementById('password_delete');
          // Kontainer di modal kustom kita
          const passwordContainer = document.getElementById('passwordInputContainer');

          if (openButton && deleteModal && cancelButton && confirmButton && deleteUserForm && passwordInput && passwordContainer) {
              
              // 1. Pindahkan input password ke dalam modal kustom
              passwordContainer.appendChild(passwordInput);

              // 2. Tampilkan modal saat tombol "Hapus Akun" diklik
              openButton.addEventListener('click', function(event) {
                  event.preventDefault(); 
                  deleteModal.style.display = 'flex';
              });

              // 3. Sembunyikan modal saat tombol "Batal" diklik
              cancelButton.addEventListener('click', function() {
                  deleteModal.style.display = 'none';
                  passwordInput.value = ''; // Kosongkan password
              });
              
              // 4. Submit form asli saat tombol "Konfirmasi" diklik
              confirmButton.addEventListener('click', function() {
                  // Kita submit form Breeze yang asli
                  deleteUserForm.submit();
              });

              // 5. Tutup modal jika klik di luar area
              window.addEventListener("click", function (event) {
                  if (event.target === deleteModal) {
                      deleteModal.style.display = 'none';
                      passwordInput.value = ''; // Kosongkan password
                  }
              });
          }
      });
    </script>

    <div id="deleteModal" class="dashboard-redeem-modal" style="display: none;">
      <div class="dashboard-redeem-modal-content">
        <div class="text-center mb-4">
          <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-exclamation-triangle text-red-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Konfirmasi Hapus Akun</h3>
          <p class="text-gray-600 mb-4">
            Ini adalah tindakan permanen. Masukkan password Anda untuk mengonfirmasi.
          </p>
        </div>
        
        <div id="passwordInputContainer" class="mb-6">
            </div>

        <div class="flex space-x-3">
          <button id="cancelDelete" class="dashboard-button flex-1 bg-white border border-gray-300 text-gray-700 hover:bg-gray-50">
            Batal
          </button>
          <button id="confirmDelete" class="dashboard-button flex-1 dashboard-button-danger">
            Ya, Hapus Akun Saya
          </button>
        </div>
      </div>
    </div>
</body>
</html>