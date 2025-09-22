<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KickZone') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Scripts -->
    @vite(['public/css/app.css', 'public/js/app.js'])


    <style>
        .navbar-brand img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container-fluid px-4">
                <!-- Logo -->
                <a class="navbar-brand py-2" href="#">
                    <img src="{{ asset('images/logo1.png') }}" alt="KickZone Logo" class="rounded-circle me-2"
                        style="width: 40px; height: 40px;">
                    <span class="align-middle">KickZone</span>
                </a>

                <!-- Hamburger Menu for Mobile -->
                <button class="navbar-toggler mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-2 {{ request()->routeIs('about') ? 'active' : '' }}"
                                href="{{ route('about') }}">
                                <i class="bi bi-info-circle me-2"></i>About
                            </a>
                        </li>

                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-2 {{ request()->routeIs('contact') ? 'active' : '' }}"
                                href="{{ route('contact') }}">
                                <i class="bi bi-envelope me-2"></i>Contact
                            </a>
                        </li>

                        <!-- Admin Links -->
                        @if (Auth::check() && Auth::user()->is_admin)
                            <li class="nav-item mx-1">
                                <a class="nav-link px-3 py-2 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="bi bi-shield-lock me-2"></i>Admin Dashboard
                                </a>
                            </li>
                            <li class="nav-item mx-1">
                                <a class="nav-link px-3 py-2 {{ request()->routeIs('admin.sports.index') ? 'active' : '' }}"
                                    href="{{ route('admin.sports') }}">
                                    <i class="bi bi-trophy me-2"></i>Manage Sports
                                </a>
                            </li>
                        @endif

                        <!-- Profile Dropdown -->
                        @if (Auth::check())
                            <li class="nav-item dropdown mx-1">
                                <a class="nav-link px-3 py-2 dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle me-2"></i>{{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item px-3 py-2" href="{{ route('user.profile') }}">
                                            <i class="bi bi-person-lines-fill me-2"></i>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item px-3 py-2 w-100 text-start">
                                                <i class="bi bi-box-arrow-right me-2"></i>Log Out
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <!-- Login and Register Links for Guests -->
                            <li class="nav-item mx-1">
                                <a class="nav-link px-3 py-2" href="{{ route('login') }}">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                                </a>
                            </li>
                            <li class="nav-item mx-1">
                                <a class="nav-link px-3 py-2" href="{{ route('register') }}">
                                    <i class="bi bi-person-plus-fill me-2"></i>Register
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
</body>

</html>
