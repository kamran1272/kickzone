@extends('layouts.app')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold mb-3">Our Players</h1>
                <p class="lead text-muted">Meet the talented athletes in our league</p>
            </div>

            <div class="row g-4">
                @forelse($players as $player)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">{{ $player->name }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-person-badge fs-4 text-primary me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Position</h6>
                                        <p class="mb-0">{{ $player->position }}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-calendar fs-4 text-primary me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Age</h6>
                                        <p class="mb-0">{{ $player->age }} years</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-people fs-4 text-primary me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Team</h6>
                                        <p class="mb-0">{{ $player->team->name ?? 'Free Agent' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <button class="btn btn-outline-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#playerModal{{ $player->id }}">
                                    View Profile
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Player Modal -->
                    <div class="modal fade" id="playerModal{{ $player->id }}" tabindex="-1"
                        aria-labelledby="playerModalLabel{{ $player->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="playerModalLabel{{ $player->id }}">
                                        {{ $player->name }}'s Profile
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4 text-center mb-4 mb-md-0">
                                            <img src="{{ $player->photo_url ?? asset('images/default-player.jpg') }}"
                                                alt="{{ $player->name }}" class="img-fluid rounded-circle mb-3"
                                                style="width: 200px; height: 200px; object-fit: cover;">
                                            <h4 class="mb-1">{{ $player->name }}</h4>
                                            <p class="text-muted">{{ $player->position }}</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="card border-0 shadow-sm h-100">
                                                        <div class="card-body">
                                                            <h6 class="card-title text-primary">
                                                                <i class="bi bi-info-circle me-2"></i>Basic Info
                                                            </h6>
                                                            <ul class="list-unstyled">
                                                                <li class="mb-2"><strong>Age:</strong>
                                                                    {{ $player->age }}</li>
                                                                <li class="mb-2"><strong>Height:</strong>
                                                                    {{ $player->height ?? 'N/A' }}</li>
                                                                <li class="mb-2"><strong>Weight:</strong>
                                                                    {{ $player->weight ?? 'N/A' }}</li>
                                                                <li><strong>Nationality:</strong>
                                                                    {{ $player->nationality ?? 'N/A' }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card border-0 shadow-sm h-100">
                                                        <div class="card-body">
                                                            <h6 class="card-title text-primary">
                                                                <i class="bi bi-trophy me-2"></i>Team Info
                                                            </h6>
                                                            <ul class="list-unstyled">
                                                                <li class="mb-2"><strong>Team:</strong>
                                                                    {{ $player->team->name ?? 'Free Agent' }}</li>
                                                                <li class="mb-2"><strong>Jersey Number:</strong>
                                                                    {{ $player->jersey_number ?? 'N/A' }}</li>
                                                                <li><strong>Joined:</strong>
                                                                    {{ $player->joined_at ? $player->joined_at->format('M Y') : 'N/A' }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="card border-0 shadow-sm">
                                                        <div class="card-body">
                                                            <h6 class="card-title text-primary">
                                                                <i class="bi bi-graph-up me-2"></i>Statistics
                                                            </h6>
                                                            <div class="row text-center">
                                                                <div class="col-4">
                                                                    <h3 class="text-primary">{{ $player->goals ?? 0 }}</h3>
                                                                    <small class="text-muted">Goals</small>
                                                                </div>
                                                                <div class="col-4">
                                                                    <h3 class="text-primary">{{ $player->assists ?? 0 }}
                                                                    </h3>
                                                                    <small class="text-muted">Assists</small>
                                                                </div>
                                                                <div class="col-4">
                                                                    <h3 class="text-primary">{{ $player->matches ?? 0 }}
                                                                    </h3>
                                                                    <small class="text-muted">Matches</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($player->bio)
                                                    <div class="col-12">
                                                        <div class="card border-0 shadow-sm">
                                                            <div class="card-body">
                                                                <h6 class="card-title text-primary">
                                                                    <i class="bi bi-person-lines-fill me-2"></i>Bio
                                                                </h6>
                                                                <p>{{ $player->bio }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center py-4">
                            <i class="bi bi-info-circle-fill fs-3 mb-3"></i>
                            <h4>No players found</h4>
                            <p class="mb-0">Check back later for player information</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <style>
        .player-card {
            transition: all 0.3s ease;
        }

        .player-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .modal-player-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border: 3px solid var(--bs-primary);
        }
    </style>
@endsection
