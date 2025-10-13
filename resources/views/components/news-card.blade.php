<main id="News" class="container mx-auto  mb-10">
       <!-- Header dengan garis horizontal -->
        <div class="flex items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mr-4">Lastest Palestine News</h2>
            
            <hr  class="flex-1 mt-2 h-0.5 bg-gray-800 rounded-full">
        </div>
        <div class="flex pb-6 space-x-2 carousel-container" style="cursor: grab">
          <!-- News Item 1 -->
          <a href="/artikel">
              <article class="blog-card flex-shrink-0 overflow-hidden group" style="width: 350px; height: 400px">
                  <!-- Gambar dengan overlay untuk kategori dan penulis -->
                  <div class="relative">
                      <img src="{{ asset('images/background3.jpg') }}" alt="Palestine protest" class="rounded-2xl w-full h-48 object-cover" />
                      <!-- Overlay gradient untuk teks di atas gambar -->
                      <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent rounded-2xl"></div>
                      
                      <!-- Kategori dan penulis di atas gambar -->
                        <a href="/user-profile">
                            <div class="absolute bottom-4 left-4 text-white">
                                <div class="mt-2 flex items-center">
                                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Author" class="w-8 h-8 rounded-full mr-2" />
                                    <span class="text-xs text-white">Masjid Al - Hawariyyin</span>
                                </div>
                            </div>
                        </a>
                      
                  </div>
                  
                  <!-- Konten di bawah gambar -->
                  <div class="pt-2 h-[calc(100%-12rem)] flex flex-col">
                      <!-- tema artikel -->
                      <span class="text-red-600 text-sm font-medium mb-2">Humanitarian Crisis</span>
                      <!-- Judul artikel -->
                      <h3 class="text-xl font-bold mb-2 relative inline-block">
                          <span>International Aid Reaches Gaza</span>
                          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-600 transition-all duration-700 group-hover:w-full"></span>
                      </h3>
                      
                      <!-- Deskripsi artikel -->
                      <p class="text-gray-600 text-sm mb-2">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                      </p>
                      
                      <!-- Stats: Views, Likes, dan Comments -->
                      <div class="flex justify-left items-center text-gray-500 text-xs">
                          <div class="flex items-center mr-3">
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                              </svg>
                              <span>12K Views</span>
                          </div>
                          
                          <div class="flex items-center mr-3">
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                              </svg>
                              <span>245 Likes</span>
                          </div>
                          
                          <div class="flex items-center mr-3">
                              <!-- SVG Jam untuk waktu -->
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
              <article class="blog-card flex-shrink-0 overflow-hidden group" style="width: 350px; height: 400px">
                  <!-- Gambar dengan overlay untuk kategori dan penulis -->
                  <div class="relative">
                      <img src="{{ asset('images/background2.jpg') }}" alt="Palestinian children" class="rounded-2xl w-full h-48 object-cover" />
                      <!-- Overlay gradient untuk teks di atas gambar -->
                      <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent rounded-2xl"></div>
                      
                      <!-- Kategori dan penulis di atas gambar -->
                      <div class="absolute bottom-4 left-4 text-white">
                          <div class="mt-2 flex items-center">
                              <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Author" class="w-8 h-8 rounded-full mr-2" />
                              <span class="text-xs text-white">Masjid Al - Hawariyyin</span>
                          </div>
                      </div>
                  </div>
                  
                  <!-- Konten di bawah gambar -->
                  <div class="pt-2 h-[calc(100%-12rem)] flex flex-col">
                      <!-- tema artikel -->
                      <span class="text-blue-600 text-sm font-medium mb-2">Education</span>
                      <!-- Judul artikel -->
                      <h3 class="text-xl font-bold mb-2 relative inline-block">
                          <span>Schools Reopening in West Bank</span>
                          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-700 group-hover:w-full"></span>
                      </h3>
                      
                      <!-- Deskripsi artikel -->
                      <p class="text-gray-600 text-sm mb-2">
                          After months of closure, educational institutions resume operations with UN support.
                      </p>
                      
                      <!-- Stats: Views, Likes, dan Comments -->
                      <div class="flex justify-left items-center text-gray-500 text-xs">
                          <div class="flex items-center mr-3">
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                              </svg>
                              <span>8.5K Views</span>
                          </div>
                          
                          <div class="flex items-center mr-3">
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                              </svg>
                              <span>189 Likes</span>
                          </div>
                          
                          <div class="flex items-center mr-3">
                              <!-- SVG Jam untuk waktu -->
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
              <article class="blog-card flex-shrink-0 overflow-hidden group" style="width: 350px; height: 400px">
                  <!-- Gambar dengan overlay untuk kategori dan penulis -->
                  <div class="relative">
                      <img src="{{ asset('images/background4.jpg') }}" alt="Medical aid" class="rounded-2xl w-full h-48 object-cover" />
                      <!-- Overlay gradient untuk teks di atas gambar -->
                      <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent rounded-2xl"></div>
                      
                      <!-- Kategori dan penulis di atas gambar -->
                      <div class="absolute bottom-4 left-4 text-white">
                          <div class="mt-2 flex items-center">
                              <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Author" class="w-8 h-8 rounded-full mr-2" />
                              <span class="text-xs text-white">Masjid Al - Hawariyyin</span>
                          </div>
                      </div>
                  </div>
                  
                  <!-- Konten di bawah gambar -->
                  <div class="pt-2 h-[calc(100%-12rem)] flex flex-col">
                      <!-- tema artikel -->
                      <span class="text-green-600 text-sm font-medium mb-2">Health</span>
                      <!-- Judul artikel -->
                      <h3 class="text-xl font-bold mb-2 relative inline-block">
                          <span>Mobile Clinics Deployed</span>
                          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-600 transition-all duration-700 group-hover:w-full"></span>
                      </h3>
                      
                      <!-- Deskripsi artikel -->
                      <p class="text-gray-600 text-sm mb-2">
                          Emergency medical teams provide care to remote areas affected by the conflict.
                      </p>
                      
                      <!-- Stats: Views, Likes, dan Comments -->
                      <div class="flex justify-left items-center text-gray-500 text-xs">
                          <div class="flex items-center mr-3">
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                              </svg>
                              <span>6.2K Views</span>
                          </div>
                          
                          <div class="flex items-center mr-3">
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                              </svg>
                              <span>156 Likes</span>
                          </div>
                          
                          <div class="flex items-center mr-3">
                              <!-- SVG Jam untuk waktu -->
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                              <span>3 days ago</span>
                          </div>
                      </div>
                  </div>
              </article>
          </a>
          <!-- News Item 1 -->
          <a href="/artikel">
              <article class="blog-card flex-shrink-0 overflow-hidden group" style="width: 350px; height: 400px">
                  <!-- Gambar dengan overlay untuk kategori dan penulis -->
                  <div class="relative">
                      <img src="{{ asset('images/background3.jpg') }}" alt="Palestine protest" class="rounded-2xl w-full h-48 object-cover" />
                      <!-- Overlay gradient untuk teks di atas gambar -->
                      <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent rounded-2xl"></div>
                      
                      <!-- Kategori dan penulis di atas gambar -->
                      <div class="absolute bottom-4 left-4 text-white">
                          <div class="mt-2 flex items-center">
                              <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Author" class="w-8 h-8 rounded-full mr-2" />
                              <span class="text-xs text-white">Masjid Al - Hawariyyin</span>
                          </div>
                      </div>
                  </div>
                  
                  <!-- Konten di bawah gambar -->
                  <div class="pt-2 h-[calc(100%-12rem)] flex flex-col">
                      <!-- tema artikel -->
                      <span class="text-red-600 text-sm font-medium mb-2">Humanitarian Crisis</span>
                      <!-- Judul artikel -->
                      <h3 class="text-xl font-bold mb-2 relative inline-block">
                          <span>International Aid Reaches Gaza</span>
                          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-600 transition-all duration-700 group-hover:w-full"></span>
                      </h3>
                      
                      <!-- Deskripsi artikel -->
                      <p class="text-gray-600 text-sm mb-2">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                      </p>
                      
                      <!-- Stats: Views, Likes, dan Comments -->
                      <div class="flex justify-left items-center text-gray-500 text-xs">
                          <div class="flex items-center mr-3">
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                              </svg>
                              <span>12K Views</span>
                          </div>
                          
                          <div class="flex items-center mr-3">
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                              </svg>
                              <span>245 Likes</span>
                          </div>
                          
                          <div class="flex items-center mr-3">
                              <!-- SVG Jam untuk waktu -->
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
              <article class="blog-card flex-shrink-0 overflow-hidden group" style="width: 350px; height: 400px">
                  <!-- Gambar dengan overlay untuk kategori dan penulis -->
                  <div class="relative">
                      <img src="{{ asset('images/background2.jpg') }}" alt="Palestinian children" class="rounded-2xl w-full h-48 object-cover" />
                      <!-- Overlay gradient untuk teks di atas gambar -->
                      <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent rounded-2xl"></div>
                      
                      <!-- Kategori dan penulis di atas gambar -->
                      <div class="absolute bottom-4 left-4 text-white">
                          <div class="mt-2 flex items-center">
                              <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Author" class="w-8 h-8 rounded-full mr-2" />
                              <span class="text-xs text-white">Masjid Al - Hawariyyin</span>
                          </div>
                      </div>
                  </div>
                  
                  <!-- Konten di bawah gambar -->
                  <div class="pt-2 h-[calc(100%-12rem)] flex flex-col">
                      <!-- tema artikel -->
                      <span class="text-blue-600 text-sm font-medium mb-2">Education</span>
                      <!-- Judul artikel -->
                      <h3 class="text-xl font-bold mb-2 relative inline-block">
                          <span>Schools Reopening in West Bank</span>
                          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-700 group-hover:w-full"></span>
                      </h3>
                      
                      <!-- Deskripsi artikel -->
                      <p class="text-gray-600 text-sm mb-2">
                          After months of closure, educational institutions resume operations with UN support.
                      </p>
                      
                      <!-- Stats: Views, Likes, dan Comments -->
                      <div class="flex justify-left items-center text-gray-500 text-xs">
                          <div class="flex items-center mr-3">
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                              </svg>
                              <span>8.5K Views</span>
                          </div>
                          
                          <div class="flex items-center mr-3">
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                              </svg>
                              <span>189 Likes</span>
                          </div>
                          
                          <div class="flex items-center mr-3">
                              <!-- SVG Jam untuk waktu -->
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
              <article class="blog-card flex-shrink-0 overflow-hidden group" style="width: 350px; height: 400px">
                  <!-- Gambar dengan overlay untuk kategori dan penulis -->
                  <div class="relative">
                      <img src="{{ asset('images/background4.jpg') }}" alt="Medical aid" class="rounded-2xl w-full h-48 object-cover" />
                      <!-- Overlay gradient untuk teks di atas gambar -->
                      <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent rounded-2xl"></div>
                      
                      <!-- Kategori dan penulis di atas gambar -->
                      <div class="absolute bottom-4 left-4 text-white">
                          <div class="mt-2 flex items-center">
                              <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Author" class="w-8 h-8 rounded-full mr-2" />
                              <span class="text-xs text-white">Masjid Al - Hawariyyin</span>
                          </div>
                      </div>
                  </div>
                  
                  <!-- Konten di bawah gambar -->
                  <div class="pt-2 h-[calc(100%-12rem)] flex flex-col">
                      <!-- tema artikel -->
                      <span class="text-green-600 text-sm font-medium mb-2">Health</span>
                      <!-- Judul artikel -->
                      <h3 class="text-xl font-bold mb-2 relative inline-block">
                          <span>Mobile Clinics Deployed</span>
                          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-600 transition-all duration-700 group-hover:w-full"></span>
                      </h3>
                      
                      <!-- Deskripsi artikel -->
                      <p class="text-gray-600 text-sm mb-2">
                          Emergency medical teams provide care to remote areas affected by the conflict.
                      </p>
                      
                      <!-- Stats: Views, Likes, dan Comments -->
                      <div class="flex justify-left items-center text-gray-500 text-xs">
                          <div class="flex items-center mr-3">
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                              </svg>
                              <span>6.2K Views</span>
                          </div>
                          
                          <div class="flex items-center mr-3">
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                              </svg>
                              <span>156 Likes</span>
                          </div>
                          
                          <div class="flex items-center mr-3">
                              <!-- SVG Jam untuk waktu -->
                              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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