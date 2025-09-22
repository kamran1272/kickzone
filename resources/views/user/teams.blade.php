@extends('layouts.app')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold mb-3">Our Teams</h1>
                <p class="lead text-muted">Discover all the teams in our league</p>
            </div>

            <div class="row g-4">
                @forelse($teams as $team)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-danger text-white">
                                <h5 class="mb-0">{{ $team->name }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-people-fill fs-4 text-danger me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Players</h6>
                                        <p class="mb-0">{{ $team->players_count ?? $team->players->count() }} members</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-person-badge fs-4 text-danger me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Coach</h6>
                                        <p class="mb-0">{{ $team->coach->name ?? 'No coach assigned' }}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-trophy fs-4 text-danger me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Ranking</h6>
                                        <p class="mb-0">{{ $team->ranking ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <button class="btn btn-outline-danger w-100" data-bs-toggle="modal"
                                    data-bs-target="#teamModal{{ $team->id }}">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Team Modal -->
                    <div class="modal fade" id="teamModal{{ $team->id }}" tabindex="-1"
                        aria-labelledby="teamModalLabel{{ $team->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="teamModalLabel{{ $team->id }}">
                                        {{ $team->name }} - Team Profile
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4 text-center mb-4 mb-md-0">
                                            <img src="{{ $team->logo_url ?? asset('images/default-team.png') }}"
                                                alt="{{ $team->name }}" class="img-fluid rounded-circle mb-3 team-logo">
                                            <h4>{{ $team->name }}</h4>
                                            <p class="text-muted">Est. {{ $team->founded_year ?? 'N/A' }}</p>

                                            @if ($team->players->count() > 0)
                                                <div class="mt-3">
                                                    <h6>Key Players:</h6>
                                                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                                                        @foreach ($team->players->take(3) as $player)
                                                            <span class="badge bg-danger bg-opacity-10 text-danger">
                                                                {{ $player->name }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="card border-0 shadow-sm h-100">
                                                        <div class="card-body">
                                                            <h6 class="card-title text-danger">
                                                                <i class="bi bi-info-circle me-2"></i>Team Info
                                                            </h6>
                                                            <ul class="list-unstyled">
                                                                <li class="mb-2"><strong>Coach:</strong>
                                                                    {{ $team->coach->name ?? 'N/A' }}</li>
                                                                <li class="mb-2"><strong>Founded:</strong>
                                                                    {{ $team->founded_year ?? 'N/A' }}</li>
                                                                <li class="mb-2"><strong>Home Ground:</strong>
                                                                    {{ $team->home_ground ?? 'N/A' }}</li>
                                                                <li><strong>Ranking:</strong> {{ $team->ranking ?? 'N/A' }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card border-0 shadow-sm h-100">
                                                        <div class="card-body">
                                                            <h6 class="card-title text-danger">
                                                                <i class="bi bi-people me-2"></i>Team Stats
                                                            </h6>
                                                            <ul class="list-unstyled">
                                                                <li class="mb-2"><strong>Players:</strong>
                                                                    {{ $team->players->count() }}</li>
                                                                <li class="mb-2"><strong>Wins:</strong>
                                                                    {{ $team->wins ?? 0 }}</li>
                                                                <li class="mb-2"><strong>Losses:</strong>
                                                                    {{ $team->losses ?? 0 }}</li>
                                                                <li><strong>Win Rate:</strong> {{ $team->win_rate ?? 0 }}%
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="card border-0 shadow-sm">
                                                        <div class="card-body">
                                                            <h6 class="card-title text-danger">
                                                                <i class="bi bi-card-text me-2"></i>About
                                                            </h6>
                                                            <p>{{ $team->description ?? 'No description available.' }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($team->players->count() > 0)
                                                    <div class="col-12">
                                                        <div class="card border-0 shadow-sm">
                                                            <div class="card-body">
                                                                <h6 class="card-title text-danger mb-3">
                                                                    <i class="bi bi-people-fill me-2"></i>Team Roster
                                                                </h6>
                                                                <div class="table-responsive">
                                                                    <table class="table table-sm table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Name</th>
                                                                                <th>Position</th>
                                                                                <th>Age</th>
                                                                                <th>Jersey</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($team->players as $player)
                                                                                <tr>
                                                                                    <td>{{ $player->name }}</td>
                                                                                    <td>{{ $player->position }}</td>
                                                                                    <td>{{ $player->age }}</td>
                                                                                    <td>{{ $player->jersey_number ?? '-' }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
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
                                    <a href="#" class="btn btn-danger">
                                        View Schedule
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center py-4">
                            <i class="bi bi-info-circle-fill fs-3 mb-3"></i>
                            <h4>No teams found</h4>
                            <p class="mb-0">Check back later for team information</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <style>
        .team-logo {
            width: 200px;
            height: 200px;
            object-fit: contain;
            border: 3px solid var(--bs-danger);
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .modal-table th {
            background-color: var(--bs-danger);
            color: white;
        }
    </style>
@endsection
