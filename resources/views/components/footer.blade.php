<!-- Footer -->
<footer class="bg-gray-900 text-white rounded-5xl mb-4 mt-10 pt-20 relative">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                <!-- Column 1: Logo dan Tagline (3/4) -->
                <div class="lg:col-span-3 space-y-4">
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('images/logo2.png') }}" alt="MLP Logo" class="w-16 h-16">
                    </div>
                    <p class="text-4xl font-semibold bg-gradient-to-r from-red-600 via-white to-green-600 bg-clip-text text-transparent">
                        Buatlah karyamu sekarang untuk membantu saudara kita di Palestina!
                    </p>
                </div>

                <!-- Column 2: Navigation Links (1/4) -->
                <div class="lg:col-span-1">
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold">MLP</h3>
                        <ul class="space-y-2">
                            <li><a href="/" class="text-gray-400 hover:text-white transition duration-300">Home</a></li>
                            <li><a href="#About" class="text-gray-400 hover:text-white transition duration-300">About</a></li>
                            <li><a href="#News" class="text-gray-400 hover:text-white transition duration-300">News</a></li>
                            <li><a href="#Contact" class="text-gray-400 hover:text-white transition duration-300">Contact</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>

            <!-- Spacer untuk memberikan ruang bagi copyright section -->
            <div class="h-16"></div>
        </div>

        <!-- Copyright Section yang setengah masuk setengah keluar -->
        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2">
            <div class="bg-gray-50 rounded-3xl px-8 py-4 text-center ">
                <p class="text-gray-600 text-sm font-medium">
                    © 2025 MLP Team - Sekolah Impian
                </p>
            </div>
        </div>
    </footer>