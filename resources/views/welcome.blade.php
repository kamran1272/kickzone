@extends('layouts.app')

@section('content')
    <div class="kickzone-dashboard">
        <!-- Enhanced Hero Section -->
        <section class="hero-section position-relative overflow-hidden py-5 py-lg-7">
            <!-- Background elements -->
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-light" style="z-index: -2;"></div>
            <div class="position-absolute bottom-0 end-0"
                style="width: 800px; height: 800px; background: radial-gradient(circle, rgba(var(--bs-primary-rgb), 0.1) 0%, rgba(var(--bs-primary-rgb), 0) 70%); z-index: -1;">
            </div>

            <div class="container">
                <div class="row align-items-center g-5">
                    <!-- Text content -->
                    <div class="col-lg-6 order-lg-1 order-2">
                        <div class="pe-lg-5">
                            <span class="badge bg-primary bg-opacity-10 text-primary mb-3">SPORTS MANAGEMENT PLATFORM</span>
                            <h1 class="display-4 fw-bold mb-4">Revolutionize Your <span class="text-primary">Sports
                                    Organization</span></h1>
                            <p class="lead text-muted mb-5">KickZone provides everything you need to manage teams,
                                schedules, and performance analytics in one powerful platform.</p>

                            <div class="d-flex flex-wrap gap-3 mb-5 mb-lg-0">
                                <a href="{{ route('register') }}"
                                    class="btn btn-primary btn-lg px-4 py-3 rounded-pill fw-bold shadow-sm hover-lift">
                                    <i class="bi bi-rocket me-2"></i>Get Started Free
                                </a>
                            </div>

                            <!-- Trust indicators -->
                            <div class="mt-4 pt-2">
                                <p class="small text-muted mb-2">TRUSTED BY COACHES WORLDWIDE</p>
                                <div class="d-flex flex-wrap align-items-center gap-4">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        <span>500+ Teams</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        <span>25+ Sports</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        <span>24/7 Support</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hero image -->
                    <div class="col-lg-6 order-lg-2 order-1">
                        <div class="hero-image position-relative">
                            <img src="{{ asset('images/img3.jpg') }}" alt="KickZone Dashboard"
                                class="img-fluid rounded-4 shadow-lg">




                            <!-- Floating card element -->
                            <div class="position-absolute top-0 end-0 translate-middle bg-white rounded-3 shadow-sm p-3 d-none d-md-block"
                                style="width: 200px;">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-2 me-2">
                                        <i class="bi bi-graph-up text-success"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 small text-muted">Performance</p>
                                        <p class="mb-0 fw-bold">+32% Improved</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Enhanced Features Section -->
        <div class="features-section py-5 bg-light">
            <div class="container">
                <div class="section-header text-center mb-5">
                    <span class="badge bg-primary bg-opacity-10 text-primary mb-3">Why Choose Us</span>
                    <h2 class="display-5 fw-bold mb-3">Powerful Sports Management Features</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 700px;">
                        Streamline your sports organization with our comprehensive suite of tools designed for teams,
                        leagues, and clubs of all sizes
                    </p>
                </div>

                <div class="row g-4">
                    <!-- Feature 1 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card feature-card h-100 border-0 shadow-sm overflow-hidden">
                            <div class="feature-icon-wrapper bg-primary bg-opacity-10 text-center py-4">
                                <div class="icon-circle bg-primary mx-auto mb-3">
                                    <i class="bi bi-calendar-event fs-3 text-white"></i>
                                </div>
                                <h3 class="h4 mb-0">Event Management</h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Easily schedule, organize, and track all your sports events with our
                                    intuitive calendar system and automated reminders.</p>
                                <ul class="feature-list list-unstyled">
                                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Drag-and-drop scheduling
                                    </li>
                                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Automatic conflict
                                        detection</li>
                                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Customizable event
                                        templates</li>
                                </ul>
                            </div>
                            <div class="card-footer bg-transparent border-0 pt-0">
                                <img src="{{ asset('images/event-mng.jpg') }}" alt="Event Management"
                                    class="img-fluid rounded-3 shadow-sm">
                            </div>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card feature-card h-100 border-0 shadow-sm overflow-hidden">
                            <div class="feature-icon-wrapper bg-success bg-opacity-10 text-center py-4">
                                <div class="icon-circle bg-success mx-auto mb-3">
                                    <i class="bi bi-people-fill fs-3 text-white"></i>
                                </div>
                                <h3 class="h4 mb-0">Team Management</h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Manage players, staff, and team information with our comprehensive
                                    roster system and communication tools.</p>
                                <ul class="feature-list list-unstyled">
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i>Player profile management
                                    </li>
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i>Attendance tracking</li>
                                    <li><i class="bi bi-check-circle-fill text-success me-2"></i>Team communication hub</li>
                                </ul>
                            </div>
                            <div class="card-footer bg-transparent border-0 pt-0">
                                <img src="{{ asset('images/team-mng.jpg') }}" alt="Team Management"
                                    class="img-fluid rounded-3 shadow-sm">
                            </div>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card feature-card h-100 border-0 shadow-sm overflow-hidden">
                            <div class="feature-icon-wrapper bg-warning bg-opacity-10 text-center py-4">
                                <div class="icon-circle bg-warning mx-auto mb-3">
                                    <i class="bi bi-bar-chart-line fs-3 text-white"></i>
                                </div>
                                <h3 class="h4 mb-0">Performance Analytics</h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Gain actionable insights with detailed statistics, customizable
                                    reports, and performance tracking.</p>
                                <ul class="feature-list list-unstyled">
                                    <li><i class="bi bi-check-circle-fill text-warning me-2"></i>Real-time stats tracking
                                    </li>
                                    <li><i class="bi bi-check-circle-fill text-warning me-2"></i>Custom report generation
                                    </li>
                                    <li><i class="bi bi-check-circle-fill text-warning me-2"></i>Player comparison tools
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer bg-transparent border-0 pt-0">
                                <img src="{{ asset('images/analytics.jpg') }}" alt="Performance Analytics"
                                    class="img-fluid rounded-3 shadow-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Stats Section -->
        <div class="stats-section py-6 bg-dark text-white position-relative overflow-hidden">
            <!-- Background pattern (optional) -->
            <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10"
                style="background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgZmlsbD0idXJsKCNwYXR0ZXJuKSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIvPjwvc3ZnPg==')">
            </div>

            <div class="container position-relative">
                <div class="row g-4 g-lg-5">
                    <!-- Stat 1 -->
                    <div class="col-md-6 col-lg-3">
                        <div
                            class="stat-card text-center p-4 h-100 bg-dark bg-opacity-50 rounded-4 border border-light border-opacity-10 transition-all hover-scale">
                            <div class="stat-icon mb-3">
                                <div class="icon-wrapper bg-primary bg-opacity-20 rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="width: 70px; height: 70px;">
                                    <i class="bi bi-people-fill fs-3 text-primary"></i>
                                </div>
                            </div>
                            <h3 class="stat-number display-5 fw-bold mb-2" data-count="1250">0</h3>
                            <p class="stat-label text-uppercase text-light opacity-75 mb-0 letter-spacing-1">Active Users
                            </p>
                        </div>
                    </div>

                    <!-- Stat 2 -->
                    <div class="col-md-6 col-lg-3">
                        <div
                            class="stat-card text-center p-4 h-100 bg-dark bg-opacity-50 rounded-4 border border-light border-opacity-10 transition-all hover-scale">
                            <div class="stat-icon mb-3">
                                <div class="icon-wrapper bg-success bg-opacity-20 rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="width: 70px; height: 70px;">
                                    <i class="bi bi-trophy-fill fs-3 text-success"></i>
                                </div>
                            </div>
                            <h3 class="stat-number display-5 fw-bold mb-2" data-count="500">0</h3>
                            <p class="stat-label text-uppercase text-light opacity-75 mb-0 letter-spacing-1">Teams Managed
                            </p>
                        </div>
                    </div>

                    <!-- Stat 3 -->
                    <div class="col-md-6 col-lg-3">
                        <div
                            class="stat-card text-center p-4 h-100 bg-dark bg-opacity-50 rounded-4 border border-light border-opacity-10 transition-all hover-scale">
                            <div class="stat-icon mb-3">
                                <div class="icon-wrapper bg-warning bg-opacity-20 rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="width: 70px; height: 70px;">
                                    <i class="bi bi-calendar2-check-fill fs-3 text-warning"></i>
                                </div>
                            </div>
                            <h3 class="stat-number display-5 fw-bold mb-2" data-count="2000">0</h3>
                            <p class="stat-label text-uppercase text-light opacity-75 mb-0 letter-spacing-1">Events Created
                            </p>
                        </div>
                    </div>

                    <!-- Stat 4 -->
                    <div class="col-md-6 col-lg-3">
                        <div
                            class="stat-card text-center p-4 h-100 bg-dark bg-opacity-50 rounded-4 border border-light border-opacity-10 transition-all hover-scale">
                            <div class="stat-icon mb-3">
                                <div class="icon-wrapper bg-info bg-opacity-20 rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="width: 70px; height: 70px;">
                                    <i class="bi bi-headset fs-3 text-info"></i>
                                </div>
                            </div>
                            <h3 class="stat-number display-5 fw-bold mb-2">24/7</h3>
                            <p class="stat-label text-uppercase text-light opacity-75 mb-0 letter-spacing-1">Support
                                Available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Count-up animation
            document.addEventListener('DOMContentLoaded', function() {
                const counters = document.querySelectorAll('.stat-number[data-count]');
                const speed = 200;

                counters.forEach(counter => {
                    const target = +counter.getAttribute('data-count');
                    const count = +counter.innerText;
                    const increment = target / speed;

                    if (count < target) {
                        const updateCount = () => {
                            const newCount = Math.ceil(count + increment);
                            counter.innerText = newCount.toLocaleString();

                            if (newCount < target) {
                                setTimeout(updateCount, 1);
                            } else {
                                counter.innerText = target.toLocaleString();
                            }
                        };
                        updateCount();
                    }
                });
            });
        </script>

        <!-- Enhanced Testimonials Section -->
        <div class="testimonials-section py-6 bg-light position-relative">
            <div class="container position-relative">
                <div class="section-header text-center mb-5">
                    <span class="badge bg-primary bg-opacity-10 text-primary mb-3">Testimonials</span>
                    <h2 class="display-5 fw-bold mb-3">What Our Users Say</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 700px;">
                        Trusted by sports organizations, teams, and coaches worldwide
                    </p>
                </div>

                <div class="row g-4">
                    <!-- Testimonial 1 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card testimonial-card h-100 border-0 shadow-sm overflow-hidden hover-scale">
                            <div class="card-body p-4">
                                <div class="testimonial-rating text-warning mb-3">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <p class="testimonial-text fs-5 mb-4">"KickZone has transformed how we manage our soccer
                                    academy. The platform is intuitive and packed with exactly the features we need to
                                    streamline our operations."</p>
                                <div class="testimonial-author d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('images/kami1.jpg') }}" alt="John D." class="rounded-circle"
                                            width="60" height="60">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1 fw-bold">John D.</h5>
                                        <p class="text-muted mb-0">Academy Director</p>
                                        <small class="text-primary">Elite Soccer Academy</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card testimonial-card h-100 border-0 shadow-sm overflow-hidden hover-scale">
                            <div class="card-body p-4">
                                <div class="testimonial-rating text-warning mb-3">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <p class="testimonial-text fs-5 mb-4">"The analytics tools have given us insights we never
                                    had before. Our team performance has improved dramatically since we started using
                                    KickZone's data-driven approach."</p>
                                <div class="testimonial-author d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('images/kami2.jpg') }}" alt="Sarah M." class="rounded-circle"
                                            width="60" height="60">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1 fw-bold">Sarah M.</h5>
                                        <p class="text-muted mb-0">Head Coach</p>
                                        <small class="text-primary">Champions Basketball Club</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card testimonial-card h-100 border-0 shadow-sm overflow-hidden hover-scale">
                            <div class="card-body p-4">
                                <div class="testimonial-rating text-warning mb-3">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </div>
                                <p class="testimonial-text fs-5 mb-4">"Scheduling used to be a nightmare. Now with
                                    KickZone, we save hours every week on organization and can focus more on player
                                    development."</p>
                                <div class="testimonial-author d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('images/kami3.jpg') }}" alt="Michael T."
                                            class="rounded-circle" width="60" height="60">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1 fw-bold">Michael T.</h5>
                                        <p class="text-muted mb-0">League Administrator</p>
                                        <small class="text-primary">City Youth Sports League</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Navigation -->
                <div class="text-center mt-5">
                    <button class="btn btn-outline-primary rounded-circle mx-1 testimonial-nav"
                        data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="btn btn-outline-primary rounded-circle mx-1 testimonial-nav"
                        data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <script>
            // Optional: Add carousel functionality if you want to rotate testimonials
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize testimonial carousel if needed
                // This would require adding carousel markup if you want sliding testimonials
            });
        </script>

        <!-- Enhanced CTA Section -->
        <div class="cta-section position-relative py-6 bg-primary text-white overflow-hidden">
            <!-- Decorative elements -->
            <div class="position-absolute top-0 end-0 w-100 h-100 opacity-10"
                style="background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgZmlsbD0idXJsKCNwYXR0ZXJuKSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIvPjwvc3ZnPg==')">
            </div>
            <div class="position-absolute bottom-0 start-0"
                style="width: 300px; height: 300px; background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0) 70%);">
            </div>

            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="display-4 fw-bold mb-4">Ready to Transform Your Sports Management?</h2>
                        <p class="lead mb-5 opacity-85" style="max-width: 600px; margin: 0 auto;">
                            Join thousands of sports organizations using KickZone to streamline operations, enhance
                            performance, and connect their teams
                        </p>

                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a href="{{ route('register') }}"
                                class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-bold shadow-sm hover-lift">
                                <i class="bi bi-rocket me-2"></i>Start Free Trial
                            </a>
                            <a href="{{ route('contact') }}"
                                class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill fw-bold hover-lift">
                                <i class="bi bi-chat-left-text me-2"></i>Contact Our Team
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Hero Section */
        .hero-section {
            background: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(248, 249, 250, 1) 100%);
        }

        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
        }

        .hero-image {
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 0.5rem;
            overflow: hidden;
        }

        /* Features Section */
        .section-header {
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: #6c757d;
        }

        .feature-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            height: 100%;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .feature-icon i {
            font-size: 1.5rem;
            color: white;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .feature-card p {
            color: #6c757d;
            margin-bottom: 1.5rem;
        }

        .feature-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            margin-top: 1rem;
        }

        /* Stats Section */
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .letter-spacing-1 {
            letter-spacing: 1px;
        }

        /* Testimonials Section */
        ..testimonial-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .testimonial-rating i {
            margin-right: 2px;
        }

        .testimonial-nav {
            width: 40px;
            height: 40px;
            line-height: 1;
            padding: 0;
        }

        /* CTA Section */
        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .cta-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-image {
                margin-top: 3rem;
                transform: none;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .cta-title {
                font-size: 2rem;
            }
        }
    </style>
@endpush
