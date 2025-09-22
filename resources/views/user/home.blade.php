@extends('layouts.app')

@section('content')
    <div class="container-fluid px-0">
        <!-- Hero Section -->
        <div class="hero-section text-white d-flex align-items-center justify-content-center text-center">
            <div class="container py-5">
                <img src="{{ asset('images/logo1.png') }}" alt="KickZone Logo" class="mb-4 mx-auto d-block"
                    style="width: 180px; height: 180px;">
                <h1 class="display-3 fw-bold mb-4">Welcome to KickZone</h1>
                <p class="lead fs-3 mb-5">Your ultimate hub for everything sports and entertainment!</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="#" class="btn btn-primary btn-lg px-4 py-3 rounded-pill">Explore Matches</a>
                    <a href="#" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill">Join Community</a>
                </div>
            </div>
        </div>

        <!-- Enhanced Features Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="badge bg-primary bg-opacity-10 text-primary mb-3">Features</span>
                    <h2 class="display-5 fw-bold mb-3">⚡ Key Highlights</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 700px;">Everything you need to stay connected with
                        the sports world</p>
                </div>
                <div class="row g-4">
                    <!-- Live Scores Feature -->
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card p-4 border-0 rounded-4 shadow-sm h-100 bg-white transition-all hover-lift">
                            <div class="icon-wrapper bg-danger bg-opacity-10 rounded-circle d-inline-flex p-3 mb-4">
                                <i class="bi bi-heart-pulse-fill fs-1 text-danger"></i>
                            </div>
                            <h3 class="h4 fw-bold mb-3">Live Match Scores</h3>
                            <p class="text-muted mb-4">Follow every goal, red card, and minute-by-minute action from all
                                major leagues worldwide with real-time updates.</p>
                            {{-- <a href="{{ route('scores') }}"
                                class="btn btn-link text-danger p-0 mt-auto align-self-start d-flex align-items-center">
                                View Live Scores <i class="bi bi-arrow-right ms-2"></i>
                            </a> --}}
                        </div>
                    </div>

                    <!-- News Feature -->
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card p-4 border-0 rounded-4 shadow-sm h-100 bg-white transition-all hover-lift">
                            <div class="icon-wrapper bg-warning bg-opacity-10 rounded-circle d-inline-flex p-3 mb-4">
                                <i class="bi bi-broadcast-pin fs-1 text-warning"></i>
                            </div>
                            <h3 class="h4 fw-bold mb-3">Breaking News</h3>
                            <p class="text-muted mb-4">Daily headlines, transfer rumors, expert analysis, and exclusive
                                interviews with top athletes from around the globe.</p>
                            {{-- <a href="{{ route('news') }}"
                                class="btn btn-link text-warning p-0 mt-auto align-self-start d-flex align-items-center">
                                Read News <i class="bi bi-arrow-right ms-2"></i>
                            </a> --}}
                        </div>
                    </div>

                    <!-- Schedule Feature -->
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-card p-4 border-0 rounded-4 shadow-sm h-100 bg-white transition-all hover-lift">
                            <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-4">
                                <i class="bi bi-calendar-week-fill fs-1 text-primary"></i>
                            </div>
                            <h3 class="h4 fw-bold mb-3">Match Schedule</h3>
                            <p class="text-muted mb-4">Up-to-date fixtures from Premier League, La Liga, Champions League
                                and all major tournaments with notifications.</p>
                            {{-- <a href="{{ route('schedule') }}"
                                class="btn btn-link text-primary p-0 mt-auto align-self-start d-flex align-items-center">
                                View Schedule <i class="bi bi-arrow-right ms-2"></i>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <style>
            .hover-lift {
                transition: all 0.3s ease;
            }

            .hover-lift:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
            }

            .feature-card {
                display: flex;
                flex-direction: column;
            }
        </style>

        <!-- Cards Section -->
        <section class="py-5">
            <div class="container">
                <div class="row g-4">
                    <!-- Latest Games -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-lg h-100 transition-all hover-scale">
                            <div class="card-header bg-gradient-primary text-dark text-center py-4">
                                <i class="bi bi-joystick fs-1 mb-3"></i>
                                <h3 class="h5 fw-bold mb-0">Latest Games</h3>
                            </div>
                            <div class="card-body text-center p-4">
                                <p class="text-muted mb-4">Stay updated with the latest game results and highlights from
                                    around the world.</p>
                                <a href="{{ route('user.games') }}" class="btn btn-primary rounded-pill px-4">View Games</a>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Events -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-lg h-100 transition-all hover-scale">
                            <div class="card-header bg-gradient-success text-dark text-center py-4">
                                <i class="bi bi-calendar-event fs-1 mb-3"></i>
                                <h3 class="h5 fw-bold mb-0">Upcoming Events</h3>
                            </div>
                            <div class="card-body text-center p-4">
                                <p class="text-muted mb-4">Don't miss out on upcoming football events, tournaments and
                                    special matches.</p>
                                <a href="{{ route('user.events') }}" class="btn btn-success rounded-pill px-4">View
                                    Events</a>
                            </div>
                        </div>
                    </div>

                    <!-- Players -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-lg h-100 transition-all hover-scale">
                            <div class="card-header bg-gradient-warning text-dark text-center py-4">
                                <i class="bi bi-people-fill fs-1 mb-3"></i>
                                <h3 class="h5 fw-bold mb-0">Players</h3>
                            </div>
                            <div class="card-body text-center p-4">
                                <p class="text-muted mb-4">Explore detailed profiles, stats and performances of your
                                    favorite players.</p>
                                <a href="{{ route('user.players') }}" class="btn btn-warning rounded-pill px-4">View
                                    Players</a>
                            </div>
                        </div>
                    </div>

                    <!-- Teams -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-lg h-100 transition-all hover-scale">
                            <div class="card-header bg-gradient-danger text-dark text-center py-4">
                                <i class="bi bi-trophy-fill fs-1 mb-3"></i>
                                <h3 class="h5 fw-bold mb-0">Teams</h3>
                            </div>
                            <div class="card-body text-center p-4">
                                <p class="text-muted mb-4">Discover the best football teams, their rankings, and historical
                                    achievements.</p>
                                <a href="{{ route('user.teams') }}" class="btn btn-danger rounded-pill px-4">View Teams</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-5 bg-dark text-white">
            <div class="container text-center py-4">
                <h2 class="display-5 fw-bold mb-4">Ready to Dive In?</h2>
                <p class="lead mb-5">Join thousands of sports enthusiasts and never miss a moment of the action.</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4 py-3 rounded-pill">Sign Up Free</a>
                    <a href="#" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill">Learn More</a>
                </div>
            </div>
        </section>
    </div>

    <style>
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .hero-section .container {
            position: relative;
            z-index: 2;
            /* Ensure content is above the overlay */
        }

        .hero-section {
            background: url('{{ asset('images/img1.jpg') }}') no-repeat center center;
            background-size: cover;

            /* Full viewport height */
            position: relative;
        }

        .hero-section img {
            display: block;
            margin: 0 auto;
            width: 180px;
            height: 180px;
        }

        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .hover-scale {
            transition: transform 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.03);
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
        }

        .bg-gradient-success {
            background: linear-gradient(135deg, #198754 0%, #157347 100%);
        }

        .bg-gradient-warning {
            background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
        }

        .bg-gradient-danger {
            background: linear-gradient(135deg, #dc3545 0%, #bb2d3b 100%);
        }

        .transition-all {
            transition: all 0.3s ease;
        }
    </style>
@endsection
