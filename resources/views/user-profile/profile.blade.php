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
            <div class="h-48 bg-cover bg-center relative" style="background-image: url('{{ asset('images/banner.png') }}">
                <!-- Overlay untuk membuat teks lebih terbaca -->
                <div class="absolute inset-0 bg-black/20"></div>
                
                <!-- Pattern liquid effect overlay -->
                <div class="absolute inset-0 opacity-30">
                    <div class="w-full h-full bg-gradient-to-br from-emerald-400/50 to-blue-500/50 rounded-b-full transform scale-150"></div>
                </div>
            </div>
            
            <!-- Bagian bawah putih -->
            <div class="bg-white p-6 pt-20 relative">
                <!-- Foto profile di tengah-tengah -->
                <div class="absolute -top-20 left-1/2 transform -translate-x-1/2">
                    <div class="relative">
                        <img 
                            src="{{ asset('images/background.jpg') }}" 
                            alt="Masjid Hawariyyin" 
                            class="w-32 h-32 rounded-full object-cover border-8 border-white "
                        />
                        
                    </div>
                </div>

                <!-- Informasi stats dan nama -->
                <div class="text-center mb-8 mt-1">
                    <!-- Stats -->
                    <div class="flex justify-center items-center text-gray-600 text-sm mb-2">
                        <span class="font-semibold">14 Postings</span>
                    </div>
                    <!-- Nama -->
                    <h1 class="text-2xl font-bold text-gray-900">Masjid Al-Hawariyyin</h1>
                </div>

                <!-- Informasi kontak horizontal -->
                <div class="flex flex-col md:flex-row justify-center items-center gap-6 md:gap-12 text-gray-700">
                    <!-- Email -->
                    <div class="flex items-center gap-2">
                        <i class="fas fa-envelope text-emerald-600 w-5"></i>
                        <span class="text-sm font-medium">shawariyyin.32@gmail.com</span>
                    </div>
                    
                    <!-- Phone -->
                    <div class="flex items-center gap-2">
                        <i class="fas fa-phone text-emerald-600 w-5"></i>
                        <span class="text-sm font-medium">08538001833</span>
                    </div>
                    
                    <!-- Location -->
                    <div class="flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-emerald-600 w-5"></i>
                        <span class="text-sm font-medium">@MWWHRK.Kameng Gungasna_adem@karate</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- User's Posts Section -->
        <div class="mb-8">
            <!-- Header dengan garis horizontal -->
            <div class="mb-10">
                <div class="flex items-center mb-5">
                    <h2 class="text-4xl font-bold text-gray-800 mr-4">Postingan</h2>
                    <hr  class="flex-1 mt-2 h-0.5 bg-gray-800 rounded-full">
                </div>
                <span class="text-white text-base font-medium mb-3 bg-red-600 px-3 py-1 rounded-5xl">Populer</span>
                <span class="text-white text-base font-medium mb-3  bg-red-600 px-3 py-1 rounded-5xl">Terbaru</span>
                <span class="text-white text-base font-medium mb-3  bg-red-600 px-3 py-1 rounded-5xl">Terlama</span>
            </div>
           

        
            <!-- User's Posts Section -->
            <div class="space-y-6">
                    <!-- Postingan 1 -->
                    <a href="/artikel" class="block border-b border-gray-200 pb-8 mb-8">
                        <div class="flex">
                            <!-- Thumbnail di Kiri -->
                            <div class="w-2/5">
                                <img src="{{ asset('images/background3.jpg') }}" alt="Featured News" class="w-full h-56 object-cover rounded-2xl shadow-lg" />
                            </div>
                            
                            <!-- Konten di Kanan -->
                            <div class="w-3/5 pl-6">
                                <!-- Tema artikel -->
                                <span class="text-red-600 text-sm font-medium block mb-1">Humanitarian Crisis</span>
                                
                                <!-- Judul -->
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">International Aid Reaches Gaza</h3>
                                
                                <!-- Deskripsi -->
                                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                                </p>
                                
                                <!-- Stats Horizontal -->
                                <div class="flex items-center space-x-6 text-gray-500 text-sm">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <span>12 K Views</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                        <span>245 Likes</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>2 Hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Postingan 2 -->
                    <a href="/artikel" class="block border-b border-gray-200 pb-8 mb-8">
                        <div class="flex">
                            <!-- Thumbnail di Kiri -->
                            <div class="w-2/5">
                                <img src="{{ asset('images/background3.jpg') }}" alt="Featured News" class="w-full h-56 object-cover rounded-2xl shadow-lg" />
                            </div>
                            
                            <!-- Konten di Kanan -->
                            <div class="w-3/5 pl-6">
                                <!-- Tema artikel -->
                                <span class="text-red-600 text-sm font-medium block mb-1">Humanitarian Crisis</span>
                                
                                <!-- Judul -->
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">International Aid Reaches Gaza</h3>
                                
                                <!-- Deskripsi -->
                                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                                </p>
                                
                                <!-- Stats Horizontal -->
                                <div class="flex items-center space-x-6 text-gray-500 text-sm">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <span>12 K Views</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                        <span>245 Likes</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>2 Hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Postingan 3 -->
                    <a href="/artikel" class="block border-b border-gray-200 pb-8 mb-8">
                        <div class="flex">
                            <!-- Thumbnail di Kiri -->
                            <div class="w-2/5">
                                <img src="{{ asset('images/background3.jpg') }}" alt="Featured News" class="w-full h-56 object-cover rounded-2xl shadow-lg" />
                            </div>
                            
                            <!-- Konten di Kanan -->
                            <div class="w-3/5 pl-6">
                                <!-- Tema artikel -->
                                <span class="text-red-600 text-sm font-medium block mb-1">Humanitarian Crisis</span>
                                
                                <!-- Judul -->
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">International Aid Reaches Gaza</h3>
                                
                                <!-- Deskripsi -->
                                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                                </p>
                                
                                <!-- Stats Horizontal -->
                                <div class="flex items-center space-x-6 text-gray-500 text-sm">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <span>12 K Views</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                        <span>245 Likes</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>2 Hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    

                    
                </div>
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