<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- Dynamic Title --}}
    <title>{{ $post->judul }} - Berita Palestina Terkini</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    
    <style>
      /* Custom styles */
      .footer-bg { background: linear-gradient(135deg, #1e293b 0%, #334155 100%); }
      .comments-transition { transition: all 0.3s ease-in-out; }
    </style>
     {{-- CSRF Token for JavaScript --}}
     <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
  
<body class="bg-gray-50 md:px-10 font-['Inter']">
    @include('components.navbar')

    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 max-w-4xl mt-10"> {{-- Adjusted padding & max-width --}}
     <div class="mb-6">
        {{-- Dynamic Title --}}
        <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">{{ $post->judul }}</h1>
        
        {{-- Dynamic Tag (First one) --}}
        <div class="mt-4">
            @php
                $colors = ['bg-amber-100 text-amber-800', 'bg-blue-100 text-blue-800', 'bg-green-100 text-green-800'];
                $tags = explode(',', $post->topik_utama);
            @endphp
            @if (!empty(trim($tags[0])))
                <span class="{{ $colors[0] }} rounded-full text-xs font-medium px-3 py-1">{{ trim($tags[0]) }}</span>
            @endif
        </div>

        {{-- Dynamic Author Info & Stats --}}
        <div class="flex items-center justify-between text-gray-600 py-5 border-y border-gray-300 mt-4">
            
            {{-- Link ini sekarang hanya membungkus gambar dan nama --}}
            <a href="{{ route('user-profile.show', $post->user) }}" class="flex items-center group">
                {{-- Dynamic Author Image --}}
                <img
                  src="{{ $post->user->profile?->foto_profil ? Storage::url($post->user->profile->foto_profil) : asset('images/profile.png') }}"
                  alt="{{ $post->user->name }}"
                  class="w-10 h-10 rounded-full mr-3 object-cover transition-transform duration-300 group-hover:scale-110"
                />
                <div>
                  {{-- Dynamic Author Name & Date --}}
                  <p class="font-medium text-gray-800 group-hover:text-indigo-600 transition-colors">{{ $post->user->name }} <span class="font-normal text-gray-500 ml-2">{{ $post->created_at->format('d M Y') }}</span></p>
                </div>
            </a>
            
            {{-- Bagian Statistik (sekarang berada di luar link penulis) --}}
            <div class="flex items-center space-x-4">
              <div class="flex items-center" title="Views">
                <svg class="w-5 h-5 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                <span class="text-sm text-gray-500">{{ $post->views_count ?? 0 }}</span>
              </div>
              
              <div class="flex items-center" title="Likes">
                <i class="far fa-heart mr-1 text-gray-500"></i> {{-- Icon only --}}
                <span class="text-sm text-gray-500">{{ $post->likes_count ?? 0 }}</span>
              </div>
            </div>
        </div>
      </div>

      <div class="mb-6 rounded-3xl overflow-hidden shadow-lg">
          @if ($post->type == 'video' && $post->video_url)
              <div class="aspect-w-16 aspect-h-9">
                  @php
                      $embedUrl = str_replace('watch?v=', 'embed/', $post->video_url) . '?rel=0';
                  @endphp
                  <iframe src="{{ $embedUrl }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full"></iframe>
              </div>
          @else
              @php
                  $thumbnailUrl = Str::startsWith($post->thumbnail, 'http') ? $post->thumbnail : Storage::url($post->thumbnail);
              @endphp
              <img src="{{ $thumbnailUrl }}" alt="{{ $post->judul }}" class="w-full h-auto object-cover" />
          @endif
      </div>
      {{-- You might want a dynamic caption field in your 'posts' table --}}
      {{-- <p class="text-xs text-center text-gray-700 mt-2 mb-6 leading-relaxed">
         Caption for the image/video could go here if you add a field for it.
      </p> --}}

      <div class="prose max-w-none p-4 md:p-0"> {{-- Using Tailwind Prose for article styling --}}
          {!! nl2br(e($post->isi)) !!} {{-- Dynamic and safe article body --}}
      </div>

      <div class="mt-12 pt-6 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center">
        {{-- Dynamic Tags --}}
        <div class="flex flex-wrap gap-2 mb-4 sm:mb-0">
             @foreach ($tags as $tag)
                <span class="{{ $colors[$loop->index % count($colors)] }} text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ trim($tag) }}</span>
            @endforeach
        </div>
        
        {{-- Dynamic Interaction Buttons (Like, Save, Share) --}}
        <div class="flex items-center space-x-4 text-gray-600">
             @auth
                <form action="{{ route('posts.like', $post) }}" method="POST" class="flex items-center">
                    @csrf
                    @php $isLiked = $post->isLikedBy(Auth::user()); @endphp
                    <button type="submit" class="flex items-center hover:text-red-600 transition-colors {{ $isLiked ? 'text-red-600' : '' }}">
                        <i class="{{ $isLiked ? 'fas' : 'far' }} fa-heart mr-1"></i> 
                        <span class="text-sm font-medium">{{ $post->likes_count ?? 0 }}</span>
                    </button>
                </form>

                <form action="{{ route('posts.save', $post) }}" method="POST" class="flex items-center">
                    @csrf
                    @php $isSaved = $post->isSavedBy(Auth::user()); @endphp
                    <button type="submit" class="flex items-center hover:text-blue-600 transition-colors {{ $isSaved ? 'text-blue-600' : '' }}">
                        <i class="{{ $isSaved ? 'fas' : 'far' }} fa-bookmark mr-1"></i> 
                        <span class="text-sm font-medium">{{ $isSaved ? 'Disimpan' : 'Simpan' }}</span>
                    </button>
                </form>
             @else
                 {{-- Show counts only for guests --}}
                 <span class="flex items-center text-sm"><i class="far fa-heart mr-1"></i> {{ $post->likes_count ?? 0 }}</span>
                 <span class="flex items-center text-sm"><i class="far fa-bookmark mr-1"></i> Simpan</span>
             @endauth

             {{-- Add your dynamic share buttons here using the JavaScript function --}}
            <div class="flex items-center space-x-1">
                 <button onclick="sharePost('{{ route('posts.share', $post) }}', 'whatsapp', 'whatsapp://send?text={{ urlencode($post->judul . ' - ' . route('posts.show', $post)) }}')" 
                        class="p-2 rounded-full hover:bg-gray-100 transition-colors" title="Bagikan ke WhatsApp">
                    <i class="fab fa-whatsapp text-green-500"></i>
                </button>
                 <button onclick="copyLink('{{ route('posts.share', $post) }}', '{{ route('posts.show', $post) }}', this)"
                         class="p-2 rounded-full hover:bg-gray-100 transition-colors" title="Salin Link">
                     <i class="fas fa-link text-gray-500"></i>
                 </button>
                 {{-- Add Facebook, Twitter etc. if desired --}}
            </div>
        </div>
      </div>

      {{-- ======================================================= --}}
      {{-- BAGIAN KOMENTAR --}}
      {{-- ======================================================= --}}
      <div class="mt-12 pt-8 border-t" id="komentar">
          <h2 class="text-2xl font-bold text-gray-800 mb-6">Komentar ({{ $post->comments->count() }})</h2>

          {{-- Form untuk Menulis Komentar (Hanya untuk yang sudah login) --}}
          @auth
              <div class="bg-gray-50 p-4 rounded-lg mb-8 shadow-inner">
                  @if(session('success') && Str::contains(session('success'), 'Komentar'))
                      <p class="text-sm text-green-600 mb-2">{{ session('success') }}</p>
                  @endif
                  <form action="{{ route('posts.comments.store', $post) }}" method="POST">
                      @csrf
                      <div class="flex items-start space-x-4">
                          <img class="w-10 h-10 rounded-full object-cover flex-shrink-0" src="{{ Auth::user()->profile?->foto_profil ? Storage::url(Auth::user()->profile->foto_profil) : asset('images/profile.png') }}" alt="{{ Auth::user()->name }}">
                          <div class="flex-1">
                              <textarea name="body" rows="3" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Tulis komentar Anda..." required></textarea>
                              <x-input-error :messages="$errors->get('body')" class="mt-2" />
                              <div class="mt-2 text-right">
                                  <x-primary-button>Kirim</x-primary-button>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          @endauth

          {{-- Pesan untuk Tamu (Guest) --}}
          @guest
              <div class="bg-gray-100 p-4 rounded-lg text-center text-sm text-gray-600 mb-8 border">
                  <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:underline">Masuk</a> atau <a href="{{ route('register') }}" class="font-bold text-indigo-600 hover:underline">Daftar</a> untuk memberikan komentar.
              </div>
          @endguest

          {{-- Daftar Komentar yang Sudah Ada --}}
          <div class="space-y-6">
              @forelse ($post->comments as $comment)
                  <div id="comment-{{ $comment->id }}">
                      {{-- Tampilan Komentar Utama --}}
                      <div class="flex items-start space-x-4">
                          <img class="w-10 h-10 rounded-full object-cover flex-shrink-0" src="{{ $comment->user->profile?->foto_profil ? Storage::url($comment->user->profile->foto_profil) : asset('images/profile.png') }}" alt="{{ $comment->user->name }}">
                          <div class="flex-1 bg-white p-4 border rounded-lg shadow-sm">
                              <div class="flex justify-between items-center">
                                  <p class="font-semibold text-gray-900">{{ $comment->user->name }}</p>
                                  <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                              </div>
                              <p class="mt-2 text-gray-700 whitespace-pre-wrap">{{ $comment->body }}</p>
                              
                              {{-- Tombol Balas (Hanya untuk yang login) --}}
                              @auth
                              <div class="mt-2 text-right">
                                  <button onclick="toggleReplyForm({{ $comment->id }})" class="text-xs font-semibold text-indigo-600 hover:underline">Balas</button>
                              </div>
                              @endauth
                          </div>
                      </div>

                      {{-- Form Balasan (Awalnya Tersembunyi) --}}
                      @auth
                      <div id="reply-form-{{ $comment->id }}" class="hidden mt-4 ml-14">
                          <form action="{{ route('posts.comments.store', $post) }}" method="POST">
                              @csrf
                              <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                              <div class="flex items-start space-x-4">
                                   <img class="w-8 h-8 rounded-full object-cover flex-shrink-0" src="{{ Auth::user()->profile?->foto_profil ? Storage::url(Auth::user()->profile->foto_profil) : asset('images/profile.png') }}" alt="{{ Auth::user()->name }}">
                                   <div class="flex-1">
                                      <textarea name="body" rows="2" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm" placeholder="Tulis balasan..." required></textarea>
                                      <div class="mt-2 text-right space-x-2">
                                          <button type="button" onclick="toggleReplyForm({{ $comment->id }})" class="text-xs font-semibold text-gray-600 hover:underline">Batal</button>
                                          <x-primary-button class="!text-xs !py-1 !px-3">Kirim Balasan</x-primary-button>
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>
                      @endauth

                      {{-- Tampilan Balasan --}}
                      @if ($comment->replies->isNotEmpty())
                      <div class="ml-14 mt-4 space-y-4 border-l-2 border-gray-200 pl-4">
                          @foreach ($comment->replies as $reply)
                          <div class="flex items-start space-x-4">
                              <img class="w-8 h-8 rounded-full object-cover flex-shrink-0" src="{{ $reply->user->profile?->foto_profil ? Storage::url($reply->user->profile->foto_profil) : asset('images/profile.png') }}" alt="{{ $reply->user->name }}">
                              <div class="flex-1 bg-gray-50 p-3 border rounded-lg">
                                  <div class="flex justify-between items-center">
                                      <p class="font-semibold text-gray-900 text-sm">{{ $reply->user->name }}</p>
                                      <p class="text-xs text-gray-500">{{ $reply->created_at->diffForHumans() }}</p>
                                  </div>
                                  <p class="mt-1 text-gray-700 text-sm whitespace-pre-wrap">{{ $reply->body }}</p>
                              </div>
                          </div>
                          @endforeach
                      </div>
                      @endif
                  </div>
              @empty
                  <p class="text-center text-gray-500 text-sm py-4">Belum ada komentar. Jadilah yang pertama!</p>
              @endforelse
          </div>
      </div>
      
      {{-- @include('components.news-card') --}} 
    </main>

    @include('components.footer')

    {{-- Anda bisa menambahkan script untuk ini jika belum ada --}}
    {{-- <button id="backToTop" class="fixed bottom-8 right-8 w-12 h-12 rounded-full bg-emerald-600 text-white shadow-lg hidden hover:bg-emerald-700 transition-colors z-50">
      <i class="fas fa-arrow-up"></i>
    </button> --}}

    {{-- Script untuk Toggle Form Balasan --}}
    <script>
        function toggleReplyForm(commentId) {
            const form = document.getElementById(`reply-form-${commentId}`);
            form.classList.toggle('hidden');
        }
    </script>
    {{-- Script untuk Share Buttons --}}
    <script>
        // Fungsi untuk mengirim data share ke backend dan membuka link share
        async function sharePost(recordUrl, platform, shareUrl) {
            try {
                // Kirim data ke backend untuk dicatat
                await fetch(recordUrl, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), 
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ platform: platform })
                });
                window.open(shareUrl, '_blank');
            } catch (error) {
                console.error('Gagal mencatat share:', error);
                window.open(shareUrl, '_blank');
            }
        }
        // Fungsi khusus untuk menyalin link
        async function copyLink(recordUrl, linkToCopy, buttonElement) {
            try {
                await fetch(recordUrl, { /* ... headers ... */ body: JSON.stringify({ platform: 'copy_link' }) });
                await navigator.clipboard.writeText(linkToCopy);
                const originalIcon = buttonElement.innerHTML;
                buttonElement.innerHTML = '<i class="fas fa-check text-green-500 text-lg"></i>'; 
                setTimeout(() => { buttonElement.innerHTML = originalIcon; }, 1500);
            } catch (error) {
                console.error('Gagal menyalin atau mencatat share:', error);
                alert('Gagal menyalin link.'); 
            }
        }
    </script>
</body>
</html>