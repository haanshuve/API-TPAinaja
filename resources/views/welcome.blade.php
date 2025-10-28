<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBT dan TPA Polibatam</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Efek bayangan lembut untuk card */
        .soft-shadow {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>
<body class="bg-white font-sans text-gray-800">

    <!-- HEADER -->
    <header class="bg-gradient-to-b from-[#FFFFFF] to-[#FFF5CC] pb-20">
        <div class="max-w-7xl mx-auto px-8 pt-8 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/logo-tpainaja.png') }}" alt="TPAinaja Logo" class="h-10">
            </div>

            <!-- Navigation -->
            <nav class="flex space-x-8 text-gray-900 font-medium">
                <a href="#" class="hover:text-yellow-700">Home</a>
                <a href="#exam" class="hover:text-yellow-700">Exam</a>
                <a href="#" class="hover:text-yellow-700">Butuh Bantuan?</a>
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
                <p class="text-sm font-semibold text-gray-800 mb-2">Selamat Datang di</p>
                <h2 class="text-5xl font-extrabold text-gray-900 leading-tight">
                    CBT DAN TPA <br> POLIBATAM
                </h2>
                <p class="text-gray-800 mt-4 leading-relaxed text-[15px] max-w-lg">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <a href="#exam" 
                   class="inline-block mt-8 border border-black text-gray-800 font-semibold px-6 py-2 rounded-md hover:bg-black hover:text-white transition">
                    EXPLORE ALL
                </a>
            </div>

            <!-- Right Image -->
            <div class="flex justify-center md:justify-end">
                <img src="{{ asset('images/banner.png') }}" alt="Hero" class="w-[390px] md:w-[390px] drop-shadow-lg">
            </div>
        </div>
    </header>

    <!-- MAIN -->
<main class="max-w-7xl mx-auto px-8 py-20" id="exam">
    <h2 class="text-4xl font-extrabold text-[#F8C200] mb-14 text-center">Explore Our Exam</h2>

    <div class="flex flex-wrap justify-center gap-10">

        <!-- Card 1 -->
        <div class="bg-[#F8C200] soft-shadow rounded-lg p-6 w-[320px] h-[200px] text-center flex flex-col justify-center">
            <img src="{{ asset('images/sky.png') }}" class="w-[76px] h-[72px] mb-3 mx-auto" alt="Sky">
            <p class="text-gray-800 text-[15px] leading-snug px-2 break-words">
                Sky was cloudless and of a deep dark blue spectacle before us was indeed
            </p>
        </div>

        <!-- Card 2 -->
        <div class="bg-[#FFE77A] soft-shadow rounded-lg p-6 w-[320px] h-[200px] mt-10 text-center flex flex-col justify-center">
            <img src="{{ asset('images/english.png') }}" class="w-[78px] h-[74px] mb-2 mx-auto" alt="English">
            <h3 class="font-bold text-gray-800 mb-1">English</h3>
            <p class="text-gray-700 text-[15px] leading-snug px-2 break-words">
                Even the all-powerful Pointing has no control about the blind texts.
            </p>
        </div>

        <!-- Card 3 -->
        <div class="bg-[#A0A0A0] soft-shadow rounded-lg p-6 w-[320px] h-[200px] text-center flex flex-col justify-center">
            <img src="{{ asset('images/general.png') }}" class="w-[78px] h-[74px] mb-2 mx-auto" alt="General Knowledge">
            <h3 class="font-bold text-white mb-1">General Knowledge</h3>
            <p class="text-gray-200 text-[15px] leading-snug px-2 break-words">
                Text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
            </p>
        </div>

        <!-- Card 4 -->
        <div class="bg-[#9CF5EF] soft-shadow rounded-lg p-6 w-[320px] h-[200px] text-center flex flex-col justify-center">
            <img src="{{ asset('images/pysics.png') }}" class="w-[78px] h-[74px] mb-2 mx-auto" alt="Physics">
            <h3 class="font-bold text-gray-800 mb-1">Physics</h3>
            <p class="text-gray-700 text-[15px] leading-snug px-2 break-words">
                However a small line of blind text by the name.
            </p>
        </div>

        <!-- Card 5 -->
        <div class="bg-[#FFF3DC] soft-shadow rounded-lg p-6 w-[320px] h-[200px] text-center flex flex-col justify-center">
            <img src="{{ asset('images/general.png') }}" class="w-[78px] h-[74px] mb-2 mx-auto" alt="General Knowledge">
            <h3 class="font-bold text-gray-800 mb-1">General Knowledge</h3>
            <p class="text-gray-700 text-[15px] leading-snug px-2 break-words">
                Text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
            </p>
        </div>

        <!-- Card 6 -->
        <div class="bg-[#7D7D7D] soft-shadow rounded-lg p-6 w-[320px] h-[200px] text-center flex flex-col justify-center">
            <img src="{{ asset('images/general.png') }}" class="w-[78px] h-[74px] mb-2 mx-auto" alt="General Knowledge">
            <h3 class="font-bold text-white mb-1">General Knowledge</h3>
            <p class="text-gray-200 text-[15px] leading-snug px-2 break-words">
                Text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
            </p>
        </div>

    </div>
</main>



    <!-- FOOTER -->
    <footer class="border-t mt-20">
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

            <div class="flex flex-col items-start space-y-3">
                <a href="{{ route('login') }}" class="border border-yellow-500 px-5 py-1.5 rounded-md text-yellow-700 hover:bg-yellow-500 hover:text-white transition">Log in</a>
                <a href="{{ route('dashboard') }}" class="border border-yellow-500 px-5 py-1.5 rounded-md text-yellow-700 hover:bg-yellow-500 hover:text-white transition">ADMIN</a>
            </div>
        </div>

        <div class="border-t py-4 text-center text-gray-500 text-sm">
            © Photo, Inc. 2025. We love our users!
        </div>

        <div class="flex justify-center space-x-5 py-4">
            <a href="#" class="text-yellow-500 hover:text-yellow-600"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-yellow-500 hover:text-yellow-600"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-yellow-500 hover:text-yellow-600"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

</body>
</html>
