@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">Match Results</h2>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMatchResultModal">
                <i class="bi bi-plus-circle me-1"></i> Add Result
            </button>
        </div>

        <div class="card shadow-lg rounded-4 border-0">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-trophy-fill me-2"></i>All Match Results</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark text-nowrap">
                            <tr>
                                <th>#</th>
                                <th>Match</th>
                                <th>Date</th>
                                <th>Winner</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($results as $result)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $result->match_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($result->date)->format('d M, Y') }}</td>
                                    <td><span class="fw-semibold text-success">{{ $result->winner }}</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#viewResultModal{{ $result->id }}">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <form action="{{ route('admin.results.destroy', $result->id) }}" method="POST"
                                            class="d-inline delete-form" id="delete-form-{{ $result->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm delete-btn"
                                                data-id="{{ $result->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- View Result Modal -->
                                <div class="modal fade" id="viewResultModal{{ $result->id }}" tabindex="-1"
                                    aria-labelledby="viewResultModalLabel{{ $result->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content shadow-lg">
                                            <div class="modal-header bg-dark text-white">
                                                <h5 class="modal-title" id="viewResultModalLabel{{ $result->id }}">
                                                    <i class="bi bi-eye me-2"></i>Match Result: {{ $result->match_name }}
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Date:</strong>
                                                    {{ \Carbon\Carbon::parse($result->date)->format('d M, Y') }}</p>
                                                <p><strong>Winner:</strong> {{ $result->winner }}</p>
                                                <p><strong>Details:</strong> {{ $result->details }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    <i class="bi bi-x-circle me-1"></i> Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        <i class="bi bi-inbox text-secondary fs-4 d-block mb-2"></i>
                                        No match results found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Match Result Modal -->
        <div class="modal fade" id="addMatchResultModal" tabindex="-1" aria-labelledby="addMatchResultModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content shadow-lg">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="addMatchResultModalLabel">
                            <i class="bi bi-plus-circle me-2"></i>Add Match Result
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.results.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="matchName" class="form-label">Match Name</label>
                                <input type="text" class="form-control" id="matchName" name="match_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="matchDate" class="form-label">Date</label>
                                <input type="date" class="form-control" id="matchDate" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="winner" class="form-label">Winner</label>
                                <input type="text" class="form-control" id="winner" name="winner" required>
                            </div>
                            <div class="mb-3">
                                <label for="details" class="form-label">Details</label>
                                <textarea class="form-control" id="details" name="details" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>
                                Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            });
        });

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        @endif
    </script>
@endpush
