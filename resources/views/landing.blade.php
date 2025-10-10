<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBT & TPA POLIBATAM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">

    <!-- NAVBAR -->
    <header class="flex justify-between items-center py-4 px-10 border-b">
        <h1 class="text-2xl font-bold text-blue-600">CBT & TPA POLIBATAM</h1>
        <nav class="flex items-center gap-6 text-gray-700">
            <a href="#" class="hover:text-blue-600">Peserta</a>
            <a href="#" class="hover:text-blue-600">Panduan</a>
            <a href="#" class="hover:text-blue-600">Kontak</a>
            <a href="/login" class="border border-blue-600 text-blue-600 px-4 py-1 rounded hover:bg-blue-600 hover:text-white transition">Login</a>
        </nav>
    </header>

    <!-- HERO SECTION -->
    <section class="flex flex-col md:flex-row items-center justify-between px-10 py-20 max-w-6xl mx-auto">
        <div class="w-full md:w-1/2 space-y-5">
            <div class="bg-blue-100 text-blue-800 w-fit px-3 py-1 rounded text-sm font-medium">Selamat Datang di</div>
            <h2 class="text-4xl font-bold text-gray-900 leading-tight">CBT dan TPA POLIBATAM</h2>
            <p class="text-gray-600 leading-relaxed">
                Sistem tes online adaptif yang dirancang untuk mendukung evaluasi akademik dan kemampuan potensi peserta didik.
                Dirancang dengan antarmuka yang responsif, mudah diakses, dan terintegrasi secara otomatis dengan sistem kampus.
            </p>
            <a href="#exam" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">Explore All</a>
        </div>
        <div class="w-full md:w-1/2 mt-10 md:mt-0">
            <img src="{{ asset('images/hero-illustration.png') }}" alt="CBT Illustration" class="w-full">
        </div>
    </section>

    <!-- EXPLORE OUR EXAM -->
    <section id="exam" class="bg-gray-50 py-16">
        <div class="max-w-6xl mx-auto px-10">
            <h3 class="text-3xl font-bold text-blue-600 mb-10 text-center">Explore Our Exam</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

                <div class="bg-blue-200 rounded-xl p-8 shadow-md hover:shadow-lg transition">
                    <h4 class="font-semibold text-lg mb-2">Physics</h4>
                    <p class="text-sm text-gray-700">Kuasai konsep dasar hingga eksperimen ilmiah yang menantang.</p>
                </div>

                <div class="bg-blue-400 text-white rounded-xl p-8 shadow-md hover:shadow-lg transition">
                    <h4 class="font-semibold text-lg mb-2">English</h4>
                    <p class="text-sm">Latih kemampuan bahasa Inggris akademik dan teknis.</p>
                </div>

                <div class="bg-gray-300 rounded-xl p-8 shadow-md hover:shadow-lg transition">
                    <h4 class="font-semibold text-lg mb-2">General Knowledge</h4>
                    <p class="text-sm text-gray-800">Tes pengetahuan umum dari berbagai bidang.</p>
                </div>

                <div class="bg-cyan-200 rounded-xl p-8 shadow-md hover:shadow-lg transition">
                    <h4 class="font-semibold text-lg mb-2">Mathematics</h4>
                    <p class="text-sm text-gray-700">Uji logika dan pemahaman konsep matematika.</p>
                </div>

                <div class="bg-yellow-100 rounded-xl p-8 shadow-md hover:shadow-lg transition">
                    <h4 class="font-semibold text-lg mb-2">General Reasoning</h4>
                    <p class="text-sm text-gray-700">Analisis pola, pernyataan, dan kemampuan berpikir kritis.</p>
                </div>

                <div class="bg-gray-400 text-white rounded-xl p-8 shadow-md hover:shadow-lg transition">
                    <h4 class="font-semibold text-lg mb-2">Personality Test</h4>
                    <p class="text-sm">Kenali potensi dan kepribadianmu lebih dalam.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-white border-t py-8 mt-16">
        <div class="max-w-6xl mx-auto px-10 flex flex-col md:flex-row justify-between text-gray-600 text-sm">
            <div>
                <p class="font-semibold">Mobile App</p>
                <p>Features • Live Share • Video Record</p>
            </div>
            <div>
                <p class="font-semibold">Community</p>
                <p>Forum • Blog • Support</p>
            </div>
            <div>
                <p class="font-semibold">Company</p>
                <p>About Us • Contact • History</p>
            </div>
        </div>
        <div class="text-center text-gray-400 text-xs mt-6">
            © {{ date('Y') }} CBT & TPA Polibatam. All rights reserved.
        </div>
    </footer>

</body>
</html>
