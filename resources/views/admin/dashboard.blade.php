@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <!-- Dashboard Header with Breadcrumb -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold text-dark mb-1">Dashboard Overview</h1>

            </div>
            <div class="text-muted bg-light px-3 py-2 rounded-pill">
                <i class="bi bi-calendar3 me-2"></i>
                <span class="fw-medium">{{ now()->format('l, F j, Y') }}</span>
            </div>
        </div>

        <!-- Stats Cards with Progress Indicators -->
        <div class="row g-4 mb-4">
            <!-- Total Sports -->
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm overflow-hidden h-100">
                    <div class="card-body p-0 d-flex flex-column">
                        <div class="d-flex p-4 flex-grow-1">
                            <div class="bg-primary bg-opacity-10 p-3 rounded me-3">
                                <i class="bi bi-trophy-fill text-primary fs-3"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="text-muted mb-1">Total Sports</h6>
                                <h3 class="mb-2">{{ $sports->count() ?? '0' }}</h3>
                                <div class="progress mb-1" style="height: 6px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%;"
                                        aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-success mb-0 small">
                                    <i class="bi bi-arrow-up"></i> 12% from last month
                                </p>
                            </div>
                        </div>
                        <div class="bg-primary bg-opacity-10 px-4 py-2 d-flex justify-content-between">
                            <small class="text-primary">
                                <i class="bi bi-clock-history me-1"></i> Updated just now
                            </small>
                            <a href="{{ route('admin.sports') }}" class="text-primary small">View Details <i
                                    class="bi bi-chevron-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Users -->
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm overflow-hidden h-100">
                    <div class="card-body p-0 d-flex flex-column">
                        <div class="d-flex p-4 flex-grow-1">
                            <div class="bg-success bg-opacity-10 p-3 rounded me-3">
                                <i class="bi bi-people-fill text-success fs-3"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="text-muted mb-1">Total Users</h6>
                                <h3 class="mb-2">{{ $users->count() ?? '0' }}</h3>
                                <div class="progress mb-1" style="height: 6px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 85%;"
                                        aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-success mb-0 small">
                                    <i class="bi bi-arrow-up"></i> 24 new this month
                                </p>
                            </div>
                        </div>
                        <div class="bg-success bg-opacity-10 px-4 py-2 d-flex justify-content-between">
                            <small class="text-success">
                                <i class="bi bi-clock-history me-1"></i> Updated today
                            </small>
                            <a href="{{ route('admin.users') }}" class="text-success small">View Details <i
                                    class="bi bi-chevron-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Players -->
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm overflow-hidden h-100">
                    <div class="card-body p-0 d-flex flex-column">
                        <div class="d-flex p-4 flex-grow-1">
                            <div class="bg-warning bg-opacity-10 p-3 rounded me-3">
                                <i class="bi bi-person-badge-fill text-warning fs-3"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="text-muted mb-1">Total Players</h6>
                                <h3 class="mb-2">{{ $players->count() ?? '0' }}</h3>
                                <div class="progress mb-1" style="height: 6px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 65%;"
                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-danger mb-0 small">
                                    <i class="bi bi-arrow-down"></i> 3 inactive
                                </p>
                            </div>
                        </div>
                        <div class="bg-warning bg-opacity-10 px-4 py-2 d-flex justify-content-between">
                            <small class="text-warning">
                                <i class="bi bi-clock-history me-1"></i> Updated 1 hour ago
                            </small>
                            <a href="{{ route('admin.players') }}" class="text-warning small">View Details <i
                                    class="bi bi-chevron-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="row g-4">
            <!-- Recent Registrations with Chart -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold">Recent Registrations</h5>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                    id="regDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Last 7 Days
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="regDropdown">
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                    <li><a class="dropdown-item" href="#">Last 30 Days</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($recentRegistrations->count() > 0)
                            <div class="chart-container mb-3" style="height: 120px;">
                                <canvas id="registrationsChart"></canvas>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="rounded-start">Name</th>
                                            <th>Email</th>
                                            <th class="rounded-end">Registered</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentRegistrations as $user)
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm me-2">
                                                            <span class="avatar-title bg-primary rounded-circle">
                                                                {{ substr($user->name, 0, 1) }}
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <div class="fw-medium">{{ $user->name }}</div>
                                                            <small class="text-muted">{{ $user->role }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <span class="badge bg-light text-dark">
                                                        {{ $user->created_at->diffForHumans() }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="bi bi-people text-muted fs-1"></i>
                                <p class="text-muted mt-3 mb-0">No recent registrations found</p>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer bg-white border-0 py-3 text-center">
                        <a href="{{ route('admin.users') }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-arrow-right me-1"></i> View All Users
                        </a>
                    </div>
                </div>
            </div>

            <!-- Upcoming Fixtures with Calendar -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold">Upcoming Fixtures</h5>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                    id="fixtureDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    All Sports
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="fixtureDropdown">
                                    <li><a class="dropdown-item" href="#">Football</a></li>
                                    <li><a class="dropdown-item" href="#">Basketball</a></li>
                                    <li><a class="dropdown-item" href="#">Tennis</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($upcomingFixtures->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="rounded-start">Match</th>
                                            <th>Date & Time</th>
                                            <th class="rounded-end">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($upcomingFixtures as $fixture)
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm me-3 text-center">
                                                            <img src="https://via.placeholder.com/30" alt="team-logo"
                                                                class="avatar-xs rounded-circle">
                                                            <div class="text-xs mt-1">{{ $fixture->team1->name }}</div>
                                                        </div>
                                                        <div class="text-center mx-2 fw-bold text-primary">vs</div>
                                                        <div class="avatar-sm text-center">
                                                            <img src="https://via.placeholder.com/30" alt="team-logo"
                                                                class="avatar-xs rounded-circle">
                                                            <div class="text-xs mt-1">{{ $fixture->team2->name }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-medium">{{ $fixture->date->format('d M, Y') }}</div>
                                                    <small class="text-muted">
                                                        <i
                                                            class="bi bi-clock me-1"></i>{{ $fixture->time->format('h:i A') }}
                                                    </small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info bg-opacity-10 text-info">
                                                        <i class="bi bi-calendar-check me-1"></i> Upcoming
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                <div class="calendar-container">
                                    <div id="mini-calendar"></div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="bi bi-calendar-event text-muted fs-1"></i>
                                <p class="text-muted mt-3 mb-0">No upcoming fixtures scheduled</p>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer bg-white border-0 py-3 text-center">
                        <a href="/admin/fixtures" class="btn btn-sm btn-outline-primary me-2">
                            <i class="bi bi-plus-circle me-1"></i> Add Fixture
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-calendar-week me-1"></i> Full Calendar
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions & Recent Activity -->
        <div class="row mt-4">
            <!-- Quick Actions -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3 col-6">
                                <a href="/admin/fixtures" class="card action-card h-100 text-center border-0 shadow-none">
                                    <div class="card-body p-3">
                                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                                            <i class="bi bi-plus-lg text-primary fs-4"></i>
                                        </div>
                                        <h6 class="mb-0">Add Fixture</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="/admin/players" class="card action-card h-100 text-center border-0 shadow-none">
                                    <div class="card-body p-3">
                                        <div class="bg-success bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                                            <i class="bi bi-person-plus text-success fs-4"></i>
                                        </div>
                                        <h6 class="mb-0">Add Player</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="/admin/sports" class="card action-card h-100 text-center border-0 shadow-none">
                                    <div class="card-body p-3">
                                        <div class="bg-info bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                                            <i class="bi bi-trophy text-info fs-4"></i>
                                        </div>
                                        <h6 class="mb-0">Manage Sports</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="/admin/settings" class="card action-card h-100 text-center border-0 shadow-none">
                                    <div class="card-body p-3">
                                        <div class="bg-warning bg-opacity-10 p-3 rounded-circle d-inline-block mb-3">
                                            <i class="bi bi-gear text-warning fs-4"></i>
                                        </div>
                                        <h6 class="mb-0">Settings</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- System Status -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0 fw-bold">System Status</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                <i class="bi bi-server text-primary fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Server Load</h6>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 35%;"
                                        aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                                <i class="bi bi-database-check text-success fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Database</h6>
                                <span class="badge bg-success bg-opacity-10 text-success">
                                    <i class="bi bi-check-circle me-1"></i> Connected
                                </span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="bg-info bg-opacity-10 p-2 rounded me-3">
                                <i class="bi bi-shield-check text-info fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Security</h6>
                                <span class="badge bg-info bg-opacity-10 text-info">
                                    <i class="bi bi-lock me-1"></i> Protected
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 py-3 text-center">
                        <small class="text-muted">Last checked: {{ now()->format('h:i A') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border-radius: 0.75rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1.25rem rgba(0, 0, 0, 0.1);
        }

        .avatar-sm {
            width: 30px;
            height: 30px;
        }

        .avatar-title {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: white;
            font-weight: 600;
        }

        .table-borderless tbody tr:last-child {
            border-bottom: none;
        }

        .action-card {
            transition: all 0.3s ease;
            border-radius: 0.5rem;
        }

        .action-card:hover {
            background-color: rgba(0, 0, 0, 0.02);
            transform: translateY(-3px);
        }

        .chart-container {
            position: relative;
        }

        .calendar-container {
            border-radius: 0.5rem;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .breadcrumb {
            padding: 0;
            background: transparent;
            font-size: 0.875rem;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Registration Chart
        const regCtx = document.getElementById('registrationsChart').getContext('2d');
        const regChart = new Chart(regCtx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'New Registrations',
                    data: [12, 19, 8, 15, 22, 10, 5],
                    backgroundColor: 'rgba(13, 110, 253, 0.1)',
                    borderColor: 'rgba(13, 110, 253, 1)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: 'rgba(13, 110, 253, 1)',
                    pointBorderWidth: 2,
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        display: false,
                        beginAtZero: true
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Initialize mini calendar (placeholder)
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('mini-calendar');
            // In a real implementation, you would use a calendar library here
            calendarEl.innerHTML =
                '<div class="text-center p-3 text-muted">Calendar widget would appear here</div>';
        });
    </script>
@endpush
