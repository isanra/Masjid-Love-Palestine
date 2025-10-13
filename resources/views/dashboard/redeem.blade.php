<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Redeem untuk Palestina - Dashboard User</title>
    
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
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Redeem untuk Palestina</h1>
                <p class="text-gray-600">Tukarkan point Anda untuk membantu saudara-saudara kita di Palestina</p>
              </div>
              <div class="dashboard-card mt-4 md:mt-0 p-4 bg-green-50 border border-green-200">
                <p class="text-sm text-gray-600">Point Anda</p>
                <p class="text-2xl font-bold text-green-800">1,250</p>
              </div>
            </div>
          </div>

          <!-- Filter Options -->
          <div class="flex flex-wrap gap-2 mb-8">
            <button class="dashboard-filter-button active">Semua</button>
            <button class="dashboard-filter-button">Paket Makanan</button>
            <button class="dashboard-filter-button">Obat-obatan</button>
            <button class="dashboard-filter-button">Bantuan Pendidikan</button>
            <button class="dashboard-filter-button">Bantuan Darurat</button>
          </div>

          <!-- Grid Items untuk Diredeem -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
            <!-- Item 1 -->
            <div class="dashboard-card p-4 flex flex-col">
              <div class="h-40 bg-gray-200 rounded-xl mb-4 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Paket Makanan" class="w-full h-full object-cover" />
              </div>
              <h3 class="font-semibold text-lg mb-2 text-gray-900">Paket Makanan Darurat</h3>
              <p class="text-gray-600 text-sm mb-4 leading-relaxed">Paket makanan untuk keluarga selama 1 minggu</p>
              <div class="mt-auto space-y-3">
                <div class="text-center">
                  <span class="font-bold text-green-800 text-lg block">500 points</span>
                </div>
                <button class="dashboard-button dashboard-button-primary w-full redeem-button" data-points="500" data-item="Paket Makanan Darurat">
                  Redeem
                </button>
              </div>
            </div>

            <!-- Item 2 -->
            <div class="dashboard-card p-4 flex flex-col">
              <div class="h-40 bg-gray-200 rounded-xl mb-4 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Obat-obatan" class="w-full h-full object-cover" />
              </div>
              <h3 class="font-semibold text-lg mb-2 text-gray-900">Paket Obat-obatan</h3>
              <p class="text-gray-600 text-sm mb-4 leading-relaxed">Paket P3K dan obat dasar untuk 10 keluarga</p>
              <div class="mt-auto space-y-3">
                <div class="text-center">
                  <span class="font-bold text-green-800 text-lg block">750 points</span>
                </div>
                <button class="dashboard-button dashboard-button-primary w-full redeem-button" data-points="750" data-item="Paket Obat-obatan">
                  Redeem
                </button>
              </div>
            </div>

            <!-- Item 3 -->
            <div class="dashboard-card p-4 flex flex-col">
              <div class="h-40 bg-gray-200 rounded-xl mb-4 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Pendidikan" class="w-full h-full object-cover" />
              </div>
              <h3 class="font-semibold text-lg mb-2 text-gray-900">Paket Pendidikan</h3>
              <p class="text-gray-600 text-sm mb-4 leading-relaxed">Buku dan alat tulis untuk 5 anak sekolah</p>
              <div class="mt-auto space-y-3">
                <div class="text-center">
                  <span class="font-bold text-green-800 text-lg block">600 points</span>
                </div>
                <button class="dashboard-button dashboard-button-primary w-full redeem-button" data-points="600" data-item="Paket Pendidikan">
                  Redeem
                </button>
              </div>
            </div>

            <!-- Item 4 -->
            <div class="dashboard-card p-4 flex flex-col">
              <div class="h-40 bg-gray-200 rounded-xl mb-4 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1581578021517-5d8ad8597852?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Tenda" class="w-full h-full object-cover" />
              </div>
              <h3 class="font-semibold text-lg mb-2 text-gray-900">Tenda Pengungsi</h3>
              <p class="text-gray-600 text-sm mb-4 leading-relaxed">Tenda untuk keluarga yang kehilangan rumah</p>
              <div class="mt-auto space-y-3">
                <div class="text-center">
                  <span class="font-bold text-green-800 text-lg block">1200 points</span>
                </div>
                <button class="dashboard-button dashboard-button-primary w-full redeem-button" data-points="1200" data-item="Tenda Pengungsi">
                  Redeem
                </button>
              </div>
            </div>

            <!-- Item 5 -->
            <div class="dashboard-card p-4 flex flex-col">
              <div class="h-40 bg-gray-200 rounded-xl mb-4 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1577896851231-70ef18861754?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Air Bersih" class="w-full h-full object-cover" />
              </div>
              <h3 class="font-semibold text-lg mb-2 text-gray-900">Air Bersih</h3>
              <p class="text-gray-600 text-sm mb-4 leading-relaxed">Penyediaan air bersih untuk 20 keluarga</p>
              <div class="mt-auto space-y-3">
                <div class="text-center">
                  <span class="font-bold text-green-800 text-lg block">450 points</span>
                </div>
                <button class="dashboard-button dashboard-button-primary w-full redeem-button" data-points="450" data-item="Air Bersih">
                  Redeem
                </button>
              </div>
            </div>

            <!-- Item 6 -->
            <div class="dashboard-card p-4 flex flex-col">
              <div class="h-40 bg-gray-200 rounded-xl mb-4 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1551884831-bbf3cdc6469e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Selimut" class="w-full h-full object-cover" />
              </div>
              <h3 class="font-semibold text-lg mb-2 text-gray-900">Selimut Hangat</h3>
              <p class="text-gray-600 text-sm mb-4 leading-relaxed">Selimut untuk musim dingin (10 buah)</p>
              <div class="mt-auto space-y-3">
                <div class="text-center">
                  <span class="font-bold text-green-800 text-lg block">400 points</span>
                </div>
                <button class="dashboard-button dashboard-button-primary w-full redeem-button" data-points="400" data-item="Selimut Hangat">
                  Redeem
                </button>
              </div>
            </div>

            <!-- Item 7 -->
            <div class="dashboard-card p-4 flex flex-col">
              <div class="h-40 bg-gray-200 rounded-xl mb-4 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Bantuan Medis" class="w-full h-full object-cover" />
              </div>
              <h3 class="font-semibold text-lg mb-2 text-gray-900">Bantuan Medis</h3>
              <p class="text-gray-600 text-sm mb-4 leading-relaxed">Dukungan biaya pengobatan untuk korban</p>
              <div class="mt-auto space-y-3">
                <div class="text-center">
                  <span class="font-bold text-green-800 text-lg block">900 points</span>
                </div>
                <button class="dashboard-button dashboard-button-primary w-full redeem-button" data-points="900" data-item="Bantuan Medis">
                  Redeem
                </button>
              </div>
            </div>

            <!-- Item 8 -->
            <div class="dashboard-card p-4 flex flex-col">
              <div class="h-40 bg-gray-200 rounded-xl mb-4 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1585110396000-c9ffd4e4b308?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Rebuild" class="w-full h-full object-cover" />
              </div>
              <h3 class="font-semibold text-lg mb-2 text-gray-900">Rebuild Palestine</h3>
              <p class="text-gray-600 text-sm mb-4 leading-relaxed">Bantuan rekonstruksi rumah dan fasilitas</p>
              <div class="mt-auto space-y-3">
                <div class="text-center">
                  <span class="font-bold text-green-800 text-lg block">1500 points</span>
                </div>
                <button class="dashboard-button dashboard-button-primary w-full redeem-button" data-points="1500" data-item="Rebuild Palestine">
                  Redeem
                </button>
              </div>
            </div>
          </div>

          <!-- Info Redeem -->
          <div class="dashboard-card p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Cara Redeem</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <ol class="list-decimal pl-5 space-y-3 text-gray-700">
                  <li class="pb-2 border-b border-gray-100">Pilih item yang ingin Anda redeem untuk Palestina</li>
                  <li class="pb-2 border-b border-gray-100">Pastikan point Anda mencukupi</li>
                  <li class="pb-2 border-b border-gray-100">Klik tombol "Redeem" pada item yang dipilih</li>
                  <li class="pb-2 border-b border-gray-100">Konfirmasi redeem pada popup yang muncul</li>
                  <li>Point akan langsung terpotong dan bantuan akan dikirimkan</li>
                </ol>
              </div>
              <div class="bg-green-50 p-4 rounded-xl">
                <h3 class="font-semibold text-green-800 mb-2">Informasi Penting</h3>
                <p class="text-sm text-gray-700 leading-relaxed">
                  Setiap redeem yang Anda lakukan akan dikonversi menjadi bantuan nyata untuk saudara-saudara kita di Palestina melalui partner organisasi terpercaya.
                </p>
                <div class="mt-4 flex items-center text-sm text-green-700">
                  <i class="fas fa-check-circle mr-2"></i>
                  <span>Transparansi 100% dalam distribusi</span>
                </div>
                <div class="mt-2 flex items-center text-sm text-green-700">
                  <i class="fas fa-check-circle mr-2"></i>
                  <span>Laporan real-time tersedia</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Konfirmasi Redeem -->
    <div id="redeemModal" class="dashboard-redeem-modal" style="display: none;">
      <div class="dashboard-redeem-modal-content">
        <div class="text-center mb-4">
          <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-gift text-green-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Konfirmasi Redeem</h3>
          <p class="text-gray-600 mb-4">Anda akan menukarkan <span id="pointCost" class="font-bold text-green-800">500</span> points untuk:</p>
        </div>
        
        <div class="bg-gray-50 p-4 rounded-xl mb-6">
          <p id="itemName" class="font-semibold text-lg text-center text-gray-900">Paket Makanan Darurat</p>
        </div>

        <div class="flex space-x-3">
          <button id="cancelRedeem" class="dashboard-button flex-1 bg-white border border-gray-300 text-gray-700 hover:bg-gray-50">
            Batal
          </button>
          <button id="confirmRedeem" class="dashboard-button flex-1 dashboard-button-primary">
            Konfirmasi
          </button>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Initialize dashboard navigation jika ada
        if (typeof window.dashboardApp !== 'undefined') {
          window.dashboardApp.setActiveNavigation();
        } else {
          // Fallback navigation initialization
          const toggle = document.querySelector('.dashboard-toggle');
          const navigation = document.querySelector('.dashboard-navigation');
          const main = document.querySelector('.dashboard-main-content');

          if (toggle && navigation && main) {
            toggle.addEventListener('click', function() {
              navigation.classList.toggle('active');
              main.classList.toggle('active');
            });
          }

          // Set active navigation manually
          document.getElementById('redeemNav')?.classList.add('active');
        }

        // Filter buttons functionality
        const filterButtons = document.querySelectorAll('.dashboard-filter-button');
        filterButtons.forEach(button => {
          button.addEventListener('click', function() {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
          });
        });

        // Modal functionality for redeem items
        const redeemButtons = document.querySelectorAll(".redeem-button");
        const redeemModal = document.getElementById("redeemModal");
        const pointCostElement = document.getElementById("pointCost");
        const itemNameElement = document.getElementById("itemName");
        const cancelButton = document.getElementById("cancelRedeem");
        const confirmButton = document.getElementById("confirmRedeem");

        redeemButtons.forEach((button) => {
          button.addEventListener("click", function () {
            const pointCost = this.getAttribute("data-points");
            const itemName = this.getAttribute("data-item");

            pointCostElement.textContent = pointCost;
            itemNameElement.textContent = itemName;

            redeemModal.style.display = 'flex';
          });
        });

        cancelButton.addEventListener("click", function () {
          redeemModal.style.display = 'none';
        });

        confirmButton.addEventListener("click", function () {
          // Here you would typically process the redeem transaction
          const pointCost = pointCostElement.textContent;
          const itemName = itemNameElement.textContent;
          
          alert(`Redeem berhasil! ${pointCost} points telah ditukar untuk "${itemName}". Terima kasih telah berkontribusi untuk Palestina.`);
          redeemModal.style.display = 'none';
        });

        // Close modal when clicking outside
        window.addEventListener("click", function (event) {
          if (event.target === redeemModal) {
            redeemModal.style.display = 'none';
          }
        });
      });
    </script>
  </body>
</html>