<nav class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-xl px-4">
    <!-- Desktop Navigation -->
    <div class="hidden md:flex items-center justify-between backdrop-blur-sm bg-white/70 border border-white/50 rounded-5xl shadow-xl px-4 py-1">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16 drop-shadow-lg rounded-lg" />
        </div>

        <!-- Navigation Links -->
        <div class="flex items-center space-x-6">
            <a href="/" class="text-gray-600 hover:text-gray-900 transition-all duration-300 hover:-translate-y-0.5 font-medium text-lg relative group">
                Home
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-800 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#News" class="text-gray-600 hover:text-gray-900 transition-all duration-300 hover:-translate-y-0.5 font-medium text-lg relative group">
                News
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-800 transition-all duration-300 group-hover:w-full"></span>
            </a>
            <a href="#Contact" class="text-gray-600 hover:text-gray-900 transition-all duration-300 hover:-translate-y-0.5 font-medium text-lg relative group">
                Contact
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-800 transition-all duration-300 group-hover:w-full"></span>
            </a>
        </div>

        <!-- Auth Buttons -->
        <div class="flex items-center space-x-3">
            @auth
                {{-- ======================================================= --}}
                {{-- BARU: Link Profil Pengguna (Desktop) --}}
                {{-- ======================================================= --}}
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
                
                @if (Auth::user()->role === 'masjid')
                    <a href="{{ route('dashboard') }}" title="Buka Dashboard">
                        <img src="{{ $photoUrl }}" alt="Profil" class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm transition-transform duration-300 transform hover:scale-110">
                    </a>
                @else
                    <a href="{{ route('user-profile.show', Auth::user()) }}" title="Lihat Profil">
                        <img src="{{ $photoUrl }}" alt="Profil" class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm transition-transform duration-300 transform hover:scale-110">
                    </a>
                @endif
                {{-- ======================================================= --}}

                
            @else
                <a href="{{ route('login') }}">
                    <button class="bg-gradient-to-r from-gray-800 to-gray-700 hover:from-gray-700 hover:to-gray-600 text-white px-4 py-2 rounded-full font-medium transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg text-sm">
                        Masuk
                    </button>
                </a>
            @endauth
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div class="md:hidden flex items-center justify-between backdrop-blur-xl bg-white/80 border border-white/50 rounded-2xl shadow-xl px-4 py-3">
        <!-- Logo Mobile -->
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-8 h-8 drop-shadow-lg rounded-lg" />
            <span class="text-sm font-semibold text-gray-800">Masjid Loves Palestine</span>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobileMenuButton" class="p-2 rounded-xl bg-gray-800 text-white hover:bg-gray-700 transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile Sidebar -->
    <div id="mobileSidebar" class="md:hidden fixed top-0 left-0 w-0 h-screen bg-gradient-to-br from-gray-900 to-gray-800 backdrop-blur-2xl overflow-hidden transition-all duration-500 z-40">
        <div class="relative h-full">
            <!-- Close Button -->
            <button id="closeSidebar" class="absolute top-6 right-6 text-white hover:text-gray-300 transition-colors duration-300 z-50">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Sidebar Content -->
            <div class="pt-20 px-6 h-full flex flex-col">
                <!-- Logo in Sidebar -->
                <div class="flex items-center space-x-3 mb-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16 drop-shadow-2xl rounded-lg" />
                </div>

                <!-- Navigation Links -->
                <div class="space-y-4 mb-8">
                    <a href="/" class="flex items-center space-x-3 text-white hover:text-gray-300 transition-all duration-300 group py-2">
                        <div class="w-1.5 h-6 bg-white rounded-full transform scale-y-0 group-hover:scale-y-100 transition-transform duration-300"></div>
                        <span class="text-lg font-medium">Home</span>
                    </a>
                    <a href="#News" class="flex items-center space-x-3 text-white hover:text-gray-300 transition-all duration-300 group py-2">
                        <div class="w-1.5 h-6 bg-white rounded-full transform scale-y-0 group-hover:scale-y-100 transition-transform duration-300"></div>
                        <span class="text-lg font-medium">News</span>
                    </a>
                    <a href="#Contact" class="flex items-center space-x-3 text-white hover:text-gray-300 transition-all duration-300 group py-2">
                        <div class="w-1.5 h-6 bg-white rounded-full transform scale-y-0 group-hover:scale-y-100 transition-transform duration-300"></div>
                        <span class="text-lg font-medium">Contact</span>
                    </a>
                </div>

                <!-- Auth Buttons in Sidebar -->
                <div class="mt-auto pb-8 space-y-3">
                    @auth
                        {{-- ======================================================= --}}
                        {{-- BARU: Link Profil Pengguna (Mobile) --}}
                        {{-- ======================================================= --}}
                        @php
                            // Logika untuk mendapatkan URL foto profil
                            $defaultPhotoPath = 'profile-photos/default.jpg';
                            $userPhotoPath = Auth::user()->profile?->foto_profil;
                            $photoUrl = asset('images/placeholder.png'); // Fallback
                                        
                            if ($userPhotoPath && Storage::disk('public')->exists($userPhotoPath)) {
                                $photoUrl = Storage::url($userPhotoPath);
                            } elseif (Storage::disk('public')->exists($defaultPhotoPath)) {
                                $photoUrl = Storage::url($defaultPhotoPath);
                            }
                        @endphp
                        
                        @if (Auth::user()->role === 'masjid')
                            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 text-white hover:text-gray-300 transition-all duration-300 group py-2">
                                <img src="{{ $photoUrl }}" alt="Profil" class="w-10 h-10 rounded-full object-cover border-2 border-white/50">
                                <span class="text-lg font-medium">Dashboard</span>
                            </a>
                        @else
                            <a href="{{ route('user-profile.show', Auth::user()) }}" class="flex items-center space-x-3 text-white hover:text-gray-300 transition-all duration-300 group py-2">
                                <img src="{{ $photoUrl }}" alt="Profil" class="w-10 h-10 rounded-full object-cover border-2 border-white/50">
                                <span class="text-lg font-medium">Profil Saya</span>
                            </a>
                        @endif
                        {{-- ======================================================= --}}

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-4 py-2.5 rounded-xl font-medium transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block">
                            <button class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-4 py-2.5 rounded-xl font-medium transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg">
                                Masuk
                            </button>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay for Mobile -->
    <div id="sidebarOverlay" class="md:hidden fixed inset-0 bg-black bg-opacity-50 z-30 hidden"></div>
</nav>

<!-- Spacer untuk konten di bawah fixed navbar -->
<div class="h-20 md:h-24"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const closeSidebar = document.getElementById('closeSidebar');
        const mobileSidebar = document.getElementById('mobileSidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        // Open sidebar
        mobileMenuButton.addEventListener('click', function() {
            mobileSidebar.style.width = '80%';
            sidebarOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });

        // Close sidebar
        function closeMobileSidebar() {
            mobileSidebar.style.width = '0';
            sidebarOverlay.classList.add('hidden');
            document.body.style.overflow = '';
        }

        closeSidebar.addEventListener('click', closeMobileSidebar);
        sidebarOverlay.addEventListener('click', closeMobileSidebar);

        // Close sidebar when clicking on links
        const sidebarLinks = mobileSidebar.querySelectorAll('a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', closeMobileSidebar);
        });

        // Handle escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileSidebar.style.width !== '0') {
                closeMobileSidebar();
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    });
</script>