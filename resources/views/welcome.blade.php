<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S1TI Library</title>
    <!-- Memanggil CSS dari Vite/Breeze -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center min-h-screen">

    <div class="text-center text-gray-800 dark:text-gray-200">
        <h1 class="text-4xl font-bold mb-6">Selamat Datang di S1TI Library</h1>
        
        <!-- Pengecekan Status Login -->
        @if (Route::has('login'))
            <div class="space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">Masuk ke Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-gray-800 dark:bg-gray-200 text-white dark:text-gray-800 rounded-md">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-transparent border border-gray-800 dark:border-gray-200 rounded-md">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

</body>
</html>