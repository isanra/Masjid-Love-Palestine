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

      <!-- notif sukses -->
       <div class="dashboard-content">

            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg" role="alert">
                    <p classs="font-bold">Sukses</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg" role="alert">
                    <p class="font-bold">Gagal</p>
                    <p>{{ session('error') }}</p>
                </div>
            @endif
        <div class="mb-8">

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
                <p class="text-2xl font-bold text-green-800">{{ $user->profile?->poin ?? 0 }}</p>
              </div>
            </div>
          </div>

          <!-- Filter Options -->
          <div class="flex flex-wrap gap-2 mb-8">
            <a href="{{ route('redeem.index') }}" 
               class="dashboard-filter-button {{ !request('category') ? 'active' : '' }}">
                Semua
            </a>
            
            @foreach ($categories as $category)
                <a href="{{ route('redeem.index', ['category' => $category]) }}"
                   class="dashboard-filter-button {{ request('category') == $category ? 'active' : '' }}">
                    {{ $category }}
                </a>
            @endforeach
          </div>

          <!-- Grid Items untuk Diredeem -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">

              @forelse ($items as $item)
                  <div class="dashboard-card p-4 flex flex-col">
                      <div class="h-40 bg-gray-200 rounded-xl mb-4 overflow-hidden">
                          {{-- Kita akan gunakan placeholder jika tidak ada gambar --}}
                          <img src="{{ $item->image_url ?? 'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=400&q=80' }}" alt="{{ $item->name }}" class="w-full h-full object-cover" />
                      </div>
                      <h3 class="font-semibold text-lg mb-2 text-gray-900">{{ $item->name }}</h3>
                      <p class="text-gray-600 text-sm mb-4 leading-relaxed">{{ $item->description }}</p>

                      <div class="mt-auto space-y-3">
                          <div class="text-center">
                              <span class="font-bold text-green-800 text-lg block">{{ $item->points_cost }} points</span>
                          </div>

                          {{-- Tombol ini sekarang menggunakan form untuk mengirim data ke controller --}}
                          <form action="{{ route('redeem.store') }}" method="POST">
                              @csrf
                              <input type="hidden" name="redeem_item_id" value="{{ $item->id }}">

                              @if (Auth::user()->profile->poin >= $item->points_cost)
                                  <button type="submit" class="dashboard-button dashboard-button-primary w-full">
                                      Redeem
                                  </button>
                              @else
                                  <button type="button" class="dashboard-button w-full bg-gray-300 text-gray-500 cursor-not-allowed" disabled>
                                      Poin Tidak Cukup
                                  </button>
                              @endif
                          </form>
                      </div>
                  </div>
              @empty
                  <div class="col-span-full text-center text-gray-500 py-10">
                      <p>Belum ada item hadiah yang tersedia saat ini.</p>
                  </div>
              @endforelse

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

    
  </body>
</html>