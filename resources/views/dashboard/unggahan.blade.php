<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Unggahan Anda - Dashboard User</title>
    
    <!-- Laravel Breeze Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  </head>
  
  <body class="min-h-screen bg-gray-50 dashboard-body">
    <div class="dashboard-container">
      <!-- =============== Navigation ================ -->
      @include('components.dashboard-navigation')

      <!-- ========================= Main ==================== -->
      <div class="dashboard-main-content">
        @include('components.dashboard-topbar')

        <!-- Main Content -->
        <div class="dashboard-content">
          <!-- Header Section -->
          <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
              <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Unggahan Artikel Anda</h1>
                <p class="text-gray-600">Kelola dan pantau performa artikel Anda</p>
              </div>
              <div class="self-end md:self-auto md:ml-auto">
                <a href="{{ route('posts.create') }}" class="dashboard-button dashboard-button-primary mt-4 md:mt-0 w-fit flex items-center gap-2 no-underline"> {{-- Tambah no-underline jika perlu --}}
                  <i class="fas fa-plus dashboard-button-icon"></i>
                  <span>Buat Artikel Baru</span>
                </a>
              </div>
            </div>
          </div>


          <!-- Stats Overview -->
          <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="dashboard-card text-center">
              <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-newspaper text-green-600 text-xl"></i>
              </div>
              <p class="text-2xl font-bold text-gray-900">{{ $posts->count() ?? 0 }}</p>
              <p class="text-sm text-gray-600">Total Artikel</p>
            </div>
            
            <div class="dashboard-card text-center">
              <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-eye text-blue-600 text-xl"></i>
              </div>
              <p class="text-2xl font-bold text-gray-900">{{ $posts->sum('views_count') ?? 0 }}</p>
              <p class="text-sm text-gray-600">Total Views</p>
            </div>
            
            <div class="dashboard-card text-center">
              <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-heart text-red-600 text-xl"></i>
              </div>
              <p class="text-2xl font-bold text-gray-900">{{ number_format($posts->sum('likes_count')) ?? 0 }}</p>
              <p class="text-sm text-gray-600">Total Likes</p>
            </div>
            
            <div class="dashboard-card text-center">
              <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-share text-amber-600 text-xl"></i>
              </div>
              <p class="text-2xl font-bold text-gray-900">{{ number_format($totalShares) ?? 0 }}</p>
              <p class="text-sm text-gray-600">Total Shares</p>
            </div>
          </div>

          <!-- Top 3 Articles Section -->
          <div class="mb-12"> {{-- Tambah margin bawah --}}
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Konten Paling Populer</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              @php
                // Warna untuk badge ranking
                $rankColors = ['bg-amber-500', 'bg-gray-400', 'bg-amber-700'];
              @endphp
              
              {{-- GANTI $posts menjadi $popularPost --}}
              @forelse ($popularPosts as $popularPost) 
                <div class="dashboard-card relative flex flex-col"> {{-- Tambah flex flex-col --}}
                  {{-- Badge Ranking --}}
                  <span class="absolute -top-3 -right-3 h-10 w-10 flex items-center justify-center font-bold text-white rounded-full shadow-md {{ $rankColors[$loop->index] ?? 'bg-gray-400' }}">
                      #{{ $loop->iteration }}
                  </span>

                  <div class="flex justify-between items-start mb-4">
                    {{-- Gunakan $popularPost --}}
                    <span class="dashboard-badge-premium">{{ explode(',', $popularPost->topik_utama)[0] }}</span> 
                    <div class="unggahan-dropdown relative">
                      <button class="unggahan-dropdown-toggle" onclick="unggahanToggleDropdown(this)">
                        <i class="fas fa-ellipsis-v text-gray-400 hover:text-gray-600"></i>
                      </button>
                      <div class="unggahan-dropdown-menu hidden absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg z-10 border">
                        {{-- Gunakan $popularPost --}}
                        <a href="{{ route('posts.edit', $popularPost) }}" class="unggahan-dropdown-item block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"> 
                          <i class="fas fa-edit unggahan-dropdown-icon mr-2"></i>Edit
                        </a>
                        {{-- Gunakan $popularPost --}}
                        <form action="{{ route('posts.destroy', $popularPost) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus konten ini?');" class="w-full"> 
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="unggahan-dropdown-item unggahan-dropdown-danger block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                              <i class="fas fa-trash unggahan-dropdown-icon mr-2"></i>Hapus
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                  {{-- Gunakan $popularPost --}}
                  <h3 class="text-lg font-bold text-gray-900 mb-3 line-clamp-2">
                    <a href="{{ route('posts.show', $popularPost) }}" class="hover:text-indigo-600">
                        {{ $popularPost->judul }} 
                    </a>
                  </h3>
                  {{-- Gunakan $popularPost --}}
                  <p class="text-gray-600 text-sm mb-4 leading-relaxed line-clamp-3 flex-grow"> 
                    {{ Str::words(strip_tags($popularPost->isi), 15, '...') }}
                  </p>
                  {{-- Gunakan $popularPost --}}
                  <div class="flex items-center justify-between text-sm text-gray-500 mt-auto pt-4 border-t border-gray-100"> 
                    <div class="flex items-center space-x-4">
                      <span class="flex items-center" title="Views">
                        <i class="far fa-eye mr-1"></i> {{ $popularPost->views_count ?? 0 }} 
                      </span>
                      <span class="flex items-center" title="Likes">
                        <i class="far fa-heart mr-1"></i> {{ $popularPost->likes_count ?? 0 }} 
                      </span>
                    </div>
                    <span>{{ $popularPost->created_at->diffForHumans() }}</span> 
                  </div>
                </div>
                @empty
              <div class="md:col-span-3 text-center py-8 text-gray-500 bg-gray-50 rounded-lg">
                  <p>Belum ada konten populer untuk ditampilkan.</p>
              </div>
             @endforelse {{-- Akhir loop popularPosts --}}

            </div>
          </div>

          <!-- All Articles Section -->
          <div>
            <!-- Filter -->
            <div class="flex items-center justify-between mb-6">
              <h2 class="text-2xl font-bold text-gray-900">Semua Unggahan Anda</h2>
              <div class="flex space-x-2">
                  {{-- Tombol Semua --}}
                  {{-- Aktif jika TIDAK ada filter 'populer' atau 'terbaru' --}}
                  <a href="{{ route('dashboard.unggahan') }}" 
                     class="dashboard-filter-button {{ !request()->filled('filter') || !in_array(request('filter'), ['populer', 'terbaru']) ? 'active' : '' }}">
                     Semua
                  </a>

                  {{-- Tombol Populer --}}
                  <a href="{{ route('dashboard.unggahan', ['filter' => 'populer']) }}" 
                     class="dashboard-filter-button {{ request('filter') === 'populer' ? 'active' : '' }}">
                     Populer
                  </a>

                  {{-- Tombol Terbaru --}}
                  <a href="{{ route('dashboard.unggahan', ['filter' => 'terbaru']) }}" 
                     class="dashboard-filter-button {{ request('filter') === 'terbaru' ? 'active' : '' }}">
                     Terbaru
                  </a>
              </div>
            </div>
            <!-- end filter -->

            <!-- Article dan video -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              @forelse ($posts as $post)
              <div class="dashboard-card">
                <div class="flex justify-between items-start mb-4">
                  <span class="dashboard-badge-premium">{{ explode(',', $post->topik_utama)[0] }}</span>
                  <div class="unggahan-dropdown">
                    <button class="unggahan-dropdown-toggle" onclick="unggahanToggleDropdown(this)">
                      <i class="fas fa-ellipsis-v text-gray-400 hover:text-gray-600"></i>
                    </button>
                    <div class="unggahan-dropdown-menu">
                      <div class="unggahan-dropdown-item" onclick="unggahanEditArticle(4)">
                        <i class="fas fa-edit unggahan-dropdown-icon"></i>Edit
                      </div>
                      <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus konten ini?');" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="unggahan-dropdown-item unggahan-dropdown-danger block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                <i class="fas fa-trash unggahan-dropdown-icon mr-2"></i>Hapus
                            </button>
                        </form>
                    </div>
                  </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">{{ $post->judul }}</h3>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">{{ Str::words(strip_tags($post->isi), 15, '...') }}</p>
                <div class="flex items-center justify-between text-sm text-gray-500">
                  <div class="flex items-center space-x-4">
                    <span class="flex items-center">
                      <i class="far fa-eye mr-1"></i> {{ $post->views_count ?? 0 }}
                    </span>
                    <span class="flex items-center">
                      <i class="far fa-heart mr-1"></i> {{ $post->likes_count ?? 0 }}
                    </span>
                  </div>
                  <span>{{ $post->created_at->diffForHumans() }}</span>
                </div>
              </div>
            @empty
              {{-- Pesan jika tidak ada postingan sama sekali --}}
              <div class="md:col-span-2 lg:col-span-3 text-center py-10 text-gray-500 bg-gray-50 rounded-lg">
                  <p>Anda belum membuat unggahan apapun.</p>
              </div>
            @endforelse

            </div>

            <!-- Pagination -->
            <div class="unggahan-pagination mt-8">
              {{ $posts->links() }}
            </div>
            <!-- end pagination -->

          </div>
        </div>
      </div>
    </div>

    <script>
      // Dropdown functionality
      function unggahanInitDropdowns() {
        // Close dropdowns when clicking elsewhere
        document.addEventListener("click", function (event) {
          if (!event.target.matches(".unggahan-dropdown-toggle") && !event.target.closest(".unggahan-dropdown-toggle")) {
            document.querySelectorAll(".unggahan-dropdown-menu").forEach((menu) => {
              menu.classList.remove("unggahan-show");
            });
          }
        });
      }

      // Dropdown toggle function
      function unggahanToggleDropdown(button) {
        // Close all other dropdowns first
        document.querySelectorAll(".unggahan-dropdown-menu").forEach((menu) => {
          if (menu !== button.nextElementSibling) {
            menu.classList.remove("unggahan-show");
          }
        });

        // Toggle the clicked dropdown
        const dropdown = button.nextElementSibling;
        dropdown.classList.toggle("unggahan-show");
      }

      // Article functions
      function unggahanEditArticle(id) {
        alert(`Edit artikel dengan ID: ${id}`);
        // Implement edit functionality here
      }

      function unggahanDeleteArticle(id) {
        if (confirm("Apakah Anda yakin ingin menghapus artikel ini?")) {
          alert(`Hapus artikel dengan ID: ${id}`);
          // Implement delete functionality here
        }
      }

      // Initialize on load
      document.addEventListener('DOMContentLoaded', function() {
        unggahanInitDropdowns();
      });

      // Export functions to global scope for onclick attributes
      window.unggahanToggleDropdown = unggahanToggleDropdown;
      window.unggahanEditArticle = unggahanEditArticle;
      window.unggahanDeleteArticle = unggahanDeleteArticle;
    </script>
  </body>
</html>