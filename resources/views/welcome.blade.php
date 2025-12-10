<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TPAinaja</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <style>
    .soft-shadow {
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.10);
    }
  </style>
</head>

<body class="bg-white font-sans text-gray-800">

  <!-- =======================
        HEADER / HERO
  ======================= -->
  <header class="bg-gradient-to-b from-white to-[#FFE899] pb-24">
    <div class="max-w-7xl mx-auto px-8 pt-8 flex justify-between items-center">

      <!-- Logo -->
      <img src="{{ asset('images/logo-tpainaja.png') }}" class="h-11" />

      <!-- Navigation -->
      <nav class="hidden md:flex space-x-8 text-gray-900 font-medium">
        <a href="#" class="hover:text-yellow-700 transition">Home</a>
        <a href="#exam" class="hover:text-yellow-700 transition">Ujian</a>
        <a href="#footer" class="hover:text-yellow-700 transition">Butuh Bantuan?</a>
      </nav>

      <!-- Login -->
      <form action="{{ route('auth.login') }}" method="GET">
        <button class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition">
          Log In
        </button>
      </form>

    </div>

    <!-- HERO AREA -->
    <div class="max-w-7xl mx-auto px-8 mt-14 grid grid-cols-1 md:grid-cols-2 items-center gap-8">

      <!-- Left -->
      <div>
        <p class="text-[15px] font-medium mb-2">Selamat Datang di</p>

        <h1 class="text-5xl font-extrabold text-gray-900 leading-tight">
          CBT DAN <br /> TPA POLIBATAM
        </h1>

        <p class="text-gray-700 mt-4 leading-relaxed max-w-lg text-[15px]">
          Sistem ujian online untuk mendukung pelaksanaan tes berbasis komputer yang cepat,
          aman, dan efisien.
        </p>

        <a href="#exam"
           class="inline-block mt-8 border border-black text-gray-800 font-semibold px-6 py-2 rounded-md hover:bg-black hover:text-white transition">
          EXPLORE ALL
        </a>
      </div>

      <!-- Right -->
      <div class="flex justify-center md:justify-end">
        <img src="{{ asset('images/banner.png') }}" class="w-[390px] drop-shadow-lg">
      </div>

    </div>
  </header>


  <!-- =======================
        EXPLORE OUR EXAM 
        (FIX sesuai Figma)
  ======================= -->
  <section class="max-w-7xl mx-auto px-8 mt-10" id="exam">

    <!-- Judul kiri -->
    <h2 class="text-4xl font-extrabold text-[#F8C200] mb-4 text-left">
      Explore Our Exam
    </h2>

    <!-- Tidak ada card di sini (sesuai figma) -->

  </section>


  <!-- =======================
        BENEFITS SECTION
  ======================= -->
  <section class="text-center mt-20">

    <p class="text-[#C9832B] font-semibold text-[13px] tracking-wide mb-2">
      KENAPA HARUS TPAinaja?
    </p>

    <h3 class="text-[24px] md:text-[26px] font-bold text-gray-800 leading-snug">
      Benefits of online tutoring <br>
      services with us
    </h3>

    <!-- 3 Cards -->
    <div class="flex flex-wrap justify-center gap-10 mt-12">

      <!-- CARD 1 -->
      <div class="bg-gradient-to-br from-[#A3D4FF] via-white to-[#FFE08A] 
                  soft-shadow rounded-xl p-6 w-[260px] h-[190px] flex flex-col items-center justify-center">

        <img src="{{ asset('images/fx.png') }}" class="w-[58px] mb-3">
        <h4 class="font-bold text-gray-800 mb-1">Phisics and Math</h4>
        <p class="text-gray-600 text-[14px] leading-snug">
          Dive into our dynamic <br> Community Hub
        </p>
      </div>

      <!-- CARD 2 -->
      <div class="bg-gradient-to-br from-[#CCFFB3] via-white to-[#FFE39B] 
                  soft-shadow rounded-xl p-6 w-[260px] h-[190px] flex flex-col items-center justify-center">

        <img src="{{ asset('images/glasses.png') }}" class="w-[58px] mb-3">
        <h4 class="font-bold text-gray-800 mb-1">Psichological</h4>
        <p class="text-gray-600 text-[14px] leading-snug">
          Dive into our dynamic <br> Community Hub
        </p>
      </div>

      <!-- CARD 3 -->
      <div class="bg-gradient-to-br from-[#EEC0FF] via-white to-[#FFE49C] 
                  soft-shadow rounded-xl p-6 w-[260px] h-[190px] flex flex-col items-center justify-center">

        <img src="{{ asset('images/translation.png') }}" class="w-[58px] mb-3">
        <h4 class="font-bold text-gray-800 mb-1">Computer Science</h4>
        <p class="text-gray-600 text-[14px] leading-snug">
          Dive into our dynamic <br> Community Hub
        </p>
      </div>

    </div>

  </section>


  <!-- =======================
            FOOTER
  ======================= -->
  <footer class="border-t mt-24 bg-[#FFFDF5]" id="footer">
    <div class="max-w-7xl mx-auto px-8 py-12 grid md:grid-cols-4 gap-10 text-gray-600">

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

      <div>
        <h4 class="font-semibold mb-3">Follow us</h4>
        <div class="flex space-x-5 text-yellow-600 text-xl">
          <i class="fab fa-facebook cursor-pointer"></i>
          <i class="fab fa-twitter cursor-pointer"></i>
          <i class="fab fa-instagram cursor-pointer"></i>
        </div>
      </div>

    </div>

    <div class="border-t py-4 text-center text-gray-500 text-sm">
      © TPAinaja, 2025. PBL-TRPL.308
    </div>

  </footer>

</body>
</html>
