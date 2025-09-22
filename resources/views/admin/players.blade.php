@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">Manage Players</h2>
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addPlayerModal">
                <i class="bi bi-plus-circle me-1"></i>Add Player
            </button>
        </div>
        <div class="card shadow rounded-4 mb-4">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-people-fill me-2"></i>Players</h5>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Jersey #</th>
                                <th scope="col">Age</th>
                                <th scope="col">Position</th>
                                <th scope="col">Team</th>
                                <th scope="col">Nationality</th>
                                <th scope="col">Height</th>
                                <th scope="col">Weight</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($players as $player)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($player->photo_url)
                                            <img src="{{ asset('storage/' . $player->photo_url) }}" alt="Photo"
                                                width="40" height="40" class="rounded-circle">
                                        @else
                                            <img src="{{ asset('images/default-avatar.png') }}" alt="Photo"
                                                width="40" height="40" class="rounded-circle">
                                        @endif
                                    </td>
                                    <td>{{ $player->name }}</td>
                                    <td>{{ $player->jersey_number }}</td>
                                    <td>{{ $player->age }}</td>
                                    <td>{{ $player->position }}</td>
                                    <td>{{ $player->team->name ?? 'N/A' }}</td>
                                    <td>{{ $player->nationality }}</td>
                                    <td>{{ $player->height }}</td>
                                    <td>{{ $player->weight }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-warning btn-sm me-1" title="Edit Player"
                                            data-bs-toggle="modal" data-bs-target="#editPlayerModal{{ $player->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <form action="{{ route('admin.players.destroy', $player->id) }}" method="POST"
                                            class="d-inline delete-player-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm delete-btn"
                                                title="Delete Player">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center text-muted py-4">No players found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Player Modal -->
    <div class="modal fade" id="addPlayerModal" tabindex="-1" aria-labelledby="addPlayerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content shadow-lg">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="addPlayerModalLabel"><i class="bi bi-person-plus-fill me-2"></i>Add New
                        Player</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.players.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" name="name" class="form-control" placeholder="Enter player name"
                                    required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jersey Number</label>
                            <input type="number" name="jersey_number" class="form-control" placeholder="Jersey #"
                                min="0">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Age</label>
                            <input type="number" name="age" class="form-control" placeholder="Enter player age"
                                min="1" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Position</label>
                            <input type="text" name="position" class="form-control" placeholder="Enter player position"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Team</label>
                            <select name="team_id" class="form-select">
                                <option value="">-- Select Team --</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nationality</label>
                            <input type="text" name="nationality" class="form-control" placeholder="Nationality">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Height</label>
                            <input type="text" name="height" class="form-control" placeholder="Height (e.g. 6ft)">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Weight</label>
                            <input type="text" name="weight" class="form-control" placeholder="Weight (e.g. 75kg)">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" name="photo_url" class="form-control" accept="image/*">
                        </div>
                        <div class="modal-footer justify-content-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle me-1"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-2"></i> Save Player
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Player Modals -->
    @foreach ($players as $player)
        <div class="modal fade" id="editPlayerModal{{ $player->id }}" tabindex="-1"
            aria-labelledby="editPlayerModalLabel{{ $player->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-warning text-white">
                        <h5 class="modal-title" id="editPlayerModalLabel{{ $player->id }}">
                            <i class="bi bi-pencil-square me-2"></i>Edit Player
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('admin.players.update', $player->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $player->name }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jersey Number</label>
                                <input type="number" name="jersey_number" class="form-control"
                                    value="{{ $player->jersey_number }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Age</label>
                                <input type="number" name="age" class="form-control" value="{{ $player->age }}"
                                    min="1" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Position</label>
                                <input type="text" name="position" class="form-control"
                                    value="{{ $player->position }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Team</label>
                                <select name="team_id" class="form-select" required>
                                    <option value="">Select Team</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}"
                                            {{ $player->team_id == $team->id ? 'selected' : '' }}>
                                            {{ $team->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nationality</label>
                                <input type="text" name="nationality" class="form-control"
                                    value="{{ $player->nationality }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Height</label>
                                <input type="text" name="height" class="form-control"
                                    value="{{ $player->height }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Weight</label>
                                <input type="text" name="weight" class="form-control"
                                    value="{{ $player->weight }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Photo</label>
                                <input type="file" name="photo_url" class="form-control" accept="image/*">
                                @if ($player->photo_url)
                                    <img src="{{ asset('storage/' . $player->photo_url) }}" alt="Photo"
                                        width="40" height="40" class="rounded-circle mt-2">
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save me-1"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
