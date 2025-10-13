<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Masjid Loves Palestine</title>
    
    <!-- Include Tailwind CSS dari Laravel Breeze -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Material Design Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css" />
    
    <style>
      /* Custom configuration untuk warna merah */
      .bg-custom-red {
        background-color: #E4312B;
      }
      .bg-custom-red:hover {
        background-color: #c12a25;
      }
      .focus-border-red:focus {
        border-color: #E4312B;
      }
      .text-custom-red {
        color: #E4312B;
      }
      

    </style>
  </head>
  
  <body class="h-screen overflow-hidden flex items-center justify-center bg-gray-900">
    <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
      <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width: 1000px">
        <div class="md:flex w-full">
          
          <!-- Bagian Gambar -->
          <div class="hidden md:block w-1/2 p-4 flex items-center justify-center">
            <img src="{{ asset('images/login.png') }}" alt="Login Illustration" class="w-full h-auto object-contain rounded-2xl" />
          </div>

          <!-- Bagian Form -->
          <div class="w-full md:w-1/2 py-8 px-5 md:px-10">
            <div class="text-center mb-8">
              <!-- Logo di atas tengah -->
              <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-32" />
              </div>
              <h1 class="font-bold text-4xl text-gray-900 mt-2">Selamat Datang!</h1>
              <p class="mt-2">Belum punya akun? 
                <a href="{{ route('register') }}" class="text-custom-red hover:underline">Daftar sekarang</a>
              </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
              @csrf

              <!-- Email/Username -->
              <div class="flex -mx-3">
                <div class="w-full px-3 mb-6">
                  <div class="flex">
                    <div class="w-12 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                      <i class="mdi mdi-account-outline text-gray-400 text-xl"></i>
                    </div>
                    <input 
                      id="email" 
                      type="email" 
                      name="email" 
                      value="{{ old('email') }}" 
                      required 
                      autofocus 
                      autocomplete="username"
                      class="w-full -ml-12 pl-12 pr-4 py-4 rounded-5xl border-2 border-gray-200 outline-none focus:border-red-500 transition-all focus-border-red" 
                      placeholder="Masukan Email Anda" 
                    />
                  </div>
                  <x-input-error :messages="$errors->get('email')" class="mt-2 ml-4" />
                </div>
              </div>

              <!-- Password -->
              <div class="flex -mx-3">
                <div class="w-full px-3 mb-6">
                  <div class="flex">
                    <div class="w-12 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                      <i class="mdi mdi-lock-outline text-gray-400 text-xl"></i>
                    </div>
                    <input 
                      id="password" 
                      type="password" 
                      name="password" 
                      required 
                      autocomplete="current-password"
                      class="w-full -ml-12 pl-12 pr-4 py-4 rounded-5xl border-2 border-gray-200 outline-none focus:border-red-500 transition-all focus-border-red" 
                      placeholder="Masukan Password Anda" 
                    />
                  </div>
                  <div class="text-right mt-3">
                    @if (Route::has('password.request'))
                      <a href="{{ route('password.request') }}" class="text-sm text-custom-red hover:underline">
                        Lupa Password?
                      </a>
                    @endif
                  </div>
                  <x-input-error :messages="$errors->get('password')" class="mt-2 ml-4" />
                </div>
              </div>

              <!-- Remember Me -->
              <div class="flex -mx-3 mb-6">
                <div class="w-full px-3">
                  <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-red-600 focus:ring-red-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                  </label>
                </div>
              </div>

              <!-- Button -->
              <div class="flex -mx-3">
                <div class="w-full px-3 mb-5">
                  <button type="submit" class="block w-full max-w-xs mx-auto bg-custom-red hover:bg-red-700 text-white rounded-5xl px-3 py-4 font-semibold text-lg transition duration-300 shadow-md hover:shadow-lg">
                    MASUK
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>