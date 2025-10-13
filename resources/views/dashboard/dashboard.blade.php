<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard User - Masjid Loves Palestine</title>
    
    <!-- Laravel Breeze Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
         

          <!-- Grid for the 4 boxes -->
          <div class="dashboard-grid">
            <!-- Box 1: Profil User -->
            <div class="dashboard-card dashboard-profile-card">
              <h2 class="dashboard-card-title">Profil User</h2>
              <div class="dashboard-profile-content">
                <img
                  src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1160&q=80"
                  alt="Profile"
                  class="dashboard-profile-image"
                />
                <div class="dashboard-profile-info">
                  <h3 class="dashboard-profile-name">{{ Auth::user()->name ?? 'Masjid Hawariyyin' }}</h3>
                  <div class="dashboard-profile-details">
                    <p class="dashboard-profile-detail">
                      <i class="far fa-envelope dashboard-detail-icon"></i>
                      {{ Auth::user()->email ?? 'sanra100825@gmail.com' }}
                    </p>
                    <p class="dashboard-profile-detail">
                      <i class="fas fa-phone dashboard-detail-icon"></i>
                      +62 817-2512-508
                    </p>
                    <p class="dashboard-profile-detail">
                      <i class="fas fa-map-marker-alt dashboard-detail-icon"></i>
                      Jl. Palestina Merdeka No. 123, Jakarta
                    </p>
                    <p class="dashboard-profile-detail">
                      <i class="far fa-calendar-alt dashboard-detail-icon"></i>
                      Bergabung sejak: Jan 2023
                    </p>
                  </div>
                </div>
              </div>

              <div class="dashboard-stats-grid">
                <div class="dashboard-stat-item">
                  <div class="flex items-center justify-between">
                    <div>
                      <p class="dashboard-stat-label">Konten Dibuat</p>
                      <p class="dashboard-stat-value">32</p>
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

            <!-- Box 2: Chart Data Viewers -->
            <div class="dashboard-card dashboard-chart-card">
              <div class="flex items-center justify-between mb-4">
                <h2 class="dashboard-card-title">Data Viewers</h2>
                <div class="flex items-center space-x-2 text-sm text-green-600">
                  <i class="fas fa-arrow-up"></i>
                  <span>12% dari bulan lalu</span>
                </div>
              </div>
              <div class="dashboard-chart-container">
                <canvas id="dashboardViewersChart"></canvas>
              </div>
              <div class="dashboard-chart-stats">
                <div>
                  <p class="dashboard-stat-label">Total viewers bulan ini</p>
                  <p class="dashboard-stat-value-large">4,823</p>
                </div>
              </div>
            </div>

            <!-- Box 3: Jumlah Artikel & Video -->
            <div class="dashboard-card dashboard-content-card">
              <h2 class="dashboard-card-title">Konten Saya</h2>
              <div class="dashboard-content-stats">
                <div class="dashboard-stat-card">
                  <div class="flex items-center justify-between">
                    <div>
                      <div class="dashboard-stat-number">24</div>
                      <div class="dashboard-stat-text">Jumlah Artikel</div>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                      <i class="fas fa-newspaper text-green-600 text-xl"></i>
                    </div>
                  </div>
                </div>
                <div class="dashboard-stat-card">
                  <div class="flex items-center justify-between">
                    <div>
                      <div class="dashboard-stat-number">8</div>
                      <div class="dashboard-stat-text">Jumlah Video</div>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                      <i class="fas fa-video text-blue-600 text-xl"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="dashboard-popular-content">
                <p class="dashboard-popular-label">Konten terpopuler:</p>
                <p class="dashboard-popular-title">"Solidaritas untuk Palestina: Cara Berkontribusi"</p>
                <div class="flex items-center space-x-4 text-sm text-gray-500 mt-2">
                  <span>📌 1.2k views</span>
                  <span>📌 245 likes</span>
                </div>
              </div>
              <div class="dashboard-content-link">
                <a href="{{ route('unggahan') }}" class="dashboard-link">
                  Lihat detail konten <i class="fas fa-arrow-right dashboard-link-icon"></i>
                </a>
              </div>
            </div>

            <!-- Box 4: Jumlah Points -->
            <div class="dashboard-card dashboard-points-card">
              <h2 class="dashboard-card-title">Points Saya</h2>
              <div class="dashboard-points-content">
                <div class="dashboard-points-display">
                  <div class="dashboard-points-number">1,250</div>
                  <div class="dashboard-points-label">Total points yang Anda miliki</div>
                </div>

                <div class="dashboard-progress-container">
                  <div class="dashboard-progress-bar">
                    <div class="dashboard-progress-fill" style="width: 65%"></div>
                  </div>
                  <p class="dashboard-progress-text">650 points lagi untuk level berikutnya</p>
                </div>

                <div class="dashboard-rewards-section">
                  <p class="dashboard-rewards-title">Hadiah yang dapat ditukar:</p>
                  <div class="dashboard-rewards-grid">
                    <div class="dashboard-reward-item">
                      <p class="dashboard-reward-name">Voucher Rp 50.000</p>
                      <p class="dashboard-reward-cost">500 points</p>
                    </div>
                    <div class="dashboard-reward-item">
                      <p class="dashboard-reward-name">Buku Eksklusif</p>
                      <p class="dashboard-reward-cost">800 points</p>
                    </div>
                  </div>
                </div>
                <a href="{{ route('redeem') }}">
                  <button class="dashboard-button dashboard-button-redeem">
                    <i class="fas fa-gift dashboard-button-icon"></i>Tukar Points
                  </button>
                </a>
              </div>
            </div>
          </div>

          <!-- Recent Activity Section -->
          <div class="mt-8">
            <div class="dashboard-card">
              <h2 class="dashboard-card-title mb-6">Aktivitas Terbaru</h2>
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="p-4 bg-green-50 rounded-xl hover:bg-green-100 transition-colors">
                  <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-3">
                    <i class="fas fa-plus text-green-600"></i>
                  </div>
                  <h3 class="font-semibold text-gray-900 mb-1">Artikel Baru</h3>
                  <p class="text-sm text-gray-600">2 dibuat hari ini</p>
                </div>
                
                <div class="p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors">
                  <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-3">
                    <i class="fas fa-eye text-blue-600"></i>
                  </div>
                  <h3 class="font-semibold text-gray-900 mb-1">Viewers</h3>
                  <p class="text-sm text-gray-600">+245 hari ini</p>
                </div>
                
                <div class="p-4 bg-amber-50 rounded-xl hover:bg-amber-100 transition-colors">
                  <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mb-3">
                    <i class="fas fa-heart text-amber-600"></i>
                  </div>
                  <h3 class="font-semibold text-gray-900 mb-1">Likes</h3>
                  <p class="text-sm text-gray-600">+45 hari ini</p>
                </div>
                
                <div class="p-4 bg-purple-50 rounded-xl hover:bg-purple-100 transition-colors">
                  <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-3">
                    <i class="fas fa-share text-purple-600"></i>
                  </div>
                  <h3 class="font-semibold text-gray-900 mb-1">Shares</h3>
                  <p class="text-sm text-gray-600">+12 hari ini</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Tombol testing - bisa dihapus setelah berhasil -->
    <button onclick="localStorage.removeItem('dashboardTutorialSeen'); window.dashboardTutorial.showTutorial();" 
            style="position: fixed; top: 10px; right: 10px; z-index: 10000; background: red; color: white; padding: 10px;">
        Test Tutorial
    </button>

    <script>
      // Chart initialization
      document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('dashboardViewersChart').getContext('2d');
        const viewersChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
              label: 'Viewers',
              data: [1200, 1900, 3000, 2500, 4200, 4823],
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
            plugins: {
              legend: {
                display: false
              }
            },
            scales: {
              y: {
                beginAtZero: true,
                grid: {
                  color: 'rgba(0, 0, 0, 0.1)'
                }
              },
              x: {
                grid: {
                  display: false
                }
              }
            }
          }
        });
      });
    </script>

    <!-- Tutorial Modal -->
    <div id="dashboardTutorial" class="dashboard-tutorial-overlay hidden">
        <div class="dashboard-tutorial-backdrop"></div>
        
        <div id="dashboardTutorialBubble" class="dashboard-tutorial-bubble">
            <div class="dashboard-tutorial-content">
                <h3 id="dashboardTutorialTitle" class="dashboard-tutorial-title"></h3>
                <p id="dashboardTutorialDescription" class="dashboard-tutorial-description"></p>
                <div class="dashboard-tutorial-actions">
                    <button id="dashboardSkipTutorial" class="dashboard-tutorial-btn dashboard-tutorial-skip">
                        Lewati
                    </button>
                    <button id="dashboardNextTutorial" class="dashboard-tutorial-btn dashboard-tutorial-next">
                        Lanjut
                    </button>
                </div>
            </div>
        </div>
        
        <div id="dashboardTutorialHighlight" class="dashboard-tutorial-highlight"></div>
    </div>
  </body>
</html>