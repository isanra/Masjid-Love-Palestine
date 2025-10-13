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
                <button class="dashboard-button dashboard-button-primary mt-4 md:mt-0 w-fit flex items-center gap-2">
                  <i class="fas fa-plus dashboard-button-icon"></i>
                  <span>Buat Artikel Baru</span>
                </button>
              </div>
            </div>
          </div>


          <!-- Stats Overview -->
          <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="dashboard-card text-center">
              <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-newspaper text-green-600 text-xl"></i>
              </div>
              <p class="text-2xl font-bold text-gray-900">24</p>
              <p class="text-sm text-gray-600">Total Artikel</p>
            </div>
            
            <div class="dashboard-card text-center">
              <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-eye text-blue-600 text-xl"></i>
              </div>
              <p class="text-2xl font-bold text-gray-900">4.8K</p>
              <p class="text-sm text-gray-600">Total Views</p>
            </div>
            
            <div class="dashboard-card text-center">
              <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-heart text-red-600 text-xl"></i>
              </div>
              <p class="text-2xl font-bold text-gray-900">1.2K</p>
              <p class="text-sm text-gray-600">Total Likes</p>
            </div>
            
            <div class="dashboard-card text-center">
              <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-share text-amber-600 text-xl"></i>
              </div>
              <p class="text-2xl font-bold text-gray-900">356</p>
              <p class="text-sm text-gray-600">Total Shares</p>
            </div>
          </div>

          <!-- Top 3 Articles Section -->
          <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Artikel Paling Populer</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
              <!-- Top 1 Article -->
              <div class="dashboard-card relative">
                <span class="absolute -top-2 -right-2 bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                  #1 Top
                </span>
                <div class="flex justify-between items-start mb-4">
                  <span class="dashboard-badge-premium">Humanitarian Crisis</span>
                  <div class="unggahan-dropdown">
                    <button class="unggahan-dropdown-toggle" onclick="unggahanToggleDropdown(this)">
                      <i class="fas fa-ellipsis-v text-gray-400 hover:text-gray-600"></i>
                    </button>
                    <div class="unggahan-dropdown-menu">
                      <div class="unggahan-dropdown-item" onclick="unggahanEditArticle(1)">
                        <i class="fas fa-edit unggahan-dropdown-icon"></i>Edit
                      </div>
                      <div class="unggahan-dropdown-item unggahan-dropdown-danger" onclick="unggahanDeleteArticle(1)">
                        <i class="fas fa-trash unggahan-dropdown-icon"></i>Hapus
                      </div>
                    </div>
                  </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">International Aid Reaches Gaza</h3>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">First humanitarian convoy in weeks enters Gaza through Rafah crossing amid ceasefire negotiations.</p>
                <div class="flex items-center justify-between text-sm text-gray-500">
                  <div class="flex items-center space-x-4">
                    <span class="flex items-center">
                      <i class="far fa-eye mr-1"></i> 1.2K
                    </span>
                    <span class="flex items-center">
                      <i class="far fa-heart mr-1"></i> 245
                    </span>
                  </div>
                  <span>Today</span>
                </div>
              </div>

              <!-- Top 2 Article -->
              <div class="dashboard-card relative">
                <span class="absolute -top-2 -right-2 bg-gray-400 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                  #2 Top
                </span>
                <div class="flex justify-between items-start mb-4">
                  <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Education</span>
                  <div class="unggahan-dropdown">
                    <button class="unggahan-dropdown-toggle" onclick="unggahanToggleDropdown(this)">
                      <i class="fas fa-ellipsis-v text-gray-400 hover:text-gray-600"></i>
                    </button>
                    <div class="unggahan-dropdown-menu">
                      <div class="unggahan-dropdown-item" onclick="unggahanEditArticle(2)">
                        <i class="fas fa-edit unggahan-dropdown-icon"></i>Edit
                      </div>
                      <div class="unggahan-dropdown-item unggahan-dropdown-danger" onclick="unggahanDeleteArticle(2)">
                        <i class="fas fa-trash unggahan-dropdown-icon"></i>Hapus
                      </div>
                    </div>
                  </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Schools Reopening in West Bank</h3>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">After months of closure, educational institutions resume operations with UN support.</p>
                <div class="flex items-center justify-between text-sm text-gray-500">
                  <div class="flex items-center space-x-4">
                    <span class="flex items-center">
                      <i class="far fa-eye mr-1"></i> 980
                    </span>
                    <span class="flex items-center">
                      <i class="far fa-heart mr-1"></i> 187
                    </span>
                  </div>
                  <span>2 days ago</span>
                </div>
              </div>

              <!-- Top 3 Article -->
              <div class="dashboard-card relative">
                <span class="absolute -top-2 -right-2 bg-amber-700 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                  #3 Top
                </span>
                <div class="flex justify-between items-start mb-4">
                  <span class="inline-block px-3 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">Health</span>
                  <div class="unggahan-dropdown">
                    <button class="unggahan-dropdown-toggle" onclick="unggahanToggleDropdown(this)">
                      <i class="fas fa-ellipsis-v text-gray-400 hover:text-gray-600"></i>
                    </button>
                    <div class="unggahan-dropdown-menu">
                      <div class="unggahan-dropdown-item" onclick="unggahanEditArticle(3)">
                        <i class="fas fa-edit unggahan-dropdown-icon"></i>Edit
                      </div>
                      <div class="unggahan-dropdown-item unggahan-dropdown-danger" onclick="unggahanDeleteArticle(3)">
                        <i class="fas fa-trash unggahan-dropdown-icon"></i>Hapus
                      </div>
                    </div>
                  </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Mobile Clinics Deployed</h3>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">Emergency medical teams provide care to remote areas affected by the conflict.</p>
                <div class="flex items-center justify-between text-sm text-gray-500">
                  <div class="flex items-center space-x-4">
                    <span class="flex items-center">
                      <i class="far fa-eye mr-1"></i> 845
                    </span>
                    <span class="flex items-center">
                      <i class="far fa-heart mr-1"></i> 162
                    </span>
                  </div>
                  <span>3 days ago</span>
                </div>
              </div>
            </div>
          </div>

          <!-- All Articles Section -->
          <div>
            <div class="flex items-center justify-between mb-6">
              <h2 class="text-2xl font-bold text-gray-900">Semua Unggahan Anda</h2>
              <div class="flex space-x-2">
                <button class="dashboard-filter-button active">Semua</button>
                <button class="dashboard-filter-button">Populer</button>
                <button class="dashboard-filter-button">Terbaru</button>
              </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              <!-- Article 1 -->
              <div class="dashboard-card">
                <div class="flex justify-between items-start mb-4">
                  <span class="dashboard-badge-premium">Humanitarian Crisis</span>
                  <div class="unggahan-dropdown">
                    <button class="unggahan-dropdown-toggle" onclick="unggahanToggleDropdown(this)">
                      <i class="fas fa-ellipsis-v text-gray-400 hover:text-gray-600"></i>
                    </button>
                    <div class="unggahan-dropdown-menu">
                      <div class="unggahan-dropdown-item" onclick="unggahanEditArticle(4)">
                        <i class="fas fa-edit unggahan-dropdown-icon"></i>Edit
                      </div>
                      <div class="unggahan-dropdown-item unggahan-dropdown-danger" onclick="unggahanDeleteArticle(4)">
                        <i class="fas fa-trash unggahan-dropdown-icon"></i>Hapus
                      </div>
                    </div>
                  </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">International Aid Reaches</h3>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">First humanitarian convoy in weeks through Rafah crossing amid cease negotiations.</p>
                <div class="flex items-center justify-between text-sm text-gray-500">
                  <div class="flex items-center space-x-4">
                    <span class="flex items-center">
                      <i class="far fa-eye mr-1"></i> 720
                    </span>
                    <span class="flex items-center">
                      <i class="far fa-heart mr-1"></i> 135
                    </span>
                  </div>
                  <span>4 days ago</span>
                </div>
              </div>

              <!-- Article 2 -->
              <div class="dashboard-card">
                <div class="flex justify-between items-start mb-4">
                  <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Education</span>
                  <div class="unggahan-dropdown">
                    <button class="unggahan-dropdown-toggle" onclick="unggahanToggleDropdown(this)">
                      <i class="fas fa-ellipsis-v text-gray-400 hover:text-gray-600"></i>
                    </button>
                    <div class="unggahan-dropdown-menu">
                      <div class="unggahan-dropdown-item" onclick="unggahanEditArticle(5)">
                        <i class="fas fa-edit unggahan-dropdown-icon"></i>Edit
                      </div>
                      <div class="unggahan-dropdown-item unggahan-dropdown-danger" onclick="unggahanDeleteArticle(5)">
                        <i class="fas fa-trash unggahan-dropdown-icon"></i>Hapus
                      </div>
                    </div>
                  </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Education Support Programs</h3>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">New initiatives to support Palestinian students affected by the conflict.</p>
                <div class="flex items-center justify-between text-sm text-gray-500">
                  <div class="flex items-center space-x-4">
                    <span class="flex items-center">
                      <i class="far fa-eye mr-1"></i> 650
                    </span>
                    <span class="flex items-center">
                      <i class="far fa-heart mr-1"></i> 120
                    </span>
                  </div>
                  <span>5 days ago</span>
                </div>
              </div>

              <!-- Article 3 -->
              <div class="dashboard-card">
                <div class="flex justify-between items-start mb-4">
                  <span class="inline-block px-3 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">Health</span>
                  <div class="unggahan-dropdown">
                    <button class="unggahan-dropdown-toggle" onclick="unggahanToggleDropdown(this)">
                      <i class="fas fa-ellipsis-v text-gray-400 hover:text-gray-600"></i>
                    </button>
                    <div class="unggahan-dropdown-menu">
                      <div class="unggahan-dropdown-item" onclick="unggahanEditArticle(6)">
                        <i class="fas fa-edit unggahan-dropdown-icon"></i>Edit
                      </div>
                      <div class="unggahan-dropdown-item unggahan-dropdown-danger" onclick="unggahanDeleteArticle(6)">
                        <i class="fas fa-trash unggahan-dropdown-icon"></i>Hapus
                      </div>
                    </div>
                  </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Mental Health Support</h3>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">Counseling services expanded for trauma victims in conflict areas.</p>
                <div class="flex items-center justify-between text-sm text-gray-500">
                  <div class="flex items-center space-x-4">
                    <span class="flex items-center">
                      <i class="far fa-eye mr-1"></i> 580
                    </span>
                    <span class="flex items-center">
                      <i class="far fa-heart mr-1"></i> 98
                    </span>
                  </div>
                  <span>1 week ago</span>
                </div>
              </div>

              <!-- Additional Articles -->
              <div class="dashboard-card">
                <div class="flex justify-between items-start mb-4">
                  <span class="dashboard-badge-premium">Humanitarian Crisis</span>
                  <div class="unggahan-dropdown">
                    <button class="unggahan-dropdown-toggle" onclick="unggahanToggleDropdown(this)">
                      <i class="fas fa-ellipsis-v text-gray-400 hover:text-gray-600"></i>
                    </button>
                    <div class="unggahan-dropdown-menu">
                      <div class="unggahan-dropdown-item" onclick="unggahanEditArticle(7)">
                        <i class="fas fa-edit unggahan-dropdown-icon"></i>Edit
                      </div>
                      <div class="unggahan-dropdown-item unggahan-dropdown-danger" onclick="unggahanDeleteArticle(7)">
                        <i class="fas fa-trash unggahan-dropdown-icon"></i>Hapus
                      </div>
                    </div>
                  </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Food Distribution Update</h3>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">Latest updates on food aid distribution in affected regions.</p>
                <div class="flex items-center justify-between text-sm text-gray-500">
                  <div class="flex items-center space-x-4">
                    <span class="flex items-center">
                      <i class="far fa-eye mr-1"></i> 520
                    </span>
                    <span class="flex items-center">
                      <i class="far fa-heart mr-1"></i> 85
                    </span>
                  </div>
                  <span>1 week ago</span>
                </div>
              </div>

              <div class="dashboard-card">
                <div class="flex justify-between items-start mb-4">
                  <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Education</span>
                  <div class="unggahan-dropdown">
                    <button class="unggahan-dropdown-toggle" onclick="unggahanToggleDropdown(this)">
                      <i class="fas fa-ellipsis-v text-gray-400 hover:text-gray-600"></i>
                    </button>
                    <div class="unggahan-dropdown-menu">
                      <div class="unggahan-dropdown-item" onclick="unggahanEditArticle(8)">
                        <i class="fas fa-edit unggahan-dropdown-icon"></i>Edit
                      </div>
                      <div class="unggahan-dropdown-item unggahan-dropdown-danger" onclick="unggahanDeleteArticle(8)">
                        <i class="fas fa-trash unggahan-dropdown-icon"></i>Hapus
                      </div>
                    </div>
                  </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Online Learning Initiative</h3>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">Digital platforms for continuous education during crisis.</p>
                <div class="flex items-center justify-between text-sm text-gray-500">
                  <div class="flex items-center space-x-4">
                    <span class="flex items-center">
                      <i class="far fa-eye mr-1"></i> 480
                    </span>
                    <span class="flex items-center">
                      <i class="far fa-heart mr-1"></i> 76
                    </span>
                  </div>
                  <span>2 weeks ago</span>
                </div>
              </div>

              <div class="dashboard-card">
                <div class="flex justify-between items-start mb-4">
                  <span class="inline-block px-3 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">Health</span>
                  <div class="unggahan-dropdown">
                    <button class="unggahan-dropdown-toggle" onclick="unggahanToggleDropdown(this)">
                      <i class="fas fa-ellipsis-v text-gray-400 hover:text-gray-600"></i>
                    </button>
                    <div class="unggahan-dropdown-menu">
                      <div class="unggahan-dropdown-item" onclick="unggahanEditArticle(9)">
                        <i class="fas fa-edit unggahan-dropdown-icon"></i>Edit
                      </div>
                      <div class="unggahan-dropdown-item unggahan-dropdown-danger" onclick="unggahanDeleteArticle(9)">
                        <i class="fas fa-trash unggahan-dropdown-icon"></i>Hapus
                      </div>
                    </div>
                  </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Medical Supply Update</h3>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">Current status of medical supplies in healthcare facilities.</p>
                <div class="flex items-center justify-between text-sm text-gray-500">
                  <div class="flex items-center space-x-4">
                    <span class="flex items-center">
                      <i class="far fa-eye mr-1"></i> 420
                    </span>
                    <span class="flex items-center">
                      <i class="far fa-heart mr-1"></i> 65
                    </span>
                  </div>
                  <span>2 weeks ago</span>
                </div>
              </div>
            </div>

            <!-- Pagination -->
            <div class="unggahan-pagination mt-8">
              <nav class="unggahan-pagination-nav">
                <a href="#" class="unggahan-pagination-link unggahan-pagination-prev">Previous</a>
                <a href="#" class="unggahan-pagination-link unggahan-pagination-active">1</a>
                <a href="#" class="unggahan-pagination-link">2</a>
                <a href="#" class="unggahan-pagination-link">3</a>
                <a href="#" class="unggahan-pagination-link unggahan-pagination-next">Next</a>
              </nav>
            </div>
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