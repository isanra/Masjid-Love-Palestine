<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Artikel - Berita Palestina Terkini</title>
    
    <!-- Include Laravel Breeze Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    
    <style>
      /* Custom styles yang tidak bisa diganti dengan Tailwind */
      .footer-bg {
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
      }
      
      /* Transisi untuk komentar */
      .comments-transition {
        transition: all 0.3s ease-in-out;
      }
    </style>
  </head>
  
  <body class="bg-gray-50 md:px-10 font-['Inter']">
    <!-- Header -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="container mx-auto px-10 py-8 max-w-6xl mt-10">
     <!-- Article Header -->
      <div class="mb-6 ">
        <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">Hamas lists key demands as Egypt talks under way amid Israeli raids on Gaza</h1>
        <span class="inline-block px-3 py-1 my-4 bg-amber-100 text-amber-800 rounded-full text-xs font-medium">Humanitarian Crisis</span>
        <a href="/user-profile">
          <div class="flex items-center justify-between text-gray-600 py-5 border-y border-gray-300">
            <div class="flex items-center">
              <img
                src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80"
                alt="Majjid Al-Hawariyyin"
                class="w-10 h-10 rounded-full mr-3"
              />
              <div>
                <p class="font-medium">Majjid Al-Hawariyyin <span class="font-normal text-gray-500 ml-2">Today • 8 min read</span></p>
              </div>
            </div>
            <div class="flex items-center space-x-4">
              <!-- Views -->
              <div class="flex items-center">
                <svg class="w-5 h-5 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                <span class="text-sm text-gray-500">2.5K</span>
              </div>
              
              <!-- Likes -->
              <div class="flex items-center">
                <i class="far fa-heart mr-2"></i> 
                <span class="text-sm text-gray-500">428</span>
              </div>
            </div>
          </div>
        </a>
        
      </div>

      <!-- Thumbnail Image -->
      <div class="w-full h-80 md:h-96 overflow-hidden rounded-3xl ">
        <img src="{{ asset('images/background3.jpg') }}" alt="Aid Convoy Entering Gaza" class="w-full h-full object-cover" />
      </div>
      <p class="text-xs text-center text-gray-700 mt-2 mb-6 leading-relaxed">
         Smoke rises from an Israeli strike in Gaza City on October 7, 2025 [Ebrahim Hajjaj/Reuters]
      </p>

      <!-- Article Content -->
      <div class=" p-6 md:p-4">
        

        <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Critical Aid Delivery</h2>
        <p class="text-gray-600 mb-6 leading-relaxed">
          After weeks of border closures and restricted access, the Rafah crossing opened to allow the passage of trucks carrying food, medical supplies, and other essential items. International organizations have been advocating for
          humanitarian access to address the growing crisis in the region.
        </p>

        <p class="text-gray-600 mb-6 leading-relaxed">
          The convoy includes over 40 trucks carrying medical equipment, emergency food supplies, and water purification systems. United Nations officials have described the situation in Gaza as "dire" and "rapidly deteriorating" due to
          the prolonged blockade.
        </p>

        <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Ceasefire Negotiations</h2>
        <p class="text-gray-600 mb-6 leading-relaxed">
          The aid delivery coincides with intensified diplomatic efforts to broker a lasting ceasefire. Mediators from Egypt and Qatar are working with both sides to reach an agreement that would allow for sustained humanitarian access
          and de-escalation of hostilities.
        </p>

        <p class="text-gray-600 mb-6 leading-relaxed">UN Secretary-General has appealed for an immediate humanitarian ceasefire, stating that "the suffering of the Palestinian people must end." International pressure has been mounting for a peaceful resolution to the conflict.</p>

        <div class="bg-blue-50 p-6 rounded-3xl my-8 border-l-4 border-blue-500">
          <p class="text-blue-800 italic leading-relaxed">
            <i class="fas fa-quote-left text-blue-400 mr-3"></i>This aid delivery is a lifeline for thousands of families who have been struggling to meet their basic needs. However, it is only a temporary solution to a much larger crisis
            that requires a political resolution. - UN Humanitarian Coordinator
          </p>
        </div>

        <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Impact on Civilian Population</h2>
        <p class="text-gray-600 mb-6 leading-relaxed">
          According to recent reports from humanitarian organizations, over 2 million Palestinians in Gaza are facing severe shortages of clean water, electricity, and medical services. The healthcare system is on the verge of collapse,
          with hospitals operating at minimal capacity due to lack of supplies and fuel.
        </p>

        <p class="text-gray-600 mb-6 leading-relaxed">Children and the elderly are particularly vulnerable, with malnutrition rates rising significantly in recent weeks. Aid workers have reported cases of waterborne diseases increasing due to contaminated water sources.</p>

        <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">International Response</h2>
        <p class="text-gray-600 mb-6 leading-relaxed">
          The international community has welcomed the aid delivery but emphasizes the need for a sustainable solution. Several countries have pledged additional funding for humanitarian efforts in Gaza, while continuing to call for an
          immediate end to hostilities.
        </p>

        <p class="text-gray-600 mb-6 leading-relaxed">
          Human rights organizations have reiterated calls for all parties to respect international humanitarian law and ensure the protection of civilians. The recent developments have sparked renewed diplomatic initiatives to address
          the root causes of the conflict.
        </p>

        <p class="text-gray-600 mb-6 leading-relaxed">As the situation evolves, the world watches with hope that this aid delivery will mark the beginning of a broader effort to address the humanitarian crisis in Gaza and pave the way for meaningful peace negotiations.</p>
      </div>

      <!-- Article Footer -->
      <div class="mt-8 flex flex-col sm:flex-row justify-between items-start sm:items-center">
        <div class="flex flex-wrap gap-2 mb-4 sm:mb-0">
          <span class="inline-block px-3 py-1 bg-amber-100 text-amber-800 rounded-full text-xs font-medium">Humanitarian</span>
          <span class="inline-block px-3 py-1 bg-amber-100 text-amber-800 rounded-full text-xs font-medium">Gaza</span>
          <span class="inline-block px-3 py-1 bg-amber-100 text-amber-800 rounded-full text-xs font-medium">Aid</span>
        </div>
        <div class="flex space-x-6 text-gray-600">
          <button id="likeButton" class="flex items-center hover:text-red-600 transition-colors">
            <i class="far fa-heart mr-2"></i> 
            <span id="likeCount">243</span>
          </button>
          <button class="flex items-center hover:text-blue-600 transition-colors">
            <i class="far fa-bookmark mr-2"></i> 
            <span>Save</span>
          </button>
          <button class="flex items-center hover:text-green-600 transition-colors">
            <i class="far fa-share-square mr-2"></i> 
            <span>Share</span>
          </button>
        </div>
      </div>

      <!-- Comments Section -->
      <div class="mt-12 mb-10">
        <!-- Comments Header -->
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-bold text-gray-900">Komentar</h2>
          <button id="toggleComments" class="flex items-center text-gray-600 hover:text-gray-700 font-medium">
            <span id="toggleText">Tampilkan Komentar</span>
            <i id="toggleIcon" class="fas fa-chevron-down ml-2"></i>
          </button>
        </div>
        
        <!-- Comments Container (Initially Hidden) -->
        <div id="commentsContainer" class="comments-transition hidden">
          <!-- Add Comment Form -->
          <div class=" p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Tambah Komentar</h3>
            <form id="commentForm">
              <div class="mb-4">
                <textarea 
                  id="commentText" 
                  rows="4" 
                  class="w-full px-4 py-3 border border-gray-300 rounded-3xl focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition-colors" 
                  placeholder="Tulis komentar Anda di sini..."
                  required
                ></textarea>
              </div>
              <div class="flex justify-end">
                <button 
                  type="submit" 
                  class="px-6 py-2 bg-gray-600 text-white font-medium rounded-3xl hover:bg-gray-700 transition-colors"
                >
                  Kirim Komentar
                </button>
              </div>
            </form>
          </div>
          
          <!-- Comments List -->
          <div id="commentsList" class="space-y-6">
            <!-- Comment 1 -->
            <div class=" shadow-sm p-6 ">
              <div class="flex items-start mb-4">
                <img 
                  src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80" 
                  alt="Sarah Johnson" 
                  class="w-10 h-10 rounded-full mr-3"
                />
                <div>
                  <h4 class="font-semibold text-gray-800">Sarah Johnson</h4>
                  <p class="text-sm text-gray-500">2 jam yang lalu</p>
                </div>
              </div>
              <p class="text-gray-700">
                Semoga bantuan ini bisa sampai kepada yang membutuhkan. Situasi di Gaza benar-benar memilukan dan dunia harus melakukan lebih banyak untuk mengakhiri penderitaan mereka.
              </p>
              <div class="flex items-center mt-4 text-gray-500">
                <button class="flex items-center mr-4 hover:text-emerald-600 transition-colors like-btn">
                  <i class="far fa-thumbs-up mr-1"></i>
                  <span>24</span>
                </button>
                <button class="flex items-center hover:text-amber-600 transition-colors dislike-btn">
                  <i class="far fa-thumbs-down mr-1"></i>
                  <span>2</span>
                </button>
              </div>
            </div>
            
            <!-- Comment 2 -->
            <div class=" shadow-sm p-6 ">
              <div class="flex items-start mb-4">
                <img 
                  src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" 
                  alt="Ahmad Al-Fayed" 
                  class="w-10 h-10 rounded-full mr-3"
                />
                <div>
                  <h4 class="font-semibold text-gray-800">Ahmad Al-Fayed</h4>
                  <p class="text-sm text-gray-500">5 jam yang lalu</p>
                </div>
              </div>
              <p class="text-gray-700">
                Ini adalah langkah yang baik, tapi kita butuh solusi permanen, bukan hanya bantuan sementara. Konflik ini sudah berlangsung terlalu lama dan rakyat Palestina layak mendapatkan kehidupan yang damai.
              </p>
              <div class="flex items-center mt-4 text-gray-500">
                <button class="flex items-center mr-4 hover:text-emerald-600 transition-colors like-btn">
                  <i class="far fa-thumbs-up mr-1"></i>
                  <span>42</span>
                </button>
                <button class="flex items-center hover:text-amber-600 transition-colors dislike-btn">
                  <i class="far fa-thumbs-down mr-1"></i>
                  <span>5</span>
                </button>
              </div>
            </div>
            
            <!-- Comment 3 -->
            <div class=" shadow-sm p-6 ">
              <div class="flex items-start mb-4">
                <img 
                  src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1780&q=80" 
                  alt="Maria Rodriguez" 
                  class="w-10 h-10 rounded-full mr-3"
                />
                <div>
                  <h4 class="font-semibold text-gray-800">Maria Rodriguez</h4>
                  <p class="text-sm text-gray-500">1 hari yang lalu</p>
                </div>
              </div>
              <p class="text-gray-700">
                Saya berharap bantuan kemanusiaan ini tidak terhambat oleh politik. Anak-anak dan keluarga di Gaza membutuhkan akses ke makanan, air bersih, dan perawatan medis. Terima kasih kepada semua organisasi yang membantu.
              </p>
              <div class="flex items-center mt-4 text-gray-500">
                <button class="flex items-center mr-4 hover:text-emerald-600 transition-colors like-btn">
                  <i class="far fa-thumbs-up mr-1"></i>
                  <span>18</span>
                </button>
                <button class="flex items-center hover:text-amber-600 transition-colors dislike-btn">
                  <i class="far fa-thumbs-down mr-1"></i>
                  <span>1</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Related News -->
      @include('components.news-card')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-8 right-8 w-12 h-12 rounded-full bg-emerald-600 text-white shadow-lg hidden hover:bg-emerald-700 transition-colors z-50">
      <i class="fas fa-arrow-up"></i>
    </button>
  </body>
</html>