@extends('layouts.app')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold mb-3">Upcoming Events</h1>
                <p class="lead text-muted">Check out our schedule of upcoming sports events</p>
            </div>

            <div class="row g-4">
                @forelse($events as $event)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">{{ $event->title }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-calendar-date fs-4 text-primary me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Date</h6>
                                        <p class="mb-0">
                                            @if ($event->date)
                                                {{ $event->date->format('F j, Y') }}
                                            @else
                                                Date not set
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-geo-alt fs-4 text-primary me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Location</h6>
                                        <p class="mb-0">{{ $event->location ?? 'Location not set' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <button class="btn btn-outline-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#eventModal{{ $event->id }}">
                                    More Details
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Event Modal -->
                    <div class="modal fade" id="eventModal{{ $event->id }}" tabindex="-1"
                        aria-labelledby="eventModalLabel{{ $event->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="eventModalLabel{{ $event->id }}">
                                        {{ $event->title }}
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-4 mb-md-0">
                                            <div class="card border-0 shadow-sm mb-3">
                                                <div class="card-body">
                                                    <h6 class="card-title text-primary">
                                                        <i class="bi bi-info-circle me-2"></i>Event Details
                                                    </h6>
                                                    <ul class="list-unstyled">
                                                        <li class="mb-2"><strong>Date:</strong>
                                                            @if ($event->date)
                                                                {{ $event->date->format('l, F j, Y') }}
                                                            @else
                                                                Date not set
                                                            @endif
                                                        </li>
                                                        <li class="mb-2"><strong>Time:</strong>
                                                            @if ($event->time)
                                                                {{ $event->time->format('g:i A') }}
                                                            @else
                                                                Time not set
                                                            @endif
                                                        </li>
                                                        <li class="mb-2"><strong>Location:</strong>
                                                            {{ $event->location ?? 'Location not set' }}
                                                        </li>
                                                        <li><strong>Organizer:</strong>
                                                            {{ $event->organizer ?? 'N/A' }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Rest of your modal content -->
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="#" class="btn btn-primary">Register for Event</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center py-4">
                            <i class="bi bi-info-circle-fill fs-3 mb-3"></i>
                            <h4>No upcoming events</h4>
                            <p class="mb-0">Check back later for scheduled events</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
