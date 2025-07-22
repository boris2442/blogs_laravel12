{{-- @dd($posts) --}}

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>{{ config('app.name') }}</title> --}}
    <title>
        {{ @yield('title')}}

    </title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased pt-10 pb-16 md:pb-32">
    {{-- Conteneur global --}}
    @yield('content')

</body>

</html>