<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masjid Loves Palestine</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
    @include('components.navbar')

    <header id="Home" class="relative bg-gray-900 text-white pt-80 px-10 rounded-3xl mb-10 overflow-hidden min-h-[150px]">
      <div class="absolute inset-0">
        <img src="{{ asset('images/background3.jpg') }}" alt="Background" class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-black opacity-40"></div>
      </div>

      <div class="container mx-auto px-4 relative h-full flex flex-col justify-end pb-10">
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

    {{-- ======================================================= --}}
    {{-- BARU: Card Besar Utama (Post Terpopuler Hari Ini) --}}
    {{-- ======================================================= --}}
    @if ($hottestPostToday) {{-- Hanya tampilkan jika ada post terpopuler hari ini --}}
        <a href="{{ route('posts.show', $hottestPostToday) }}" class="block mb-12 group">
            <div class="bg-white overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex flex-col md:flex-row">
                    <!-- Thumbnail di Kiri -->
                    <div class="md:w-2/5">
                      
                        @php
                            $hotThumbnailUrl = Str::startsWith($hottestPostToday->thumbnail, 'http')
                                ? $hottestPostToday->thumbnail
                                : Storage::url($hottestPostToday->thumbnail);
                        @endphp
                        <img src="{{ $hotThumbnailUrl }}" alt="{{ $hottestPostToday->judul }}" class="rounded-t-2xl md:rounded-l-2xl md:rounded-tr-none w-full h-64 md:h-80 object-cover" />
                    </div>
                    
                    <!-- Konten di Kanan -->
                    <div class="md:w-3/5 p-6 flex flex-col justify-between">
                        <div>
                            <!-- Tag (Topik Utama) -->
                            <div class="flex flex-wrap gap-1 mb-3">
                                @php
                                    $hotColors = ['bg-red-100 text-red-800', 'bg-yellow-100 text-yellow-800'];
                                    $hotTags = explode(',', $hottestPostToday->topik_utama);
                                @endphp
                                @foreach (array_slice($hotTags, 0, 1) as $tag)
                                    <span class="{{ $hotColors[$loop->index % count($hotColors)] }} text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ trim($tag) }}</span>
                                @endforeach
                            </div>
                            <!-- Judul -->
                            <h3 class="text-2xl lg:text-3xl font-bold mb-3 relative inline-block group-hover:text-indigo-600 transition-colors">
                                <span>{{ $hottestPostToday->judul }}</span>
                                <span class="absolute bottom-0 left-0 w-0 h-1 bg-red-600 transition-all duration-700 group-hover:w-full"></span>
                            </h3>
                             <!-- Deskripsi Singkat -->
                            <p class="text-gray-600 text-base leading-relaxed mb-4 line-clamp-3">
                               {{ Str::words(strip_tags($hottestPostToday->isi), 30, '...') }} 
                            </p>
                        </div>
                        
                        <!-- Info Penulis & Stats -->
                        <div class="flex items-center justify-between border-t pt-4 mt-4">
                             <!-- Penulis -->
                            <div class="flex items-center text-sm text-gray-700">
                                @php
                                    $photoPath = $hottestPostToday->user->profile?->foto_profil;
                                    // KITA PAKSA PAKAI ASSET() LANGSUNG
                                    $authorPhotoUrl = $photoPath ? asset($photoPath) : asset('images/profile.png');
                                @endphp

                                <img src="{{ $authorPhotoUrl }}" alt="{{ $hottestPostToday->user->name ?? 'Penulis' }}" class="w-8 h-8 rounded-full mr-3 object-cover" />
                                <span>Oleh <span class="font-semibold">{{ $hottestPostToday->user->name }}</span></span>
                                
                            </div>
                            
                            <!-- Stats -->
                            <div class="flex items-center space-x-4 text-gray-500 text-sm">
                                <div class="flex items-center" title="Views Hari Ini">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    {{-- Menggunakan views_count dari eager loading --}}
                                    <span>{{ $hottestPostToday->views_count ?? 0 }} Views Hari Ini</span> 
                                </div>
                                <div class="flex items-center" title="Total Likes">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                    <span>{{ $hottestPostToday->likes_count ?? 0 }} Likes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @endif
    {{-- ======================================================= --}}

    {{-- Memanggil komponen slider berita dinamis --}}
    @include('components.news-card')

    <section id="Contact" class="container mx-auto px-4 py-16">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-8xl mx-auto">
        <div class="space-y-8">
          <div class="space-y-4">
            <h1 class="text-5xl font-bold text-gray-900 leading-tight">
              We are always ready to help you and answer your questions
            </h1>
            <p class="text-lg text-gray-600 leading-relaxed">
              We're here to answer any questions you may have about our efforts to support Palestine. Reach out to us and we'll respond as soon as we can.
            </p>
          </div>

          <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="space-y-2">
                <h3 class="text-xl font-bold text-gray-900">Call Center</h3>
                <p class="text-lg text-gray-700">+62 852 6998 0109</p>
                <p class="text-gray-500">Mon-Fri from 9am to 5pm</p>
              </div>

              <div class="space-y-2">
                <h3 class="text-xl font-bold text-gray-900">Email</h3>
                <p class="text-lg text-gray-700">support.masjidlovespalestine.org</p>
                <p class="text-gray-500">We'll respond within 24 hours</p>
              </div>

              <div class="space-y-2">
                <h3 class="text-xl font-bold text-gray-900">Address</h3>
                <p class="text-lg text-gray-700">Jl. Palestina belajar No. 322</p>
                <p class="text-gray-500">Jakarta, Indonesia</p>
              </div>

              <div class="space-y-2">
                <h3 class="text-xl font-bold text-gray-900">Social network</h3>
                <div class="flex space-x-4 pt-2">
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

        <div class="bg-gray-200 rounded-5xl shadow-lg p-12">
          <div class="space-y-2 mb-8">
            <h2 class="text-5xl font-medium text-gray-900">Get In Touch</h2>
            <p class="text-gray-600">
              We're here to answer any questions you may have about our efforts to support Palestine.
            </p>
          </div>

          <form class="space-y-6" action="{{ route('contact.store') }}" method="POST">
              @csrf
              <div>
                  <input
                      type="text"
                      id="name"
                      class="w-full px-4 py-3 border border-gray-300 rounded-5xl focus:ring-2 focus:ring-gray-800 focus:border-transparent transition duration-200"
                      placeholder="Enter your full name"
                      name="name"
                  />
              </div>

              <div>
                  <input
                      type="email"
                      id="email"
                      class="w-full px-4 py-3 border border-gray-300 rounded-5xl focus:ring-2 focus:ring-gray-800 focus:border-transparent transition duration-200"
                      placeholder="Enter your email address"
                      name="email"
                  />
              </div>

              <div>
                  <input
                      type="text"
                      id="subject"
                      class="w-full px-4 py-3 border border-gray-300 rounded-5xl focus:ring-2 focus:ring-gray-800 focus:border-transparent transition duration-200"
                      placeholder="What is this regarding?"
                      name="subject"
                  />
              </div>

              <div>
                  <textarea
                      id="body"
                      rows="5"
                      class="w-full px-5 py-5 border border-gray-300 rounded-5xl focus:ring-2 focus:ring-gray-800 focus:border-transparent transition duration-200 resize-none"
                      placeholder="Type your message here..."
                      name="body"
                  ></textarea>
              </div>

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

    @include('components.footer')

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>