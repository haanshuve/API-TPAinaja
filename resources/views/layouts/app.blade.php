<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPAinaja Admin Panel</title>

    {{-- Tambahkan Tailwind (tanpa Vite) --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{-- Font Awesome untuk ikon --}}
    <script src="https://kit.fontawesome.com/a2e0a4df11.js" crossorigin="anonymous"></script>

    {{-- Tambahkan gaya opsional --}}
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .active-link {
            background-color: #2563eb;
            color: white !important;
        }
    </style>
</head>
<body class="flex bg-gray-100">

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Konten utama --}}
    <main class="flex-1 ml-64 p-6">
        @yield('content')
    </main>

</body>
</html>
