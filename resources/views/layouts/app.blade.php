<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Baby Plus Pos</title>
    <!-- CSS files -->


    <link rel="stylesheet" href="{{ asset('css/demo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabler.min.css') }}">
    <script src="{{ asset('js/demo-theme.min.js')}}"></script>
</head>

<body class=" layout-fluid">
    <div class="page">
        <!-- Navbar -->
        <div class="sticky-top">
            <header class="navbar navbar-expand-md sticky-top d-print-none">
                <div class="container-xl">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                        aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                        <a href="{{ route('home') }}">
                            <img src="./static/logo.svg" width="110" height="32" alt="Baby Plus"
                                class="navbar-brand-image">
                        </a>
                    </h1>
                    <div class="navbar-nav flex-row order-md-last">
                        <div class="d-none d-md-flex">
                            <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                                data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                                </svg>
                            </a>
                            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                                data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path
                                        d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                                </svg>
                            </a>
                            <div class="nav-item dropdown d-none d-md-flex me-3">
                                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                    aria-label="Show notifications" id="bell">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                        <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                    </svg>
                                    <span class="badge bg-red"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                    <div class="card" id="new-order-alert" style="display: none;">
                                        <div class="card-header">
                                            <h3 class="card-title">Online Orders</h3>
                                        </div>
                                        <div class="list-group list-group-flush list-group-hoverable">
                                            <div class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col-auto"><span
                                                            class="status-dot status-dot-animated bg-red d-block"></span>
                                                    </div>
                                                    <div class="col text-truncate">
                                                        <a href="{{ route('cart.index') }}"
                                                            class="text-body d-block">New Online Order </a>
                                                        <div class="d-block text-secondary text-truncate mt-n1">
                                                            Click to view the order
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                                aria-label="Open user menu">
                                <span class="avatar avatar-sm"
                                    style="background-image: url(./static/avatars/000m.jpg)"></span>
                                <div class="d-none d-xl-block ps-2">
                                    @guest
                                    @else
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="mt-1 small text-secondary">{{ Auth::user()->type }}</div>
                                    @endguest
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <a href="./profile.html" class="dropdown-item">Profile</a>
                                @guest
                                @else
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                @endguest
                            </div>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Home
                                        </span>
                                    </a>
                                </li>



                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        </div>


        <div class="page-wrapper">
            <!-- Page header -->

            @if(session('success'))
            <div class="row justify-content-md-center">
                <div class="col col-lg-6 alert alert-success" role="alert" style=" position: fixed; z-index: 3;">
                    {{ session('success') }}
                </div>
            </div>
            @endif

            @if(session('error'))
            <div class="row justify-content-md-center">
                <div class="col col-lg-6 alert alert-danger" role="alert" style=" position: fixed; z-index: 3;">
                    {{ session('error') }}
                </div>
            </div>
            @endif

            @if($errors->any())
            <div class="row justify-content-md-center">
                <div class="col col-lg-6 alert alert-danger" role="alert" style=" position: fixed; z-index: 3;">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            @yield('content')

            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">

                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2023
                                    <a href="." class="link-secondary">Baby Plus</a>.
                                    All rights reserved.
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</body>
<script src="{{ asset('js/app.js')}}"></script>
<script src="{{ asset('js/tabler.min.js')}}"></script>
<script src="{{ asset('js/jquery.min.js')}}"></script>
<script>
$(document).ready(function() {
    // Function to check for new orders
    function checkNewOrders() {
        $.ajax({
            url: '/check-new-orders', // Your Laravel route
            method: 'GET',
            success: function(response) {
                if (response.hasNewOrders) {
                    $('#new-order-alert').show();
                    $('#bell').css('color', '#cf0000');
                    // Optionally play a sound
                    // new Audio('/path/to/notification.mp3').play();
                }
            },
            error: function(xhr) {
                console.log('Error checking orders:', xhr);
            }
        });
    }

    // Check every 5 minutes (300000 milliseconds)
    setInterval(checkNewOrders, 5000);

    // Also check immediately when page loads
    checkNewOrders();
});
</script>

</html>