<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tambahkan Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-100 via-purple-50 to-pink-100">
    <div class="min-h-screen flex items-center justify-center p-4">
        <!-- Wrapper untuk 2 kolom -->
        <div class="lg:flex lg:items-center lg:gap-8 lg:max-w-5xl w-full">
            <!-- Kolom Kiri - Logo (Hidden di mobile) -->
            <div class="hidden lg:flex lg:w-1/2 lg:justify-center lg:items-center">
                <img src="{{ asset('images/logoreligi.png') }}" alt="Logo" class="h-96 hover:scale-105 transition-transform duration-300">
            </div>

            <!-- Kolom Kanan - Form -->
            <div class="lg:w-1/2 w-full">
                <div class="bg-white/80 backdrop-blur-lg p-8 rounded-2xl shadow-2xl w-full mx-auto border border-gray-100">
                    <!-- Logo hanya ditampilkan di mobile -->
                    <div class="flex justify-center mb-6 lg:hidden">
                        <img src="{{ asset('images/logoreligi.png') }}" alt="Logo" class="h-20 hover:scale-105 transition-transform duration-300">
                    </div>

                    <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Selamat Datang</h2>

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                            <input type="email" name="email" id="email" required
                                class="block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                            <input type="password" name="password" id="password" required
                                class="block w-full px-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200">
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="checkbox" name="remember" id="remember"
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="remember" class="ml-2 text-sm text-gray-600">Ingat saya</label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" 
                                   class="text-sm text-indigo-600 hover:text-indigo-500 font-medium transition duration-200">
                                    Lupa password?
                                </a>
                            @endif
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-semibold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200 transform hover:-translate-y-0.5">
                                Masuk
                            </button>
                        </div>

                        <div class="text-center mt-6">
                            <p class="text-sm text-gray-600">
                                Belum punya akun?
                                <a href="{{ route('register') }}" 
                                   class="font-semibold text-indigo-600 hover:text-indigo-500 transition duration-200">
                                    Daftar disini
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
