<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="KickZone Admin Panel">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - KickZone</title>

    {{-- Bootstrap + Icons --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


    {{-- Vite Compiled Assets --}}
    @vite(['public/css/app.css', 'public/js/app.js'])


    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
            position: fixed;
            width: 250px;
            top: 0;
            left: 0;
            z-index: 1040;
        }

        .sidebar h4 {
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: #ffc107;
        }

        .sidebar .nav-item .dropdown-menu {
            background-color: #495057;
            border: none;
        }

        .sidebar .nav-item .dropdown-menu a {
            color: white;
        }

        .sidebar .nav-item .dropdown-menu a:hover {
            background-color: #6c757d;
            color: #ffc107;
        }

        .topbar {
            background-color: #343a40;
            color: white;
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0 20px;
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            z-index: 1030;
        }

        .topbar .navbar-brand {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
        }

        .topbar .navbar-brand img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .topbar .navbar-brand span {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .content {
            margin-left: 250px;
            margin-top: 60px;
            padding: 20px;
        }

        .nav-link.active {
            background-color: #495057;
            color: #ffc107 !important;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <a class="navbar-brand d-flex align-items-center py-3" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('images/logo1.png') }}" alt="KickZone Logo" class="rounded-circle me-2"
                style="width: 60px; height: 60px;">
            <h4 class="text-warning">KickZone Admin</h4>
        </a>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i>Dashboard Summary
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users') }}"
                    class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                    <i class="bi bi-people-fill me-2"></i>Manage Users
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.players') }}"
                    class="nav-link {{ request()->routeIs('admin.players') ? 'active' : '' }}">
                    <i class="bi bi-person-fill me-2"></i>Players
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.teams') }}"
                    class="nav-link {{ request()->routeIs('admin.teams') ? 'active' : '' }}">
                    <i class="bi bi-people me-2"></i>Teams
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="sportsDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-trophy me-2"></i>Sports
                </a>
                <ul class="dropdown-menu" aria-labelledby="sportsDropdown">
                    <li><a class="dropdown-item" href="{{ route('admin.sports') }}">View Sports</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.schedules') }}">Schedule</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.fixtures') }}">Fixtures</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.results') }}">Results</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.events') }}"
                    class="nav-link {{ request()->routeIs('admin.events') ? 'active' : '' }}">
                    <i class="bi bi-calendar-event me-2"></i>Events
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.announcements.index') }}"
                    class="nav-link {{ request()->routeIs('admin.announcements') ? 'active' : '' }}">
                    <i class="bi bi-megaphone me-2"></i>Announcements
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.registrations') }}"
                    class="nav-link {{ request()->routeIs('admin.registrations') ? 'active' : '' }}">
                    <i class="bi bi-card-list me-2"></i>Registrations
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.reports') }}"
                    class="nav-link {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-bar-graph me-2"></i>Reports
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.settings') }}"
                    class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <i class="bi bi-gear me-2"></i>Settings
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.profile') }}"
                    class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                    <i class="bi bi-person-circle me-2"></i>Profile
                </a>
            </li>
        </ul>
    </nav>

    <!-- Top Bar -->
    <div class="topbar">
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-2"></i>{{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                <i class="bi bi-person-lines-fill me-2"></i>Profile
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right me-2"></i>Log Out
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @endauth
        </ul>
    </div>

    <!-- Main Content -->
    <main class="content">
        @yield('content')
    </main>

    {{-- JS Scripts --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
</body>

</html>
