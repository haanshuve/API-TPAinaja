<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CBT dan TPA Polibatam</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome for Icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    .soft-shadow {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }
  </style>
</head>
<body class="bg-white font-sans text-gray-800">

  <!-- HEADER -->
  <header class="bg-gradient-to-b from-white to-[#FFF5CC] pb-20">
    <div class="max-w-7xl mx-auto px-8 pt-8 flex justify-between items-center">
      <!-- Logo -->
      <div class="flex items-center space-x-2">
        <img src="{{ asset('images/logo-tpainaja.png') }}" alt="Logo TPAinaja" class="h-11" />
      </div>

      <!-- Navigation -->
      <nav class="hidden md:flex space-x-8 text-gray-900 font-medium">
        <a href="#" class="hover:text-yellow-700 transition">Home</a>
        <a href="#exam" class="hover:text-yellow-700 transition">Exam</a>
        <a href="#footer" class="hover:text-yellow-700 transition">Butuh Bantuan?</a>
      </nav>

      <!-- Login Button -->
      <a href="{{ route('login') }}" 
         class="border border-yellow-500 text-yellow-700 px-5 py-1.5 rounded-lg hover:bg-yellow-500 hover:text-white transition">
        Log in
      </a>
    </div>

    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-8 mt-14 grid grid-cols-1 md:grid-cols-2 items-center gap-8">
      <!-- Left Content -->
      <div>
        <p class="text-2xl font-semibold text-gray-800 mb-2">Selamat Datang di</p>
        <h1 class="text-5xl font-extrabold text-gray-900 leading-tight">
          CBT DAN TPA <br /> POLIBATAM
        </h1>
        <p class="text-gray-700 mt-4 leading-relaxed text-[15px] max-w-lg">
          Selamat datang di platform ujian online CBT dan TPA Polibatam. Sistem ini dirancang untuk mendukung pelaksanaan tes berbasis komputer yang cepat, aman, dan efisien.
        </p>
        <a href="#exam" 
           class="inline-block mt-8 border border-black text-gray-800 font-semibold px-6 py-2 rounded-md hover:bg-black hover:text-white transition">
          EXPLORE ALL
        </a>
      </div>

      <!-- Right Image -->
      <div class="flex justify-center md:justify-end">
        <img src="{{ asset('images/banner.png') }}" alt="Banner CBT TPA Polibatam" class="w-[390px] drop-shadow-lg" />
      </div>
    </div>
  </header>

  <!-- MAIN -->
  <main class="max-w-7xl mx-auto px-8 py-20" id="exam">
    <h2 class="text-4xl font-extrabold text-[#F8C200] mb-14 text-center">Explore Our Exam</h2>

    <div class="flex flex-wrap justify-center gap-10">
      <!-- Card Template -->
      <div class="bg-[#F8C200] soft-shadow rounded-lg p-6 w-[320px] h-[200px] text-center flex flex-col justify-center hover:scale-[1.02] transition">
        <img src="{{ asset('images/sky.png') }}" class="w-[76px] h-[72px] mb-3 mx-auto" alt="Sky Illustration" />
        <p class="text-gray-800 text-[15px] leading-snug px-2">
          Sky was cloudless and of a deep dark blue spectacle before us was indeed
        </p>
      </div>

      <div class="bg-[#FFE77A] soft-shadow rounded-lg p-6 w-[320px] h-[200px] text-center flex flex-col justify-center hover:scale-[1.02] transition">
        <img src="{{ asset('images/english.png') }}" class="w-[78px] h-[74px] mb-2 mx-auto" alt="English Exam Icon" />
        <h3 class="font-bold text-gray-800 mb-1">English</h3>
        <p class="text-gray-700 text-[15px] leading-snug px-2">
          Even the all-powerful Pointing has no control about the blind texts.
        </p>
      </div>

      <div class="bg-[#A0A0A0] soft-shadow rounded-lg p-6 w-[320px] h-[200px] text-center flex flex-col justify-center hover:scale-[1.02] transition">
        <img src="{{ asset('images/general.png') }}" class="w-[78px] h-[74px] mb-2 mx-auto" alt="General Knowledge Icon" />
        <h3 class="font-bold text-white mb-1">General Knowledge</h3>
        <p class="text-gray-200 text-[15px] leading-snug px-2">
          Text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
        </p>
      </div>

      <div class="bg-[#9CF5EF] soft-shadow rounded-lg p-6 w-[320px] h-[200px] text-center flex flex-col justify-center hover:scale-[1.02] transition">
        <img src="{{ asset('images/pysics.png') }}" class="w-[78px] h-[74px] mb-2 mx-auto" alt="Physics Exam Icon" />
        <h3 class="font-bold text-gray-800 mb-1">Physics</h3>
        <p class="text-gray-700 text-[15px] leading-snug px-2">
          However a small line of blind text by the name.
        </p>
      </div>

      <div class="bg-[#FFF3DC] soft-shadow rounded-lg p-6 w-[320px] h-[200px] text-center flex flex-col justify-center hover:scale-[1.02] transition">
        <img src="{{ asset('images/general.png') }}" class="w-[78px] h-[74px] mb-2 mx-auto" alt="General Knowledge Icon" />
        <h3 class="font-bold text-gray-800 mb-1">General Knowledge</h3>
        <p class="text-gray-700 text-[15px] leading-snug px-2">
          Text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
        </p>
      </div>

      <div class="bg-[#7D7D7D] soft-shadow rounded-lg p-6 w-[320px] h-[200px] text-center flex flex-col justify-center hover:scale-[1.02] transition">
        <img src="{{ asset('images/general.png') }}" class="w-[78px] h-[74px] mb-2 mx-auto" alt="General Knowledge Icon" />
        <h3 class="font-bold text-white mb-1">General Knowledge</h3>
        <p class="text-gray-200 text-[15px] leading-snug px-2">
          Text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
        </p>
      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="border-t mt-20 bg-[#FFFDF5]" id="footer">
    <div class="max-w-7xl mx-auto px-8 py-12 grid md:grid-cols-4 gap-8 text-gray-600">
      <div>
        <h4 class="font-semibold mb-3">Mobile app</h4>
        <ul class="space-y-1 text-[15px]">
          <li>Features</li>
          <li>Live share</li>
          <li>Video record</li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-3">Community</h4>
        <ul class="space-y-1 text-[15px]">
          <li>Featured artists</li>
          <li>The Portal</li>
          <li>Live events</li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-3">Company</h4>
        <ul class="space-y-1 text-[15px]">
          <li>About us</li>
          <li>Contact us</li>
          <li>History</li>
        </ul>
      </div>
      <div class="flex flex-col justify-between">
        <div>
          <h4 class="font-semibold mb-3">Follow us</h4>
          <div class="flex space-x-5">
            <a href="#" class="text-yellow-500 hover:text-yellow-600"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-yellow-500 hover:text-yellow-600"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-yellow-500 hover:text-yellow-600"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>

    <div class="border-t py-4 text-center text-gray-500 text-sm">
      © TPAinaja, 2025. PBL-TRPL.308
    </div>
  </footer>

</body>
</html>
