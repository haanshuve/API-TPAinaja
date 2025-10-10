<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TPAinaja | Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>
<body class="bg-white flex items-center justify-center min-h-screen">

  <div class="w-full max-w-md p-8">
    <!-- Logo & Heading -->
    <div class="text-center mb-6">
      <img 
        src="{{ asset('images/logo-tpainaja.png') }}" 
        alt="Logo TPAinaja" 
        class="mx-auto w-32 mb-4 drop-shadow-md"  <!-- 128px -->

      <h2 class="text-xl font-semibold text-gray-700 mt-2">HI, ADMIN</h2>
      <p class="text-gray-500 text-base mt-1">Welcome Back,<br>You have been missed</p>
    </div>

    <!-- Form -->
    <form method="POST" action="/login" class="space-y-4">
      @csrf
      <div>
        <input type="text" name="email" placeholder="Username" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#3B82F6] focus:outline-none" required>
      </div>
      <div>
        <input type="password" name="password" placeholder="Password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#3B82F6] focus:outline-none" required>
      </div>
      @error('loginError')
        <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror

      <div class="text-right">
        <a href="#" class="text-sm text-[#0A2540] hover:underline">Forgot Password?</a>
      </div>

      <button type="submit" class="w-full bg-[#3B82F6] text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition">
        LOGIN
      </button>

      <p class="text-center text-sm mt-4 text-gray-700">
        Don’t have an account?
        <a href="#" class="font-semibold text-[#0A2540] hover:underline">Register Now</a>
      </p>
    </form>
  </div>

</body>
</html>
