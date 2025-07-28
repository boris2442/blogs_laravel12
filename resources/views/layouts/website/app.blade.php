<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" x-bind:class="{ 'dark': darkMode }" x-init="$watch('darkMode', val => localStorage.setItem('theme', val))">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'BorisTech Blog')</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css') {{-- si tu utilises Vite --}}
    
    {{-- Scripts Livewire / Alpine --}}
    {{-- @livewireStyles
    @stack('styles') --}}
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex flex-col font-sans">

    {{-- Header --}}
    @include('components.dashboard.navigation')

    {{-- Contenu principal --}}
    <main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Scripts --}}
    {{-- @livewireScripts
    @stack('scripts') --}}
</body>
</html>
