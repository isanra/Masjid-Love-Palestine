<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User - Masjid Hawariyyin</title>
    
    <!-- Include Laravel Breeze Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    
    <style>
        .tag {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        .tag-humanitarian {
            background-color: #fef3c7;
            color: #92400e;
        }
        .tag-education {
            background-color: #dbeafe;
            color: #1e40af;
        }
        .tag-health {
            background-color: #dcfce7;
            color: #166534;
        }
        .post-card {
            transition: all 0.3s ease;
        }
        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50 md:px-10 font-sans">
    <!-- Navigation Bar -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 max-w-7xl mt-10">
        <!-- Profile Section -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden mb-8">
            <!-- Bagian atas dengan background image 50% tinggi -->
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
            <div class="h-48 bg-cover bg-center relative" style="background-image: url('{{ $bannerUrl }}')">
                <!-- Overlay untuk membuat teks lebih terbaca -->
                <div class="absolute inset-0 bg-black/20"></div>
                
                <!-- Pattern liquid effect overlay -->
                <div class="absolute inset-0 opacity-30">
                    <div class="w-full h-full bg-gradient-to-br from-emerald-400/50 to-blue-500/50 rounded-b-full transform scale-150"></div>
                </div>
            </div>
            
            <!-- Bagian bawah putih -->
            <div class="bg-white p-6 pt-20 relative">
                <div class="absolute -top-20 left-1/2 transform -translate-x-1/2">
                    <div class="relative">
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
                            alt="{{ $user->name }}" {{-- alt text dinamis --}}
                            class="w-32 h-32 rounded-full object-cover border-8 border-white "
                        />
                        
                    </div>
                </div>

                <!-- Informasi stats dan nama -->
                <div class="text-center mb-8 mt-1">
                    <!-- Stats -->
                    <div class="flex justify-center items-center text-gray-600 text-sm mb-2">
                        <span class="font-semibold">{{ $posts->count() }} Postingan</span>
                    </div>
                    <!-- Nama -->
                    <h1 class="text-2xl font-bold text-gray-900">{{ trim($user->name . ' ' . $user->profile?->nama_belakang) }}</h1>
                </div>

                <!-- Informasi kontak horizontal -->
                <div class="flex flex-col md:flex-row justify-center items-center gap-6 md:gap-12 text-gray-700">
                    <!-- Email -->
                    <div class="flex items-center gap-2">
                        <i class="fas fa-envelope text-emerald-600 w-5"></i>
                        <span class="text-sm font-medium">{{ $user->email }}</span>
                    </div>
                    
                    <!-- Phone -->
                    <div class="flex items-center gap-2">
                        <i class="fas fa-phone text-emerald-600 w-5"></i>
                        <span class="text-sm font-medium">{{ $user->profile?->no_telp ?? 'Belum diatur' }}</span>
                    </div>
                    
                    <!-- Location -->
                    <div class="flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-emerald-600 w-5"></i>
                        @if ($user->profile?->lokasi_maps)
                        <a href="{{ $user->profile->lokasi_maps }}" target="_blank" class="text-sm font-medium text-blue-600 hover:underline">
                            Lihat di Peta
                        </a>
                         @else
                             <span class="text-sm font-medium text-gray-400">Belum diatur</span>
                         @endif
                    </div>
                </div>
            </div>
        </div>

            <div class="mb-8">

                {{-- ============================================= --}}
                {{-- TAMPILAN JIKA USER ADALAH MASJID --}}
                {{-- ============================================= --}}
                @if ($user->role === 'masjid')

                    <div class="mb-10">
                        <div class="flex items-center mb-5">
                            <h2 class="text-4xl font-bold text-gray-800 mr-4">Postingan</h2>
                            <hr class="flex-1 mt-2 h-0.5 bg-gray-800 rounded-full">
                        </div>

                        @php
                            // Definisikan kelas CSS untuk tombol filter
                            $activeFilterClasses = 'text-white text-base font-medium mb-3 bg-red-600 px-3 py-1 rounded-5xl shadow-md';
                            $inactiveFilterClasses = 'text-gray-700 text-base font-medium mb-3 bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded-5xl transition-colors';
                        @endphp

                        <div class="flex space-x-3">
                            <a href="{{ route('user-profile.show', ['user' => $user, 'filter' => 'populer']) }}"
                               class="{{ $filter === 'populer' ? $activeFilterClasses : $inactiveFilterClasses }}">
                               Populer
                            </a>
                            <a href="{{ route('user-profile.show', ['user' => $user, 'filter' => 'terbaru']) }}"
                               class="{{ $filter === 'terbaru' ? $activeFilterClasses : $inactiveFilterClasses }}">
                               Terbaru
                            </a>
                            <a href="{{ route('user-profile.show', ['user' => $user, 'filter' => 'terlama']) }}"
                               class="{{ $filter === 'terlama' ? $activeFilterClasses : $inactiveFilterClasses }}">
                               Terlama
                            </a>
                        </div>
                    </div>

                    <div class="space-y-6">
                        {{-- Loop dari $posts --}}
                        @forelse ($posts as $post)
                            <a href="{{ route('posts.show', $post) }}" class="block border-b border-gray-200 pb-8 mb-8 group">
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full md:w-2/5 mb-4 md:mb-0">
                                        @php
                                            $thumbnailUrl = Str::startsWith($post->thumbnail, 'http') 
                                                ? $post->thumbnail 
                                                : Storage::url($post->thumbnail);
                                        @endphp
                                        <img src="{{ $thumbnailUrl }}" alt="{{ $post->judul }}" class="w-full h-56 object-cover rounded-2xl shadow-lg" />
                                    </div>

                                    <div class="w-full md:w-3/5 md:pl-6">
                                        @php $tags = explode(',', $post->topik_utama); @endphp
                                        <span class="text-indigo-600 text-sm font-medium block mb-1">{{ trim($tags[0]) }}</span>
                                        <h3 class="text-2xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">{{ $post->judul }}</h3>
                                        <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
                                            {{ Str::words(strip_tags($post->isi), 30, '...') }}
                                        </p>
                                        <div class="flex items-center space-x-6 text-gray-500 text-sm">
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                                <span>{{ $post->views_count ?? 0 }} Views</span>
                                            </div>
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                                                <span>{{ $post->likes_count ?? 0 }} Likes</span> {{-- Perbaikan: likes_count --}}
                                            </div>
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                <span>{{ $post->created_at->diffForHumans() }}</span> {{-- Waktu dinamis --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="col-span-3 text-center text-gray-500 py-10 bg-gray-50 rounded-lg">
                                <p>Pengguna ini belum membuat postingan.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-12">
                        {{ $posts->links() }}
                    </div>

                @elseif ($user->role === 'pembaca')

                    {{-- ============================================= --}}
                    {{-- TAMPILAN JIKA USER ADALAH PEMBACA --}}
                    {{-- ============================================= --}}

                    <div class="mb-10">
                        <div class="flex items-center mb-5">
                            <h2 class="text-4xl font-bold text-gray-800 mr-4">Konten yang Disimpan</h2>
                            <hr class="flex-1 mt-2 h-0.5 bg-gray-800 rounded-full">
                        </div>
                        <p class="text-gray-600">Daftar artikel dan video yang telah disimpan oleh {{ $user->name }}.</p>
                    </div>

                    <div class="space-y-6">
                        {{-- Loop dari $savedPosts --}}
                        @forelse ($savedPosts as $post) 
                            {{-- Kita gunakan struktur card yang sama --}}
                            <a href="{{ route('posts.show', $post) }}" class="block border-b border-gray-200 pb-8 mb-8 group">
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full md:w-2/5 mb-4 md:mb-0">
                                        @php
                                            $thumbnailUrl = Str::startsWith($post->thumbnail, 'http') 
                                                ? $post->thumbnail 
                                                : Storage::url($post->thumbnail);
                                        @endphp
                                        <img src="{{ $thumbnailUrl }}" alt="{{ $post->judul }}" class="w-full h-56 object-cover rounded-2xl shadow-lg" />
                                    </div>

                                    <div class="w-full md:w-3/5 md:pl-6">
                                        @php $tags = explode(',', $post->topik_utama); @endphp
                                        <span class="text-indigo-600 text-sm font-medium block mb-1">{{ trim($tags[0]) }}</span>
                                        <h3 class="text-2xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">{{ $post->judul }}</h3>
                                        <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
                                            {{ Str::words(strip_tags($post->isi), 30, '...') }}
                                        </p>
                                        <div class="flex items-center space-x-6 text-gray-500 text-sm">
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                                <span>{{ $post->views_count ?? 0 }} Views</span>
                                            </div>
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                                                <span>{{ $post->likes_count ?? 0 }} Likes</span>
                                            </div>
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                <span>{{ $post->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="col-span-3 text-center text-gray-500 py-10 bg-gray-50 rounded-lg">
                                <p>Pengguna ini belum menyimpan konten apapun.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-12">
                        {{ $savedPosts->links('pagination::tailwind', ['pageName' => 'savedPage']) }}
                    </div>

                @endif
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-6 right-6 w-12 h-12 rounded-full bg-emerald-600 text-white shadow-lg hidden">
        <i class="fas fa-arrow-up"></i>
    </button>

    
</body>
</html>