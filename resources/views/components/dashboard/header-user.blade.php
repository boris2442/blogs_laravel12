<!-- Header -->
<header x-data="{ open: false }" class="w-full px-4 py-3 border-b dark:border-neutral-700">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600 dark:text-blue-400">
            Boris<span class="text-black dark:text-white">Tech</span>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center gap-6 text-sm">
            <a href="{{ url('/') }}" class="hover:text-blue-600 dark:hover:text-blue-400 text-neutral-800 dark:text-neutral-200">Accueil</a>
            <a href="{{ route('posts.index') }}" class="hover:text-blue-600 dark:hover:text-blue-400 text-neutral-800 dark:text-neutral-200">Blog</a>
            <a href="{{ route('about') }}" class="hover:text-blue-600 dark:hover:text-blue-400 text-neutral-800 dark:text-neutral-200">À propos</a>
            <a href="{{ route('contact') }}" class="hover:text-blue-600 dark:hover:text-blue-400 text-neutral-800 dark:text-neutral-200">Contact</a>

            @auth
                <a href="{{ url('/dashboard') }}" class="hover:text-blue-600 dark:hover:text-blue-400 text-neutral-800 dark:text-neutral-200">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="hover:text-blue-600 dark:hover:text-blue-400 text-neutral-800 dark:text-neutral-200">Connexion</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="hover:text-blue-600 dark:hover:text-blue-400 text-neutral-800 dark:text-neutral-200">S'inscrire</a>
                @endif
            @endauth
        </nav>

        <!-- Burger button -->
        <button @click="open = !open" class="md:hidden focus:outline-none">
            <svg class="w-6 h-6 text-neutral-800 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
                <path :class="{'inline-flex': open, 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="md:hidden mt-3 px-2 space-y-2">
        <a href="{{ url('/') }}" class="block px-4 py-2 text-sm text-neutral-800 dark:text-neutral-200 hover:bg-gray-100 dark:hover:bg-gray-700">Accueil</a>
        <a href="{{ route('posts.index') }}" class="block px-4 py-2 text-sm text-neutral-800 dark:text-neutral-200 hover:bg-gray-100 dark:hover:bg-gray-700">Blog</a>
        <a href="{{ route('about') }}" class="block px-4 py-2 text-sm text-neutral-800 dark:text-neutral-200 hover:bg-gray-100 dark:hover:bg-gray-700">À propos</a>
        <a href="{{ route('contact') }}" class="block px-4 py-2 text-sm text-neutral-800 dark:text-neutral-200 hover:bg-gray-100 dark:hover:bg-gray-700">Contact</a>

        @auth
            <a href="{{ url('/dashboard') }}" class="block px-4 py-2 text-sm text-neutral-800 dark:text-neutral-200 hover:bg-gray-100 dark:hover:bg-gray-700">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-neutral-800 dark:text-neutral-200 hover:bg-gray-100 dark:hover:bg-gray-700">Connexion</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-neutral-800 dark:text-neutral-200 hover:bg-gray-100 dark:hover:bg-gray-700">S’inscrire</a>
            @endif
        @endauth
    </div>
</header>
