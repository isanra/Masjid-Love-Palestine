<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - Masjid Loves Palestine</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  
  <body class="min-h-screen bg-gray-50 dashboard-body">
    <div class="dashboard-container">
      @include('components.dashboard-navigation')

      <div class="dashboard-main-content">
        @include('components.dashboard-topbar')
        
        <div class="dashboard-content">
         
          {{-- ======================================================= --}}
          {{-- TAMPILAN UNTUK MASJID --}}
          {{-- ======================================================= --}}
          @if ($isMasjid)

              <div class="dashboard-grid">
                <div class="dashboard-card dashboard-profile-card">
                  {{-- ... (Kode Profil User Anda yang sudah dinamis) ... --}}
                   <h2 class="dashboard-card-title">Profil User</h2>
                    <div class="dashboard-profile-content">
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
                        <img src="{{ $photoUrl }}" alt="{{ Auth::user()->name }}" class="dashboard-profile-image"/>
                        <div class="dashboard-profile-info">
                            <h3 class="dashboard-profile-name">
                                {{ trim(Auth::user()->name . ' ' . Auth::user()->profile?->nama_belakang) }}
                            </h3>
                            <div class="dashboard-profile-details">
                                <p class="dashboard-profile-detail"><i class="far fa-envelope dashboard-detail-icon"></i>{{ Auth::user()->email ?? '' }}</p>
                                <p class="dashboard-profile-detail"><i class="fas fa-phone dashboard-detail-icon"></i>{{ Auth::user()->profile?->no_telp ?? 'Nomor Belum diisi' }}</p>
                                <p class="dashboard-profile-detail"><i class="fas fa-map-marker-alt dashboard-detail-icon"></i>{{ Auth::user()->profile?->lokasi_maps ?? 'Alamat Belum diisi' }}</p>
                                <p class="dashboard-profile-detail"><i class="far fa-calendar-alt dashboard-detail-icon"></i>Bergabung sejak: {{ Auth::user()->created_at ? Auth::user()->created_at->format('d F Y') : '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-stats-grid">
                        <div class="dashboard-stat-item">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="dashboard-stat-label">Konten Dibuat</p>
                                    <p class="dashboard-stat-value">{{ $posts->count() ?? 0 }}</p>
                                </div>
                                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-newspaper text-green-600"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-profile-actions">
                        <a href="{{ route('profile.edit') }}" class="dashboard-button dashboard-button-primary">
                            <i class="fas fa-edit dashboard-button-icon"></i>Edit Profil
                        </a>
                    </div>
                </div>

                <div class="dashboard-card dashboard-chart-card">
                   {{-- ... (Kode Chart Anda yang sudah dinamis) ... --}}
                   <div class="flex items-center justify-between mb-4">
                        <h2 class="dashboard-card-title">Data Viewers (7 Hari Terakhir)</h2>
                        @if ($changeDirection === 'increase')
                            <div class="flex items-center space-x-1 text-sm text-green-600"><i class="fas fa-arrow-up"></i><span>{{ $percentageChange }}% dari minggu lalu</span></div>
                        @elseif ($changeDirection === 'decrease')
                            <div class="flex items-center space-x-1 text-sm text-red-600"><i class="fas fa-arrow-down"></i><span>{{ abs($percentageChange) }}% dari minggu lalu</span></div>
                        @elseif ($changeDirection === 'new')
                            <div class="flex items-center space-x-1 text-sm text-green-600"><i class="fas fa-star"></i><span>Viewers baru minggu ini</span></div>
                        @endif
                    </div>
                    <div class="dashboard-chart-container"><canvas id="dashboardViewersChart"></canvas></div>
                    <div class="dashboard-chart-stats mt-4">
                        <div>
                            <p class="dashboard-stat-label">Total viewers 7 hari terakhir</p>
                            <p class="dashboard-stat-value-large">{{ number_format($currentWeekViews) }}</p> 
                        </div>
                    </div>
                </div>

                <div class="dashboard-card dashboard-content-card">
                  {{-- ... (Kode Konten Saya Anda yang sudah dinamis) ... --}}
                   <h2 class="dashboard-card-title">Konten Saya</h2>
                    <div class="dashboard-content-stats">
                        <div class="dashboard-stat-card">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="dashboard-stat-number">{{ $posts->where('type', 'artikel')->count() ?? 0 }}</div>
                                    <div class="dashboard-stat-text">Jumlah Artikel</div>
                                </div>
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center"><i class="fas fa-newspaper text-green-600 text-xl"></i></div>
                            </div>
                        </div>
                        <div class="dashboard-stat-card">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="dashboard-stat-number">{{ $posts->where('type', 'video')->count() ?? 0 }}</div>
                                    <div class="dashboard-stat-text">Jumlah Video</div>
                                </div>
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center"><i class="fas fa-video text-blue-600 text-xl"></i></div>
                            </div>
                        </div>
                    </div>
                    @php $mostPopularPost = $posts->sortByDesc('views_count')->first(); @endphp
                    @if ($mostPopularPost)
                        <div class="dashboard-popular-content">
                            <p class="dashboard-popular-label">Konten terpopuler:</p>
                            <p class="dashboard-popular-title">"{{ $mostPopularPost->judul }}"</p> 
                            <div class="flex items-center space-x-4 text-sm text-gray-500 mt-2">
                                <span>📌 {{ $mostPopularPost->views_count ?? 0 }} views</span> 
                                <span>📌 {{ $mostPopularPost->likes_count ?? 0 }} likes</span> 
                            </div>
                        </div>
                        <div class="dashboard-content-link">
                            <a href="{{ route('posts.show', $mostPopularPost) }}" class="dashboard-link">Lihat detail konten <i class="fas fa-arrow-right dashboard-link-icon"></i></a>
                        </div>
                    @else
                        <div class="dashboard-popular-content"><p class="dashboard-popular-label">Belum ada konten yang dibuat.</p></div>
                    @endif
                </div>

                <div class="dashboard-card dashboard-points-card">
                  {{-- ... (Kode Poin Anda yang sudah dinamis) ... --}}
                   <h2 class="dashboard-card-title">Points Saya</h2>
                    <div class="dashboard-points-content">
                        <div class="dashboard-points-display">
                            <div class="dashboard-points-number">{{ $userPoin }}</div>
                            <div class="dashboard-points-label">Total points yang Anda miliki</div>
                        </div>
                        <div class="dashboard-progress-container">
                            <div class="dashboard-progress-bar"><div class="dashboard-progress-fill" style="width: {{ ($user->profile?->unredeemed_views ?? 0) * 2 }}%"></div></div>
                            <p class="dashboard-progress-text">{{ 50 - ($user->profile?->unredeemed_views ?? 0) }} views lagi untuk 1 poin</p>
                        </div>
                        <div class="dashboard-rewards-section">
                            <p class="dashboard-rewards-title">Hadiah yang dapat ditukar:</p>
                            <div class="dashboard-rewards-grid">
                                @forelse ($redeemItems as $item)
                                    <div class="dashboard-reward-item">
                                        <p class="dashboard-reward-name">{{ $item->nama_barang }}</p>
                                        <p class="dashboard-reward-cost">{{ $item->poin_diperlukan }} points</p>
                                    </div>
                                @empty
                                    <p class="text-xs text-gray-500 col-span-2">Belum ada hadiah yang tersedia.</p>
                                @endforelse
                            </div>
                        </div>
                        <a href="{{ route('redeem.index') }}"><button class="dashboard-button dashboard-button-redeem"><i class="fas fa-gift dashboard-button-icon"></i>Tukar Points</button></a>
                    </div>
                </div>
              </div>

              <div class="mt-8">
                <div class="dashboard-card">
                  {{-- ... (Kode Aktivitas Terbaru Anda yang sudah dinamis) ... --}}
                  <h2 class="dashboard-card-title mb-6">Aktivitas Terbaru (Hari Ini)</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="p-4 bg-green-50 rounded-xl hover:bg-green-100 transition-colors">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-3"><i class="fas fa-plus text-green-600"></i></div>
                            <h3 class="font-semibold text-gray-900 mb-1">Konten Baru</h3>
                            <p class="text-sm text-gray-600">{{ $postsToday }} dibuat hari ini</p>
                        </div>
                        <div class="p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-3"><i class="fas fa-eye text-blue-600"></i></div>
                            <h3 class="font-semibold text-gray-900 mb-1">Viewers</h3>
                            <p class="text-sm text-gray-600">+{{ $viewsToday }} hari ini</p>
                        </div>
                        <div class="p-4 bg-amber-50 rounded-xl hover:bg-amber-100 transition-colors">
                            <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mb-3"><i class="fas fa-heart text-amber-600"></i></div>
                            <h3 class="font-semibold text-gray-900 mb-1">Likes</h3>
                            <p class="text-sm text-gray-600">+{{ $likesToday }} hari ini</p>
                        </div>
                        <div class="p-4 bg-purple-50 rounded-xl hover:bg-purple-100 transition-colors">
                            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-3"><i class="fas fa-share text-purple-600"></i></div>
                            <h3 class="font-semibold text-gray-900 mb-1">Shares</h3>
                            <p class="text-sm text-gray-600">+{{ $sharesToday }} hari ini</p>
                        </div>
                    </div>
                </div>
              </div>
          
          {{-- ======================================================= --}}
          {{-- TAMPILAN UNTUK PEMBACA (USER BIASA) --}}
          {{-- ======================================================= --}}
          @else
              <div class="dashboard-card">
                  <h2 class="dashboard-card-title mb-6">Konten yang Disimpan</h2>
                  
                  @if ($savedPosts->count() > 0)
                      <div class="space-y-4">
                          @foreach ($savedPosts as $post)
                              <a href="{{ route('posts.show', $post) }}" class="flex items-center p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors">
                                  @php
                                      $thumbnailUrl = Str::startsWith($post->thumbnail, 'http') ? $post->thumbnail : Storage::url($post->thumbnail);
                                  @endphp
                                  <img src="{{ $thumbnailUrl }}" alt="{{ $post->judul }}" class="w-20 h-16 object-cover rounded-md mr-4">
                                  <div class="flex-1">
                                      <p class="font-semibold text-gray-800 line-clamp-2">{{ $post->judul }}</p>
                                      <p class="text-sm text-gray-500">Oleh {{ $post->user->name }}</p>
                                  </div>
                                  <span class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                              </a>
                          @endforeach
                      </div>
                  @else
                      <p class="text-gray-500">Anda belum menyimpan postingan apapun.</p>
                  @endif

                  <div class="mt-8">
                       {{ $savedPosts->links() }}
                  </div>
              </div>
          @endif
           
        </div>
      </div>
    </div>

    {{-- Script untuk Chart.js (Hanya dijalankan jika user adalah masjid) --}}
    @if ($isMasjid)
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('dashboardViewersChart');
        if (ctx) { 
            const viewersChart = new Chart(ctx.getContext('2d'), {
                type: 'line', 
                data: {
                    labels: @json($chartLabels), 
                    datasets: [{
                        label: 'Viewers',
                        data: @json($chartValues), 
                        borderColor: '#059669', 
                        backgroundColor: 'rgba(5, 150, 105, 0.1)', 
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, 
                    plugins: { legend: { display: false } },
                    scales: {
                        y: {
                            beginAtZero: true, 
                            grid: { color: 'rgba(0, 0, 0, 0.05)' },
                            ticks: { precision: 0 }
                        },
                        x: { grid: { display: false } }
                    }
                }
            });
        }
      });
    </script>
    @endif
  </body>
</html>