<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        
        @livewireStyles
        @livewireScripts

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

    </head>

    <body class="bg-gray-900 text-white">
        <div class="flex flex-col h-screen">
            <!-- Cabecera con el logo -->
            <header class="bg-blue-500 text-white p-4 flex justify-between items-center">
                <div>
                    <h1>Scandinavian Travels</h1>
                </div>
                <div class="text-right">
                    Valentín Ayesa
                </div>
            </header>
    
            <!-- Menú centrado -->
            <nav class="bg-gray-200 p-4">
                <div class="container mx-auto flex justify-center">
                    <a href={{ route('home') }} class="text-gray-600 hover:text-blue-500 mx-4">Dashboard</a>
                    <a href={{ route('cars.index') }} class="text-gray-600 hover:text-blue-500 mx-4">Cars</a>
                    <a href={{ route('posts.index') }} class="text-gray-600 hover:text-blue-500 mx-4">Posts</a>
                    <a href={{ route('authors.index') }} class="text-gray-600 hover:text-blue-500 mx-4">Authors</a>
                    <a href={{ route('locations.index') }} class="text-gray-600 hover:text-blue-500 mx-4">Locations</a>
                </div>
            </nav>
            
            @yield('body')
           
        </div>
    </body>
</html>
