{{-- @dd($posts) --}}

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>{{ config('app.name') }}</title> --}}
    <title>
        @yield('title')

    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased   bg-[#FAF9F6] text-[#111827] dark:bg-[#1E2A38] dark:text-[#F4F4F5]">
    {{-- Conteneur global --}}
    @yield('content')


    {{-- Footer --}}
    @include('components.footer')
    {{-- EndFooter --}}

</body>

</html>