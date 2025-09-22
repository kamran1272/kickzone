@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bold mb-3">Contact Us</h1>
                    <p class="lead text-muted">We'd love to hear from you! Feel free to reach out to us using the form below.
                    </p>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow-sm border-0 rounded-lg overflow-hidden">
                    <div class="card-body p-5">
                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold">Your Name</label>
                                <input type="text" class="form-control py-2 px-3 border-2 border-light rounded-3"
                                    id="name" name="name" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold">Your Email</label>
                                <input type="email" class="form-control py-2 px-3 border-2 border-light rounded-3"
                                    id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-4">
                                <label for="message" class="form-label fw-semibold">Your Message</label>
                                <textarea class="form-control py-2 px-3 border-2 border-light rounded-3" id="message" name="message" rows="5"
                                    placeholder="Enter your message" required></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg py-2 rounded-3 fw-semibold">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p class="text-muted">Alternatively, you can email us directly at <a href="mailto:support@kickzone.com"
                            class="text-decoration-none">support@kickzone.com</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
