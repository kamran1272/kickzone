@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="mb-4 text-center">About KickZone</h1>

                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h2 class="h4 mb-3 text-primary">Our Story</h2>
                        <p class="lead">
                            Founded in 2023, KickZone began as a passion project by sports enthusiasts who wanted to create
                            a better way to connect players, teams, and fans.
                        </p>
                        <p>
                            What started as a small community initiative has grown into a comprehensive platform serving
                            thousands of users nationwide, helping them discover matches, manage teams, and celebrate their
                            love for sports.
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h2 class="h4 mb-3 text-primary">Our Mission</h2>
                        <p>
                            At KickZone, we're dedicated to revolutionizing the way people experience sports. We believe
                            every player deserves quality matches, every team deserves seamless management tools, and every
                            fan deserves front-row access to the action.
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="h4 mb-3 text-primary">Why Choose KickZone?</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item border-0 ps-0">✔ Comprehensive match scheduling and discovery</li>
                            <li class="list-group-item border-0 ps-0">✔ Advanced team management tools</li>
                            <li class="list-group-item border-0 ps-0">✔ Player statistics and performance tracking</li>
                            <li class="list-group-item border-0 ps-0">✔ Vibrant community of sports lovers</li>
                            <li class="list-group-item border-0 ps-0">✔ User-friendly platform for all skill levels</li>
                        </ul>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('contact') }}" class="btn btn-primary px-4">Get In Touch</a>
                </div>
            </div>
        </div>
    </div>
@endsection
