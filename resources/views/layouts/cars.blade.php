<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/dashboard.css" type="text/css">
    <link rel="stylesheet" href="assets/css/cars.css" type="text/css">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body class="font-sans antialiased" >
    
    <div class="min-h-screen bg-gray-100" style="background-color: #ead196;">
        @include('layouts.navigation')
        <!-- <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Cars') }}
                    </h2>
                </div>
            </div>
        </header> -->

        <!-- Page Content -->
        <main class="container-dashboard">
            <div class="py-12 " >
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 ">
                        <div class="tombolLogin">
                            @if (Route::has('admin'))
                                <a href="{{ url('/admin') }}">
                                    Admin
                                </a>
                            @endif
                        </div>
                        <div class="cars-container">
                            <div class="shell">
                                <div class="col-md-3">
                                    <div class="wsk-cp-product">
                                        <div class="wsk-cp-img">
                                            <img src="{{ asset('images/logo.svg') }}" alt="Product"
                                                class="img-responsive" />
                                        </div>
                                        <div class="wsk-cp-text">
                                            <div class="category">
                                                <span>Pesan</span>
                                            </div>
                                            <div class="title-product">
                                                <h3>Jakarta - Malang</h3>
                                            </div>
                                            <div class="description-prod">
                                                <p>Description</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="wcf-left"><span class="price">Rp500.000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shell">
                                <div class="col-md-3">
                                    <div class="wsk-cp-product">
                                        <div class="wsk-cp-img">
                                            <img src="{{ asset('images/logo.svg') }}" alt="Product"
                                                class="img-responsive" />
                                        </div>
                                        <div class="wsk-cp-text">
                                            <div class="category">
                                                <span>Pesan</span>
                                            </div>
                                            <div class="title-product">
                                                <h3>Jakarta - Malang</h3>
                                            </div>
                                            <div class="description-prod">
                                                <p>Description</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="wcf-left"><span class="price">Rp500.000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shell">
                                <div class="col-md-3">
                                    <div class="wsk-cp-product">
                                        <div class="wsk-cp-img">
                                            <img src="{{ asset('images/logo.svg') }}" alt="Product"
                                                class="img-responsive" />
                                        </div>
                                        <div class="wsk-cp-text">
                                            <div class="category">
                                                <span>Pesan</span>
                                            </div>
                                            <div class="title-product">
                                                <h3>Jakarta - Malang</h3>
                                            </div>
                                            <div class="description-prod">
                                                <p>Description</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="wcf-left"><span class="price">Rp500.000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shell">
                                <div class="col-md-3">
                                    <div class="wsk-cp-product">
                                        <div class="wsk-cp-img">
                                            <img src="{{ asset('images/logo.svg') }}" alt="Product"
                                                class="img-responsive" />
                                        </div>
                                        <div class="wsk-cp-text">
                                            <div class="category">
                                                <span>Pesan</span>
                                            </div>
                                            <div class="title-product">
                                                <h3>Jakarta - Malang</h3>
                                            </div>
                                            <div class="description-prod">
                                                <p>Description</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="wcf-left"><span class="price">Rp500.000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shell">
                                <div class="col-md-3">
                                    <div class="wsk-cp-product">
                                        <div class="wsk-cp-img">
                                            <img src="{{ asset('images/logo.svg') }}" alt="Product"
                                                class="img-responsive" />
                                        </div>
                                        <div class="wsk-cp-text">
                                            <div class="category">
                                                <span>Pesan</span>
                                            </div>
                                            <div class="title-product">
                                                <h3>Jakarta - Malang</h3>
                                            </div>
                                            <div class="description-prod">
                                                <p>Description</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="wcf-left"><span class="price">Rp500.000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shell">
                                <div class="col-md-3">
                                    <div class="wsk-cp-product">
                                        <div class="wsk-cp-img">
                                            <img src="{{ asset('images/logo.svg') }}" alt="Product"
                                                class="img-responsive" />
                                        </div>
                                        <div class="wsk-cp-text">
                                            <div class="category">
                                                <span>Pesan</span>
                                            </div>
                                            <div class="title-product">
                                                <h3>Jakarta - Malang</h3>
                                            </div>
                                            <div class="description-prod">
                                                <p>Description</p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="wcf-left"><span class="price">Rp500.000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
