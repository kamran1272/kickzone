@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">Player Registrations</h2>
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addRegistrationModal">
                <i class="bi bi-person-plus-fill me-1"></i> Add New Registration
            </button>
        </div>

        <!-- Registration Table -->
        <div class="card shadow rounded-4 mb-4">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-person-lines-fill me-2"></i>Registrations</h5>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Player Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Sport</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($registrations as $registration)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $registration->player_name }}</td>
                                    <td>{{ $registration->email }}</td>
                                    <td>{{ $registration->sport }}</td>
                                    <td class="text-center">
                                        <!-- Edit Button -->
                                        <button class="btn btn-outline-warning btn-sm me-1" data-bs-toggle="modal"
                                            data-bs-target="#editRegistrationModal{{ $registration->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.registrations.destroy', $registration->id) }}"
                                            method="POST" class="d-inline delete-registration-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm delete-btn">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">No registrations found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Registration Modal -->
        <div class="modal fade" id="addRegistrationModal" tabindex="-1" aria-labelledby="addRegistrationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content shadow-lg">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="addRegistrationModalLabel"><i
                                class="bi bi-person-plus-fill me-2"></i>Add New Registration</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.registrations.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Player Name</label>
                                <input type="text" name="player_name" class="form-control"
                                    placeholder="Enter player's name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter player's email"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sport</label>
                                <input type="text" name="sport" class="form-control" placeholder="Enter the sport"
                                    required>
                            </div>
                            <div class="modal-footer justify-content-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="bi bi-x-circle me-1"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-2"></i> Save Registration
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Registration Modal -->
        @foreach ($registrations as $registration)
            <div class="modal fade" id="editRegistrationModal{{ $registration->id }}" tabindex="-1"
                aria-labelledby="editRegistrationModalLabel{{ $registration->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content border-0 shadow">
                        <div class="modal-header bg-warning text-white">
                            <h5 class="modal-title" id="editRegistrationModalLabel{{ $registration->id }}">
                                <i class="bi bi-pencil-square me-2"></i>Edit Registration
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="{{ route('admin.registrations.update', $registration->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Player Name</label>
                                    <input type="text" name="player_name" class="form-control"
                                        value="{{ $registration->player_name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $registration->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sport</label>
                                    <input type="text" name="sport" class="form-control"
                                        value="{{ $registration->sport }}" required>
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

    </div>
@endsection

<script>
    // Delete Button functionality with SweetAlert
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default button behavior
            const form = this.closest('.delete-registration-form'); // Get the closest form

            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if the user confirms
                }
            });
        });
    });

    // SweetAlert for success after adding or updating a registration
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
    @endif
</script>
