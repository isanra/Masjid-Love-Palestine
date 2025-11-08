<div id="News" class="container mx-auto mb-10 px-4"> {{-- Container agar ada padding --}}
    <div class="flex items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800 mr-4">Lastest Palestine News</h2>
        <hr class="flex-1 mt-2 h-0.5 bg-gray-800 rounded-full">
    </div>

    {{-- Kontainer Slider --}}
    <div class="flex overflow-x-auto space-x-4 pb-6 carousel-container" style="cursor: grab">

        {{-- Mulai Loop untuk setiap post --}}
        {{-- Variabel $posts ini didapat dari view yang meng-@include komponen ini --}}
        @forelse ($sliderPosts as $post)
            {{-- Link membungkus setiap artikel --}}
            <a href="{{ route('posts.show', $post) }}" class="flex-shrink-0 group block" style="width: 350px;"> 
                @php
                    // Cek apakah thumbnail adalah URL eksternal atau path lokal
                    $thumbnailUrl = Str::startsWith($post->thumbnail, 'http')
                        ? $post->thumbnail
                        : Storage::url($post->thumbnail);
                @endphp
                <article class="blog-card h-full flex flex-col overflow-hidden bg-white rounded-2xl shadow hover:shadow-lg transition-shadow duration-300"> {{-- Tambah style dasar card --}}
                    <!-- Gambar -->
                    <div class="relative">
                        <img src="{{ $thumbnailUrl }}" alt="{{ $post->judul }}" class="rounded-t-2xl w-full h-48 object-cover" /> {{-- Pastikan rounded-t --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent rounded-t-2xl"></div> {{-- Pastikan rounded-t --}}
                        
                        <!-- Penulis di atas gambar -->
                        {{-- Ganti '#' dengan rute profil penulis jika ada --}}
                        <a href="#" class="absolute bottom-4 left-4 text-white block z-10 group-hover:underline"> 
                            <div class="flex items-center">
                                <img src="{{ $post->user->profile?->foto_profil ? Storage::url($post->user->profile->foto_profil) : asset('images/profile.png') }}" 
                                     alt="{{ $post->user->name }}" class="w-8 h-8 rounded-full mr-2 object-cover border-2 border-white" /> {{-- Tambah border --}}
                                <span class="text-xs font-semibold text-white">{{ $post->user->name }}</span>
                            </div>
                        </a>
                    </div>
                    
                    <!-- Konten di bawah gambar -->
                    <div class="p-4 flex flex-col flex-grow"> {{-- Tambah padding --}}
                        <!-- Tag (Topik Utama) -->
                        <div class="flex flex-wrap gap-1 mb-2">
                             @php
                                $colors = ['bg-blue-100 text-blue-800', 'bg-green-100 text-green-800', 'bg-yellow-100 text-yellow-800', 'bg-indigo-100 text-indigo-800'];
                                $tags = explode(',', $post->topik_utama);
                            @endphp
                            @foreach (array_slice($tags, 0, 1) as $tag) {{-- Hanya tampilkan 1 tag --}}
                                <span class="{{ $colors[$loop->index % count($colors)] }} text-xs font-semibold px-2 py-0.5 rounded-full">{{ trim($tag) }}</span>
                            @endforeach
                        </div>

                        <!-- Judul artikel -->
                        <h3 class="text-lg font-bold mb-2 relative inline-block line-clamp-2 group-hover:text-indigo-600 transition-colors"> {{-- Ukuran font disesuaikan --}}
                             <span>{{ $post->judul }}</span>
                             <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-600 transition-all duration-700 group-hover:w-full"></span>
                        </h3>
                        
                        <!-- Deskripsi (Isi) artikel - Dibatasi -->
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-grow"> {{-- line-clamp-3 --}}
                             {{ Str::words(strip_tags($post->isi), 15, '...') }} {{-- Tampilkan 15 kata --}}
                        </p>
                        
                        <!-- Stats: Views, Likes, dan Waktu -->
                        <div class="flex justify-start items-center text-gray-500 text-xs mt-auto pt-2 border-t border-gray-100"> 
                            <div class="flex items-center mr-3" title="Views">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                <span>{{ $post->views_count ?? 0 }}</span>
                            </div>
                            <div class="flex items-center mr-3" title="Likes">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                                <span>{{ $post->likes_count ?? 0 }}</span>
                            </div>
                            <div class="flex items-center ml-auto" title="{{ $post->created_at->format('d F Y H:i') }}"> 
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                <span>{{ $post->created_at->diffForHumans() }}</span> 
                            </div>
                        </div>
                    </div>
                </article>
            </a> 

        {{-- Bagian jika tidak ada post --}}
        @empty
            <div class="w-full text-center py-10">
                <p class="text-gray-500">Belum ada berita terbaru.</p>
            </div>
        @endforelse {{-- Loop berakhir DI SINI --}}

    </div> {{-- Penutup Kontainer Slider --}}
</div> {{-- Penutup container --}}