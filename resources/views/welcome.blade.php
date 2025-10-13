<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masjid Loves Palestine</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Custom CSS -->
    <style>
      .contact-card {
        transition: all 0.3s ease;
      }
      .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      }
    </style>
  </head>
  <body class="bg-gray-50 min-h-screen px-0 md:px-10">
    <!-- Navbar  -->
    @include('components.navbar')

    <!-- Hero Section -->
    <header id="Home" class="relative bg-gray-900 text-white pt-80 px-10 rounded-3xl mb-10 overflow-hidden min-h-[150px]">
      <!-- Background image with dark overlay -->
      <div class="absolute inset-0">
        <img src="{{ asset('images/background3.jpg') }}" alt="Background" class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-black opacity-40"></div>
      </div>

      <!-- Content - Pojok kiri bawah -->
      <div class="container mx-auto px-4 relative h-full flex flex-col justify-end pb-10">
        <!-- Button Kategori -->
        @auth
          <a href="{{ route('dashboard') }}">
            <button class="border border-white text-white bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-full text-md font-medium w-fit mb-4 transition">Dashboard</button>
          </a>
        @else
          <a href="{{ route('register') }}">
            <button class="border border-white text-white bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-full text-md font-medium w-fit mb-4 transition">Jadi partner kita</button>
          </a>
        @endauth

        <h1 class="text-3xl md:text-4xl font-bold mb-4 leading-tight">Berlomba - lomba untuk Palestina</h1>
        <p class="text-lg md:text-xl text-grey-300 max-w-2xl">
          Stand with Palestine - this isn't about religion, it's about humanity. Oppression anywhere threatens freedom everywhere. Your voice matters now more than ever - speak up before history asks why you didn't.
        </p>
      </div>
    </header>

    <!-- Blog Posts -->
    <!-- Palestine News Carousel -->
    <main id="News" class="container mx-auto px-4 py-12 mb-5">
       <!-- Header dengan garis horizontal -->
        <div class="flex items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mr-4">Hottest Palestine News</h2>
            
            <hr  class="flex-1 mt-2 h-0.5 bg-gray-800 rounded-full">
        </div>

        <!-- Card Besar Utama -->
        <a href="/artikel">
            <div class=" overflow-hidden mb-8 group">
                <div class="flex">
                    <!-- Thumbnail di Kiri -->
                    <div class="w-2/5 rounded-2xl ">
                        <img src="{{ asset('images/background3.jpg') }}" alt="Featured News" class="rounded-2xl w-full h-80 object-cover" />
                    </div>
                    
                    <!-- Konten di Kanan -->
                    <div class="w-3/5 p-4 flex flex-col justify-between">
                        
                        <!-- tema artikel -->
                        <span class="text-red-600 text-base font-medium mb-3">Humanitarian Crisis</span>
                        <!-- Info Penulis -->
                        <div class="flex items-center mb-4">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Author" class="w-12 h-12 rounded-full mr-4" />
                            <div>
                                <span class="text-sm font-medium text-gray-800">Masjid Al - Hawariyyin</span>
                                
                            </div>
                        </div>
                        
                        <!-- Judul dan Deskripsi -->
                        <div class="mb-6">
                            <h3 class="text-3xl font-bold mb-4 relative inline-block">
                                <span>International Aid Reaches Gaza After Weeks of Blockade</span>
                                <span class="absolute bottom-0 left-0 w-0 h-1 bg-red-600 transition-all duration-700 group-hover:w-full"></span>
                            </h3>
                            <p class="text-gray-600 text-lg leading-relaxed">
                                First humanitarian convoy in weeks enters Gaza through Rafah crossing amid ceasefire negotiations. 
                                Essential supplies including food, medicine, and fuel delivered to affected areas.
                            </p>
                        </div>
                        
                        <!-- Stats -->
                        <div class="flex items-center justify-between border-t pt-4">
                            <div class="flex items-center space-x-6 text-gray-500">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <span class="text-sm">24.5K Views</span>
                                </div>
                                
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                    <span class="text-sm">1.2K Likes</span>
                                </div>
                            </div>
                            
                            <div class="flex items-center text-gray-500">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm">Just now</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        

        <!-- Carousel Cards di Bawah -->
        <div class="flex pb-6 space-x-4 " >
            <!-- News Item 1 -->
            <a href="/artikel">
                <article class="blog-card flex-shrink-0 overflow-hidden group" style="width: 450px; height: 480px">
                    <!-- Gambar dengan overlay untuk kategori dan penulis -->
                    <div class="relative">
                        <img src="{{ asset('images/background3.jpg') }}" alt="Palestine protest" class="rounded-2xl w-full h-56 object-cover" />
                        <!-- Overlay gradient untuk teks di atas gambar -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent rounded-2xl"></div>
                        
                        <!-- Kategori dan penulis di atas gambar -->
                        <div class="absolute bottom-5 left-5 text-white">
                            <div class="mt-2 flex items-center">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Author" class="w-10 h-10 rounded-full mr-3" />
                                <span class="text-sm text-white">Masjid Al - Hawariyyin</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Konten di bawah gambar -->
                    <div class="pt-3 h-[calc(100%-14rem)] flex flex-col">
                        <!-- tema artikel -->
                        <span class="text-red-600 text-base font-medium mb-3">Humanitarian Crisis</span>
                        <!-- Judul artikel -->
                        <h3 class="text-2xl font-bold mb-3 relative inline-block">
                            <span>International Aid Reaches Gaza</span>
                            <span class="absolute bottom-0 left-0 w-0 h-1 bg-red-600 transition-all duration-700 group-hover:w-full"></span>
                        </h3>
                        
                        <!-- Deskripsi artikel -->
                        <p class="text-gray-600 text-base mb-4 leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                        </p>
                        
                        <!-- Stats: Views, Likes, dan Comments -->
                        <div class="flex justify-left items-center text-gray-500 text-sm">
                            <div class="flex items-center mr-4">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span>12K Views</span>
                            </div>
                            
                            <div class="flex items-center mr-4">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                <span>245 Likes</span>
                            </div>
                            
                            <div class="flex items-center mr-4">
                                <!-- SVG Jam untuk waktu -->
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>2 Hours ago</span>
                            </div>
                        </div>
                    </div>
                </article>
            </a>

            <!-- News Item 2 -->
            <a href="/artikel">
                <article class="blog-card flex-shrink-0 overflow-hidden group" style="width: 450px; height: 480px">
                    <!-- Gambar dengan overlay untuk kategori dan penulis -->
                    <div class="relative">
                        <img src="{{ asset('images/background2.jpg') }}" alt="Palestinian children" class="rounded-2xl w-full h-56 object-cover" />
                        <!-- Overlay gradient untuk teks di atas gambar -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent rounded-2xl"></div>
                        
                        <!-- Kategori dan penulis di atas gambar -->
                        <div class="absolute bottom-5 left-5 text-white">
                            <div class="mt-2 flex items-center">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Author" class="w-10 h-10 rounded-full mr-3" />
                                <span class="text-sm text-white">Masjid Al - Hawariyyin</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Konten di bawah gambar -->
                    <div class="pt-3 h-[calc(100%-14rem)] flex flex-col">
                        <!-- tema artikel -->
                        <span class="text-blue-600 text-base font-medium mb-3">Education</span>
                        <!-- Judul artikel -->
                        <h3 class="text-2xl font-bold mb-3 relative inline-block">
                            <span>Schools Reopening in West Bank</span>
                            <span class="absolute bottom-0 left-0 w-0 h-1 bg-blue-600 transition-all duration-700 group-hover:w-full"></span>
                        </h3>
                        
                        <!-- Deskripsi artikel -->
                        <p class="text-gray-600 text-base mb-4 leading-relaxed">
                            After months of closure, educational institutions resume operations with UN support.
                        </p>
                        
                        <!-- Stats: Views, Likes, dan Comments -->
                        <div class="flex justify-left items-center text-gray-500 text-sm">
                            <div class="flex items-center mr-4">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span>8.5K Views</span>
                            </div>
                            
                            <div class="flex items-center mr-4">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                <span>189 Likes</span>
                            </div>
                            
                            <div class="flex items-center mr-4">
                                <!-- SVG Jam untuk waktu -->
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>2 days ago</span>
                            </div>
                        </div>
                    </div>
                </article>
            </a>

            <!-- News Item 3 -->
            <a href="/artikel">
                <article class="blog-card flex-shrink-0 overflow-hidden group" style="width: 450px; height: 480px">
                    <!-- Gambar dengan overlay untuk kategori dan penulis -->
                    <div class="relative">
                        <img src="{{ asset('images/background4.jpg') }}" alt="Medical aid" class="rounded-2xl w-full h-56 object-cover" />
                        <!-- Overlay gradient untuk teks di atas gambar -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent rounded-2xl"></div>
                        
                        <!-- Kategori dan penulis di atas gambar -->
                        <div class="absolute bottom-5 left-5 text-white">
                            <div class="mt-2 flex items-center">
                                <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Author" class="w-10 h-10 rounded-full mr-3" />
                                <span class="text-sm text-white">Masjid Al - Hawariyyin</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Konten di bawah gambar -->
                    <div class="pt-3 h-[calc(100%-14rem)] flex flex-col">
                        <!-- tema artikel -->
                        <span class="text-green-600 text-base font-medium mb-3">Health</span>
                        <!-- Judul artikel -->
                        <h3 class="text-2xl font-bold mb-3 relative inline-block">
                            <span>Mobile Clinics Deployed</span>
                            <span class="absolute bottom-0 left-0 w-0 h-1 bg-green-600 transition-all duration-700 group-hover:w-full"></span>
                        </h3>
                        
                        <!-- Deskripsi artikel -->
                        <p class="text-gray-600 text-base mb-4 leading-relaxed">
                            Emergency medical teams provide care to remote areas affected by the conflict.
                        </p>
                        
                        <!-- Stats: Views, Likes, dan Comments -->
                        <div class="flex justify-left items-center text-gray-500 text-sm">
                            <div class="flex items-center mr-4">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span>6.2K Views</span>
                            </div>
                            
                            <div class="flex items-center mr-4">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                <span>156 Likes</span>
                            </div>
                            
                            <div class="flex items-center mr-4">
                                <!-- SVG Jam untuk waktu -->
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>3 days ago</span>
                            </div>
                        </div>
                    </div>
                </article>
            </a>
        </div>
    </main>

    <!-- Lastest News -->
    @include('components.news-card')


    <!-- Contact Section -->
    <section id="Contact" class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-8xl mx-auto">
            <!-- Left Column - Contact Information -->
            <div class="space-y-8">
                <!-- Header -->
                <div class="space-y-4">
                    <h1 class="text-5xl font-bold text-gray-900 leading-tight">
                        We are always ready to help you and answer your questions
                    </h1>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        We're here to answer any questions you may have about our efforts to support Palestine. Reach out to us and we'll respond as soon as we can.
                    </p>
                </div>

                <!-- Contact Details -->
                <div class="space-y-6">
                    <!-- Grid Container -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Call Center -->
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-gray-900">Call Center</h3>
                            <p class="text-lg text-gray-700">+62 852 6998 0109</p>
                            <p class="text-gray-500">Mon-Fri from 9am to 5pm</p>
                        </div>

                        <!-- Email -->
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-gray-900">Email</h3>
                            <p class="text-lg text-gray-700">support.masjidlovespalestine.org</p>
                            <p class="text-gray-500">We'll respond within 24 hours</p>
                        </div>

                        <!-- Address -->
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-gray-900">Address</h3>
                            <p class="text-lg text-gray-700">Jl. Palestina belajar No. 322</p>
                            <p class="text-gray-500">Jakarta, Indonesia</p>
                        </div>

                        <!-- Social Network -->
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-gray-900">Social network</h3>
                            <div class="flex space-x-4 pt-2">
                                <!-- Social Media Icons -->
                                <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center social-icon">
                                    <span class="text-gray-600 font-semibold">f</span>
                                </div>
                                <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center social-icon">
                                    <span class="text-gray-600 font-semibold">t</span>
                                </div>
                                <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center social-icon">
                                    <span class="text-gray-600 font-semibold">i</span>
                                </div>
                                <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center social-icon">
                                    <span class="text-gray-600 font-semibold">y</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Contact Form -->
            <div class="bg-gray-200 rounded-5xl shadow-lg p-12">
                <!-- Form Header -->
                <div class="space-y-2 mb-8">
                    <h2 class="text-5xl font-medium text-gray-900">Get In Touch</h2>
                    <p class="text-gray-600">
                        We're here to answer any questions you may have about our efforts to support Palestine.
                    </p>
                </div>

                <!-- Contact Form -->
                <form class="space-y-6">
                    <!-- Full Name -->
                    <div>
                       
                        <input 
                            type="text" 
                            id="fullName" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-5xl focus:ring-2 focus:ring-gray-800 focus:border-transparent transition duration-200" 
                            placeholder="Enter your full name"
                        />
                    </div>

                    <!-- Email -->
                    <div>
                        
                        <input 
                            type="email" 
                            id="email" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-5xl focus:ring-2 focus:ring-gray-800 focus:border-transparent transition duration-200" 
                            placeholder="Enter your email address"
                        />
                    </div>

                    <!-- Subject -->
                    <div>
                        
                        <input 
                            type="text" 
                            id="subject" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-5xl focus:ring-2 focus:ring-gray-800 focus:border-transparent transition duration-200" 
                            placeholder="What is this regarding?"
                        />
                    </div>

                    <!-- Message -->
                    <div>
                        
                        <textarea 
                            id="message" 
                            rows="5" 
                            class="w-full px-5 py-5 border border-gray-300 rounded-5xl focus:ring-2 focus:ring-gray-800 focus:border-transparent transition duration-200 resize-none" 
                            placeholder="Type your message here..."
                        ></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-gray-900 hover:bg-gray-800 text-white py-3 px-6 rounded-5xl font-semibold transition duration-300 transform hover:-translate-y-1 shadow-lg"
                    >
                        Send a message
                    </button>
                </form>
            </div>
        </div>
    </section>
    
    <!--Footer  -->
    @include('components.footer')

    

    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>