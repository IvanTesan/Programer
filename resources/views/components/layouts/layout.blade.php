<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'MiSitio')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@yield('content')
<x-layouts.header/>
<main class="bg-base-300 min-h-screen py-12 md:py-20 lg:py-24 px-4 md:px-8" >
    {{$slot}}
</main>
<x-layouts.footer/>
</body>
</html>
