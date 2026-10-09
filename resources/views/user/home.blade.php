@extends('layouts.app')

@section('content')
    <div class="container-fluid px-0">
        <!-- Professional Hero Section -->
        <section class="kz-hero">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <span class="kz-eyebrow">Sports Management Platform</span>
                        <h1 class="kz-title">Run Your Entire <span class="kz-accent">Sports Organization</span> From One Dashboard</h1>
                        <p class="kz-sub">KickZone brings teams, players, fixtures, events, and registrations together in one clean workspace &mdash; built for clubs, academies, and leagues of every size.</p>
                        <div class="kz-cta">
                            <a href="{{ route('register') }}" class="kz-btn kz-btn-primary">Get Started Free</a>
                            <a href="{{ route('login') }}" class="kz-btn kz-btn-ghost">Admin Login</a>
                        </div>
                        <div class="kz-stats">
                            <div class="kz-stat"><strong>1,250+</strong><span>Active Players</span></div>
                            <div class="kz-stat"><strong>48</strong><span>Teams</span></div>
                            <div class="kz-stat"><strong>320+</strong><span>Matches</span></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="kz-shot">
                            <div class="kz-shot-bar"><i></i><i></i><i></i></div>
                            <img src="{{ asset('images/img3.jpg') }}" alt="KickZone dashboard preview">
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
        /* KickZone Professional Hero */
        .kz-hero {
            position: relative;
            overflow: hidden;
            background-color: #0a1428;
            background-image:
                linear-gradient(rgba(255,255,255,.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.025) 1px, transparent 1px);
            background-size: 44px 44px;
            padding: 96px 0 90px;
        }

        .kz-hero::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 5px;
            background: linear-gradient(90deg, #22d3ee 0%, #3b82f6 100%);
        }

        .kz-eyebrow {
            display: inline-block;
            background: #22d3ee;
            color: #0a1428;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            padding: 9px 20px;
            border-radius: 50px;
            margin-bottom: 26px;
        }

        .kz-title {
            color: #ffffff;
            font-size: clamp(2.4rem, 4.6vw, 3.6rem);
            font-weight: 800;
            line-height: 1.12;
            letter-spacing: -0.5px;
            margin: 0 0 22px;
        }

        .kz-title .kz-accent { color: #22d3ee; }

        .kz-sub {
            color: #cbd5e1;
            font-size: 1.15rem;
            line-height: 1.75;
            margin: 0 0 38px;
            max-width: 540px;
        }

        .kz-cta { display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 52px; }

        .kz-btn {
            display: inline-block;
            font-size: 1rem;
            font-weight: 700;
            padding: 16px 40px;
            border-radius: 50px;
            text-decoration: none;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease, border-color .2s ease;
        }

        .kz-btn-primary { background: #22d3ee; color: #0a1428; border: 2px solid #22d3ee; }
        .kz-btn-primary:hover { transform: translateY(-2px); box-shadow: 0 14px 30px rgba(34,211,238,.35); color: #0a1428; }
        .kz-btn-ghost { background: transparent; color: #ffffff; border: 2px solid rgba(255,255,255,.5); }
        .kz-btn-ghost:hover { background: rgba(255,255,255,.1); border-color: #ffffff; color: #ffffff; }

        .kz-stats { display: flex; flex-wrap: wrap; }
        .kz-stat { padding: 0 36px; border-left: 1px solid rgba(255,255,255,.14); }
        .kz-stat:first-child { padding-left: 0; border-left: none; }
        .kz-stat strong { display: block; color: #ffffff; font-size: 1.9rem; font-weight: 800; line-height: 1.1; }
        .kz-stat span { color: #94a3b8; font-size: .78rem; font-weight: 600; letter-spacing: 1.5px; text-transform: uppercase; }

        .kz-shot {
            background: #ffffff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 34px 90px rgba(0,0,0,.5);
            max-width: 560px;
            margin: 0 auto;
        }

        .kz-shot-bar { display: flex; align-items: center; gap: 8px; background: #f1f5f9; padding: 14px 18px; border-bottom: 1px solid #e2e8f0; }
        .kz-shot-bar i { width: 12px; height: 12px; border-radius: 50%; background: #cbd5e1; }
        .kz-shot-bar i:nth-child(1) { background: #f87171; }
        .kz-shot-bar i:nth-child(2) { background: #fbbf24; }
        .kz-shot-bar i:nth-child(3) { background: #34d399; }
        .kz-shot img { display: block; width: 100%; height: auto; max-height: 430px; object-fit: cover; object-position: top center; }

        @media (max-width: 991.98px) {
            .kz-hero { padding: 72px 0 64px; }
            .kz-stat { padding: 0 24px; }
            .kz-sub { max-width: 100%; }
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
