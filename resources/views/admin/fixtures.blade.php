@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="mb-0 fw-bold">Fixtures Management</h2>
                            <div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createFixtureModal">
                                    <i class="bi bi-plus-circle me-1"></i> Create New Fixture
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Filter Section -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <select class="form-select" id="sportFilter">
                                    <option value="">All Sports</option>
                                    <option value="football">Football</option>
                                    <option value="basketball">Basketball</option>
                                    <option value="tennis">Tennis</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="statusFilter">
                                    <option value="">All Statuses</option>
                                    <option value="upcoming">Upcoming</option>
                                    <option value="ongoing">Ongoing</option>
                                    <option value="completed">Completed</option>
                                    <option value="postponed">Postponed</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" id="dateFilter" placeholder="Filter by date">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-outline-secondary w-100" id="resetFilters">
                                    <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                                </button>
                            </div>
                        </div>

                        <!-- Fixtures Table -->
                        <div class="table-responsive">
                            <table class="table table-hover align-middle" id="fixturesTable">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="rounded-start">Match</th>
                                        <th>League/Tournament</th>
                                        <th>Date & Time</th>
                                        <th>Venue</th>
                                        <th>Status</th>
                                        <th class="rounded-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($fixtures as $fixture)
                                        <tr class="border-bottom">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm me-3 text-center">
                                                        <img src="{{ $fixture->team1->logo_url ?? 'https://via.placeholder.com/30' }}"
                                                            alt="{{ $fixture->team1->name }}"
                                                            class="avatar-xs rounded-circle">
                                                        <div class="text-xs mt-1">
                                                            {{ $fixture->team1->short_name ?? $fixture->team1->name }}</div>
                                                    </div>
                                                    <div class="text-center mx-2 fw-bold text-primary">vs</div>
                                                    <div class="avatar-sm text-center">
                                                        <img src="{{ $fixture->team2->logo_url ?? 'https://via.placeholder.com/30' }}"
                                                            alt="{{ $fixture->team2->name }}"
                                                            class="avatar-xs rounded-circle">
                                                        <div class="text-xs mt-1">
                                                            {{ $fixture->team2->short_name ?? $fixture->team2->name }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-primary bg-opacity-10 text-primary">
                                                    {{ $fixture->league->name ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="fw-medium">{{ $fixture->date->format('d M, Y') }}</div>
                                                <small class="text-muted">
                                                    <i class="bi bi-clock me-1"></i>{{ $fixture->time->format('h:i A') }}
                                                </small>
                                            </td>
                                            <td>
                                                <span class="d-inline-block text-truncate" style="max-width: 150px;">
                                                    {{ $fixture->venue->name ?? 'TBD' }}
                                                </span>
                                            </td>
                                            <td>
                                                @if ($fixture->status == 'upcoming')
                                                    <span class="badge bg-info bg-opacity-10 text-info">
                                                        <i class="bi bi-calendar-check me-1"></i> Upcoming
                                                    </span>
                                                @elseif($fixture->status == 'ongoing')
                                                    <span class="badge bg-warning bg-opacity-10 text-warning">
                                                        <i class="bi bi-activity me-1"></i> Ongoing
                                                    </span>
                                                @elseif($fixture->status == 'completed')
                                                    <span class="badge bg-success bg-opacity-10 text-success">
                                                        <i class="bi bi-check-circle me-1"></i> Completed
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger bg-opacity-10 text-danger">
                                                        <i class="bi bi-exclamation-triangle me-1"></i> Postponed
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                        type="button" id="actionDropdown{{ $fixture->id }}"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <ul class="dropdown-menu"
                                                        aria-labelledby="actionDropdown{{ $fixture->id }}">
                                                        <li>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                                data-bs-target="#editFixtureModal"
                                                                data-id="{{ $fixture->id }}">
                                                                <i class="bi bi-pencil-square me-2"></i>Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                                data-bs-target="#updateScoreModal"
                                                                data-id="{{ $fixture->id }}">
                                                                <i class="bi bi-clipboard-data me-2"></i>Update Score
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-danger" href="#"
                                                                onclick="confirmDelete({{ $fixture->id }})">
                                                                <i class="bi bi-trash me-2"></i>Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-5">
                                                <i class="bi bi-calendar-event text-muted fs-1"></i>
                                                <p class="text-muted mt-3 mb-0">No fixtures found</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Fixture Modal -->
    <div class="modal fade" id="createFixtureModal" tabindex="-1" aria-labelledby="createFixtureModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createFixtureModalLabel">Create New Fixture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.fixtures.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="sport_id" class="form-label">Sport</label>
                                <select class="form-select" id="sport_id" name="sport_id" required>
                                    <option value="">Select Sport</option>
                                    @foreach ($sports as $sport)
                                        <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="league_id" class="form-label">League/Tournament</label>
                                <select class="form-select" id="league_id" name="league_id" required>
                                    <option value="">Select League</option>
                                    {{-- @foreach ($leagues as $league)
                                        <option value="{{ $league->id }}">{{ $league->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="team1_id" class="form-label">Home Team</label>
                                <select class="form-select" id="team1_id" name="team1_id" required>
                                    <option value="">Select Team</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="team2_id" class="form-label">Away Team</label>
                                <select class="form-select" id="team2_id" name="team2_id" required>
                                    <option value="">Select Team</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="time" class="form-label">Time</label>
                                <input type="time" class="form-control" id="time" name="time" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="venue_id" class="form-label">Venue</label>
                                <select class="form-select" id="venue_id" name="venue_id">
                                    <option value="">Select Venue</option>
                                    {{-- @foreach ($venues as $venue)
                                        <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="upcoming" selected>Upcoming</option>
                                    <option value="ongoing">Ongoing</option>
                                    <option value="postponed">Postponed</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Additional Notes</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Fixture</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Fixture Modal (Content loaded via AJAX) -->
    <div class="modal fade" id="editFixtureModal" tabindex="-1" aria-labelledby="editFixtureModalLabel"
        aria-hidden="true">
        <!-- Modal content will be loaded dynamically via AJAX -->
    </div>

    <!-- Update Score Modal (Content loaded via AJAX) -->
    <div class="modal fade" id="updateScoreModal" tabindex="-1" aria-labelledby="updateScoreModalLabel"
        aria-hidden="true">
        <!-- Modal content will be loaded dynamically via AJAX -->
    </div>
@endsection

@section('scripts')
    <script>
        // Initialize DataTable with filters
        $(document).ready(function() {
                    // Filter functionality
                    $('#sportFilter, #statusFilter, #dateFilter').change(function() {
                        filterFixtures();
                    });

                    $('#resetFilters').click(function() {
                        $('#sportFilter, #statusFilter').val('');
                        $('#dateFilter').val('');
                        filterFixtures();
                    });

                    function filterFixtures() {
                        const sport = $('#sportFilter').val();
                        const status = $('#statusFilter').val();
                        const date = $('#dateFilter').val();

                        // This would typically be an AJAX call to filter server-side
                        // For demo, we're just showing/hiding rows client-side
                        $('#fixturesTable tbody tr').each(function() {
                                const rowSport = $(this).find('td:eq(1)').text().toLowerCase();
                                const rowStatus = $(this).find('td:eq(4) span').text().toLowerCase();
                                const rowDate = $(this).find('td:eq(2) div:first').text();

                                const sportMatch = !sport || rowSport.includes(sport);
                                const statusMatch = !status || rowStatus.includes(status);
                                const dateMatch = !date || rowDate.includes(new Date(date).toLocaleDateString('en-US', {
                                        day: 'numeric',
                                        month: 'short',
                                        year: 'numeric'
                                    }).replace(',', '');

                                    $(this).toggle(sportMatch && statusMatch && dateMatch);
                                });
                        }

                        // Load edit modal via AJAX
                        $('#editFixtureModal').on('show.bs.modal', function(event) {
                            const button = $(event.relatedTarget);
                            const fixtureId = button.data('id');
                            const modal = $(this);

                            $.get(`/admin/fixtures/${fixtureId}/edit`, function(data) {
                                modal.html(data);
                            });
                        });

                        // Load score update modal via AJAX
                        $('#updateScoreModal').on('show.bs.modal', function(event) {
                            const button = $(event.relatedTarget);
                            const fixtureId = button.data('id');
                            const modal = $(this);

                            $.get(`/admin/fixtures/${fixtureId}/score`, function(data) {
                                modal.html(data);
                            });
                        });
                    });

                function confirmDelete(id) {
                    if (confirm('Are you sure you want to delete this fixture?')) {
                        $.ajax({
                            url: `/admin/fixtures/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(result) {
                                location.reload();
                            }
                        });
                    }
                }
    </script>
@endsection

@section('styles')
    <style>
        .avatar-sm {
            width: 50px;
        }

        .avatar-xs {
            width: 30px;
            height: 30px;
            object-fit: cover;
        }

        .calendar-container {
            height: 300px;
            background: #f8f9fa;
            border-radius: 0.375rem;
            padding: 1rem;
        }

        .table th {
            white-space: nowrap;
        }

        .badge {
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 500;
        }
    </style>
@endsection
