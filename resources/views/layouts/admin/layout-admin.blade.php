<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- CSS thème Tippy -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/themes/light-border.css" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->-
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @endif
</head>

<body>




    {{-- <div class="flex h-screen bg-gray-100 dark:bg-gray-900">
        @include('components.dashboard.aside')
        <div class="flex-1 flex flex-col">
            @include('components.dashboard.header')
            <main class="flex-1 overflow-y-auto p-6 ml-64">
                @yield('content')
            </main>
        </div>
    </div> --}}



    <div class="flex h-screen bg-gray-100 dark:bg-gray-900">
        @include('components.dashboard.aside')
        <div class="flex-1 flex flex-col">
            @include('components.dashboard.header')
            <main class="flex-1 overflow-y-auto p-6 md:ml-64">
                @yield('content')
            </main>
        </div>
    </div>
    <!-- Popper.js (nécessaire pour Tippy.js) -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- Tippy.js -->
    <script src="https://unpkg.com/tippy.js@6"></script>
    {{-- <script srcc="{{ asset('js/tippy.js') }}"></script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        tippy('[data-tippy-content]', {
            animation: 'scale',
            duration: [300, 200],
            delay: [150, 50],
            theme: 'material',
            arrow: true,
            placement: 'top',
            offset: [0, 10]
        });
    });
    </script>
</body>

</html>