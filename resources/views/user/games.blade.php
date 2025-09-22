@extends('layouts.app')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold mb-3">Upcoming Games</h1>
                <p class="lead text-muted">Check out the schedule of upcoming matches</p>
            </div>

            <div class="row g-4">
                @forelse($games as $game)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">{{ $game->homeTeam->name }} vs {{ $game->awayTeam->name }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-calendar-date fs-4 text-primary me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Date & Time</h6>
                                        <p class="mb-0">
                                            {{ $game->date->format('M j, Y') }} at {{ $game->time->format('g:i A') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-geo-alt fs-4 text-primary me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Venue</h6>
                                        <p class="mb-0">{{ $game->venue->name ?? 'TBD' }}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-trophy fs-4 text-primary me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Competition</h6>
                                        <p class="mb-0">{{ $game->competition ?? 'Friendly Match' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <button class="btn btn-outline-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#gameModal{{ $game->id }}">
                                    Game Details
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Game Modal -->
                    <div class="modal fade" id="gameModal{{ $game->id }}" tabindex="-1"
                        aria-labelledby="gameModalLabel{{ $game->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="gameModalLabel{{ $game->id }}">
                                        {{ $game->homeTeam->name }} vs {{ $game->awayTeam->name }}
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-4 mb-md-0">
                                            <div class="text-center mb-4">
                                                <div class="d-flex justify-content-center align-items-center mb-3">
                                                    <div class="text-center mx-3">
                                                        <img src="{{ $game->homeTeam->logo_url ?? asset('images/default-team.png') }}"
                                                            alt="{{ $game->homeTeam->name }}" class="img-fluid mb-2"
                                                            style="height: 80px; width: auto;">
                                                        <h5>{{ $game->homeTeam->name }}</h5>
                                                    </div>
                                                    <h3 class="mx-2">vs</h3>
                                                    <div class="text-center mx-3">
                                                        <img src="{{ $game->awayTeam->logo_url ?? asset('images/default-team.png') }}"
                                                            alt="{{ $game->awayTeam->name }}" class="img-fluid mb-2"
                                                            style="height: 80px; width: auto;">
                                                        <h5>{{ $game->awayTeam->name }}</h5>
                                                    </div>
                                                </div>
                                                <div class="bg-light p-3 rounded-3">
                                                    <h4 class="mb-0">
                                                        @if ($game->home_score !== null && $game->away_score !== null)
                                                            {{ $game->home_score }} - {{ $game->away_score }}
                                                        @else
                                                            Coming Soon
                                                        @endif
                                                    </h4>
                                                </div>
                                            </div>

                                            <div class="card border-0 shadow-sm mb-3">
                                                <div class="card-body">
                                                    <h6 class="card-title text-primary">
                                                        <i class="bi bi-info-circle me-2"></i>Match Details
                                                    </h6>
                                                    <ul class="list-unstyled">
                                                        <li class="mb-2"><strong>Date:</strong>
                                                            {{ $game->date->format('l, F j, Y') }}</li>
                                                        <li class="mb-2"><strong>Time:</strong>
                                                            {{ $game->time->format('g:i A') }}</li>
                                                        <li class="mb-2"><strong>Venue:</strong>
                                                            {{ $game->venue->name ?? 'TBD' }}</li>
                                                        <li class="mb-2"><strong>Referee:</strong>
                                                            {{ $game->referee ?? 'TBD' }}</li>
                                                        <li><strong>Competition:</strong>
                                                            {{ $game->competition ?? 'Friendly Match' }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card border-0 shadow-sm mb-3">
                                                <div class="card-body">
                                                    <h6 class="card-title text-primary">
                                                        <i class="bi bi-calendar-event me-2"></i>Recent Form
                                                    </h6>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="text-center">
                                                            <small>{{ $game->homeTeam->name }}</small>
                                                            <div class="d-flex mt-2">
                                                                @foreach (['W', 'L', 'D', 'W', 'W'] as $result)
                                                                    <span
                                                                        class="badge bg-{{ $result == 'W' ? 'success' : ($result == 'L' ? 'danger' : 'warning') }} mx-1">
                                                                        {{ $result }}
                                                                    </span>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <small>{{ $game->awayTeam->name }}</small>
                                                            <div class="d-flex mt-2">
                                                                @foreach (['L', 'W', 'D', 'L', 'W'] as $result)
                                                                    <span
                                                                        class="badge bg-{{ $result == 'W' ? 'success' : ($result == 'L' ? 'danger' : 'warning') }} mx-1">
                                                                        {{ $result }}
                                                                    </span>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @if ($game->description)
                                                <div class="card border-0 shadow-sm">
                                                    <div class="card-body">
                                                        <h6 class="card-title text-primary">
                                                            <i class="bi bi-card-text me-2"></i>Match Preview
                                                        </h6>
                                                        <p>{{ $game->description }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="#" class="btn btn-primary">Buy Tickets</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center py-4">
                            <i class="bi bi-info-circle-fill fs-3 mb-3"></i>
                            <h4>No upcoming games</h4>
                            <p class="mb-0">Check back later for scheduled matches</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <style>
        .game-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .game-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
