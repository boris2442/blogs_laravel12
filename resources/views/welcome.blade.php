<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Boris Tech</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-gray-50 dark:bg-slate-800 text-gray-800 dark:text-slate-100 flex items-center lg:justify-center min-h-screen flex-col">
    <div>
        <!-- Header -->
        <header x-data="{ open: false }" class="w-full px-4 py-3 border-b border-gray-200 dark:border-slate-700">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="text-xl font-bold text-blue-500 dark:text-blue-400">
                    Boris<span class="text-gray-900 dark:text-gray-100">Tech</span>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center gap-6 text-sm">
                    <a href="{{ route('about') }}" class="hover:text-blue-500 dark:hover:text-blue-400 text-gray-800 dark:text-gray-100">
                        À propos
                    </a>
                    <a href="{{ route('posts.index') }}" class="hover:text-blue-500 dark:hover:text-blue-400 text-gray-800 dark:text-gray-100">
                        Blog
                    </a>
                    <a href="{{ route('contact') }}" class="hover:text-blue-500 dark:hover:text-blue-400 text-gray-800 dark:text-gray-100">
                        Contact
                    </a>

                    @auth
                    <a href="{{ url('/dashboard') }}" class="hover:text-blue-500 dark:hover:text-blue-400 text-gray-800 dark:text-gray-100">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="hover:text-blue-500 dark:hover:text-blue-400 text-gray-800 dark:text-gray-100">
                        Connexion
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="hover:text-blue-500 dark:hover:text-blue-400 text-gray-800 dark:text-gray-100">
                        S'inscrire
                    </a>
                    @endif
                    @endauth
                </nav>

                <!-- Burger button -->
                <button @click="open = !open" class="md:hidden focus:outline-none">
                    <svg class="w-6 h-6 text-gray-800 dark:text-gray-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'inline-flex': open, 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="open" class="md:hidden mt-3 px-2 space-y-2">
                <a href="{{ url('/') }}" class="block px-4 py-2 text-sm text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-slate-700">
                    Accueil
                </a>
                <a href="{{ route('posts.index') }}" class="block px-4 py-2 text-sm text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-slate-700">
                    Blog
                </a>
                <a href="{{ route('about') }}" class="block px-4 py-2 text-sm text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-slate-700">
                    À propos
                </a>
                <a href="{{ route('contact') }}" class="block px-4 py-2 text-sm text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-slate-700">
                    Contact
                </a>

                @auth
                <a href="{{ url('/dashboard') }}" class="block px-4 py-2 text-sm text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-slate-700">
                    Dashboard
                </a>
                @else
                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-slate-700">
                    Connexion
                </a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-slate-700">
                    S’inscrire
                </a>
                @endif
                @endauth
            </div>
        </header>

        <main class="w-[100vw]">
            <section
                class="home-page text-gray-100 min-h-[70vh] px-3 w-full md:px-8 lg:px-16 xl:px-24 flex flex-col md:flex-row py-2 bg-blue-600">
                <div class="py-8 md:py-16 lg:py-24 flex-1 flex flex-col justify-center items-start">
                    <h1 class="text-3xl md:text-5xl font-extrabold mb-4 leading-tight">
                        Boris <span class="text-blue-300">Tech</span><br>
                        <span class="text-xl md:text-2xl font-medium text-blue-200">La technologie entre vos mains.</span>
                    </h1>
                    <p class="text-base md:text-lg text-blue-200 mb-6">
                        Découvrez nos produits, nos services et les dernières tendances tech à travers nos articles.
                    </p>
                    <div>
                        <a href="{{ route('about') }}"
                            class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg shadow-md transition duration-300">
                            En savoir plus
                        </a>
                    </div>
                </div>
            </section>
        </main>
    </div>
    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif
    @include('components.footer')
</body>

</html>
