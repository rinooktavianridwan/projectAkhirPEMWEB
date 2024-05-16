<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/dashboard.css" type="text/css">
    <link rel="stylesheet" href="assets/css/aboutUs.css" type="text/css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('About Us') }}
                    </h2>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="container-dashboard">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <section id="aboutUs">
                            <img src="{{ asset('images/logo.svg') }}" alt="computer user">
                            <div class="content">
                                <h2>About Us</h2>
                                <h4> Developer & Designer </h4>
                                <p class="description">
                                    I am a Front-end web developer. I can provide clean code and pixel perfect design. I
                                    also make the
                                    website more & more interactive with web animations. I can provide clean code and
                                    pixel perfect. I also
                                    make the website more & more interactive with web animations. A responsive design
                                    makes your website
                                    accessible to all users. regardless of their device.
                                </p>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
