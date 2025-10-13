<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profil - Dashboard User</title>
    
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
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Profil</h1>
            <p class="text-gray-600">Kelola informasi profil dan preferensi akun Anda</p>
          </div>

          <!-- Grid Layout -->
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <!-- Profile Picture Section -->
            <div class="dashboard-card">
              <h2 class="dashboard-card-title">Foto Profil</h2>
              <div class="text-center">
                <img
                  src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1160&q=80"
                  alt="Profile"
                  class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-green-200"
                />
                <div class="space-y-3">
                  <button class="dashboard-button dashboard-button-primary w-full">
                    <i class="fas fa-upload dashboard-button-icon"></i>Unggah Foto Baru
                  </button>
                  <button class="dashboard-button dashboard-button-danger w-full">
                    <i class="fas fa-trash dashboard-button-icon"></i>Hapus Foto
                  </button>
                </div>
                <p class="text-xs text-gray-500 mt-4">Format: JPG, PNG, GIF. Maksimal 2MB</p>
              </div>
            </div>

            <!-- Banner Section -->
            <div class="dashboard-card">
              <h2 class="dashboard-card-title">Banner Profil</h2>
              <div class="mb-4">
                <div class="h-32 bg-gradient-to-r from-green-400 to-blue-500 rounded-xl mb-4 overflow-hidden">
                  <img src="" alt="Banner" class="w-full h-full object-cover hidden" id="bannerPreview" />
                </div>
                <div class="space-y-3">
                  <button class="dashboard-button dashboard-button-primary w-full" onclick="document.getElementById('bannerUpload').click()">
                    <i class="fas fa-image dashboard-button-icon"></i>Unggah Banner
                  </button>
                  <input type="file" id="bannerUpload" class="hidden" accept="image/*" onchange="previewBanner(this)" />
                  <button class="dashboard-button dashboard-button-danger w-full" onclick="removeBanner()">
                    <i class="fas fa-trash dashboard-button-icon"></i>Hapus Banner
                  </button>
                </div>
                <p class="text-xs text-gray-500 mt-4">Rekomendasi: 1200x300px, format JPG/PNG</p>
              </div>
            </div>

            <!-- Account Stats -->
            <div class="dashboard-card">
              <h2 class="dashboard-card-title">Statistik Akun</h2>
              <div class="space-y-4">
                <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                  <span class="text-sm text-gray-600">Bergabung Sejak</span>
                  <span class="font-semibold">Jan 2023</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                  <span class="text-sm text-gray-600">Total Artikel</span>
                  <span class="font-semibold text-green-800">24</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                  <span class="text-sm text-gray-600">Total Points</span>
                  <span class="font-semibold text-green-800">1,250</span>
                </div>
                
              </div>
            </div>
          </div>

          <!-- Profile Information Form -->
          <div class="dashboard-card mb-8">
            <h2 class="dashboard-card-title">Informasi Profil</h2>
            <form class="dashboard-profile-form">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="dashboard-form-group">
                  <label class="dashboard-form-label">Nama Depan</label>
                  <input type="text" class="dashboard-form-input" value="Masjid" placeholder="Masukkan nama depan" />
                </div>
                <div class="dashboard-form-group">
                  <label class="dashboard-form-label">Nama Belakang</label>
                  <input type="text" class="dashboard-form-input" value="Hawariyyin" placeholder="Masukkan nama belakang" />
                </div>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="dashboard-form-group">
                  <label class="dashboard-form-label">Email</label>
                  <input type="email" class="dashboard-form-input" value="{{ Auth::user()->email ?? 'sanra100825@gmail.com' }}" placeholder="Masukkan alamat email" />
                </div>
                <div class="dashboard-form-group">
                  <label class="dashboard-form-label">Nomor Telepon</label>
                  <input type="tel" class="dashboard-form-input" value="+62 817-2512-508" placeholder="Masukkan nomor telepon" />
                </div>
              </div>

              <div class="dashboard-form-group mb-6">
                <label class="dashboard-form-label">Alamat</label>
                <textarea class="dashboard-form-input dashboard-form-textarea" rows="3" placeholder="Masukkan alamat lengkap">Jl. Palestina Merdeka No. 123, Jakarta</textarea>
              </div>

              <div class="dashboard-form-group mb-6">
                <label class="dashboard-form-label">Bio / Deskripsi</label>
                <textarea class="dashboard-form-input dashboard-form-textarea" rows="3" placeholder="Ceritakan tentang diri atau organisasi Anda">Organisasi kemanusiaan yang berfokus pada bantuan untuk Palestina dan pendidikan masyarakat.</textarea>
              </div>

              <div class="flex flex-col sm:flex-row gap-3 justify-end">
                <button type="button" class="dashboard-button dashboard-button-secondary order-2 sm:order-1">Batal</button>
                <button type="submit" class="dashboard-button dashboard-button-primary order-1 sm:order-2">Simpan Perubahan</button>
              </div>
            </form>
          </div>

          <!-- Security Settings -->
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Change Password -->
            <div class="dashboard-card">
              <h2 class="dashboard-card-title">Ubah Kata Sandi</h2>
              <div class="space-y-4">
                <div class="dashboard-form-group">
                  <label class="dashboard-form-label">Kata Sandi Saat Ini</label>
                  <input type="password" class="dashboard-form-input" placeholder="Masukkan kata sandi saat ini" />
                </div>
                <div class="dashboard-form-group">
                  <label class="dashboard-form-label">Kata Sandi Baru</label>
                  <input type="password" class="dashboard-form-input" placeholder="Masukkan kata sandi baru" />
                </div>
                <div class="dashboard-form-group">
                  <label class="dashboard-form-label">Konfirmasi Kata Sandi Baru</label>
                  <input type="password" class="dashboard-form-input" placeholder="Konfirmasi kata sandi baru" />
                </div>
                <button class="dashboard-button dashboard-button-primary w-full">Perbarui Kata Sandi</button>
              </div>
            </div>

            <!-- Notification Preferences -->
            <div class="dashboard-card">
              <h2 class="dashboard-card-title">Preferensi Notifikasi</h2>
              <div class="space-y-4">
                <div class="dashboard-notification-preferences">
                  <div class="dashboard-checkbox-group">
                    <input type="checkbox" id="notif-email" class="dashboard-checkbox" checked />
                    <label for="notif-email" class="dashboard-checkbox-label">Email Notifikasi</label>
                  </div>
                  <div class="dashboard-checkbox-group">
                    <input type="checkbox" id="notif-sms" class="dashboard-checkbox" />
                    <label for="notif-sms" class="dashboard-checkbox-label">SMS Notifikasi</label>
                  </div>
                  <div class="dashboard-checkbox-group">
                    <input type="checkbox" id="notif-newsletter" class="dashboard-checkbox" checked />
                    <label for="notif-newsletter" class="dashboard-checkbox-label">Newsletter Bulanan</label>
                  </div>
                  <div class="dashboard-checkbox-group">
                    <input type="checkbox" id="notif-promo" class="dashboard-checkbox" checked />
                    <label for="notif-promo" class="dashboard-checkbox-label">Penawaran Promo</label>
                  </div>
                </div>

                <div class="border-t pt-4 mt-4">
                  <h3 class="text-lg font-semibold text-red-800 mb-3">Zona Berbahaya</h3>
                  <p class="text-sm text-gray-600 mb-4">Menghapus akun akan menghapus semua data secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
                  <button class="dashboard-button dashboard-button-danger w-full" id="deleteAccountBtn">
                    <i class="fas fa-exclamation-triangle dashboard-button-icon"></i>Hapus Akun
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete Account Confirmation Modal -->
    <div id="deleteModal" class="dashboard-redeem-modal" style="display: none;">
      <div class="dashboard-redeem-modal-content">
        <div class="text-center mb-4">
          <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-exclamation-triangle text-red-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Hapus Akun</h3>
          <p class="text-gray-600 mb-4">Apakah Anda yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan.</p>
        </div>
        
        <div class="bg-red-50 p-4 rounded-xl mb-6">
          <p class="text-sm text-red-800 text-center">
            <strong>Peringatan:</strong> Semua data termasuk artikel, points, dan riwayat akan dihapus permanen.
          </p>
        </div>

        <div class="flex space-x-3">
          <button id="cancelDelete" class="dashboard-button flex-1 bg-white border border-gray-300 text-gray-700 hover:bg-gray-50">
            Batal
          </button>
          <button id="confirmDelete" class="dashboard-button flex-1 dashboard-button-danger">
            Ya, Hapus Akun
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
          document.getElementById('accountNav')?.classList.add('active');
        }

        // Form submission handling
        const profileForm = document.querySelector('.dashboard-profile-form');
        if (profileForm) {
          profileForm.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Perubahan profil berhasil disimpan!');
          });
        }

        // Password update handling
        const passwordButton = document.querySelector('.dashboard-card .dashboard-button-primary');
        if (passwordButton && passwordButton.textContent.includes('Kata Sandi')) {
          passwordButton.addEventListener('click', function() {
            alert('Kata sandi berhasil diperbarui!');
          });
        }

        // Account deletion handling
        const deleteButton = document.getElementById('deleteAccountBtn');
        const deleteModal = document.getElementById('deleteModal');
        const cancelDelete = document.getElementById('cancelDelete');
        const confirmDelete = document.getElementById('confirmDelete');

        if (deleteButton) {
          deleteButton.addEventListener('click', function() {
            deleteModal.style.display = 'flex';
          });
        }

        if (cancelDelete) {
          cancelDelete.addEventListener('click', function() {
            deleteModal.style.display = 'none';
          });
        }

        if (confirmDelete) {
          confirmDelete.addEventListener('click', function() {
            alert('Permintaan penghapusan akun telah dikirim. Anda akan menerima email konfirmasi.');
            deleteModal.style.display = 'none';
          });
        }

        // Close modal when clicking outside
        window.addEventListener("click", function (event) {
          if (event.target === deleteModal) {
            deleteModal.style.display = 'none';
          }
        });
      });

      // Banner preview functionality
      function previewBanner(input) {
        const preview = document.getElementById('bannerPreview');
        const bannerContainer = preview.parentElement;
        
        if (input.files && input.files[0]) {
          const reader = new FileReader();
          
          reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            bannerContainer.classList.remove('bg-gradient-to-r', 'from-green-400', 'to-blue-500');
          }
          
          reader.readAsDataURL(input.files[0]);
        }
      }

      function removeBanner() {
        const preview = document.getElementById('bannerPreview');
        const bannerContainer = preview.parentElement;
        
        preview.classList.add('hidden');
        bannerContainer.classList.add('bg-gradient-to-r', 'from-green-400', 'to-blue-500');
        
        // Reset file input
        const fileInput = document.getElementById('bannerUpload');
        fileInput.value = '';
      }
    </script>
  </body>
</html>