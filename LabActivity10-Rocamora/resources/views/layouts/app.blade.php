<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Bulletin - Purok Rocamora</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 min-h-screen text-slate-800 antialiased">
    <!-- Header Navigation -->
    <header class="bg-emerald-800 text-white shadow-md">
        <div class="max-w-5xl mx-auto px-4 py-4 flex flex-col sm:flex-row justify-between items-center gap-2">
            <div>
                <a href="{{ route('posts.index') }}" class="text-xl font-bold tracking-tight hover:text-emerald-200">
                    Barangay Bulletin
                </a>
                <span class="text-xs bg-emerald-700 px-2.5 py-1 rounded-full text-emerald-100 ml-2">
                    Purok Rocamora
                </span>
            </div>
            <p class="text-xs text-emerald-200">Matina Crossing, Davao City</p>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 text-xs py-6 border-t border-slate-800 mt-12">
        <div class="max-w-5xl mx-auto px-4 text-center space-y-1">
            <p>&copy; {{ date('Y') }} Barangay Bulletin — Purok Rocamora.</p>
            <p class="text-slate-500">Official Barangay Matina Crossing Announcements</p>
        </div>
    </footer>
</body>
</html>