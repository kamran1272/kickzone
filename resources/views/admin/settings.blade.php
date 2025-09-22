@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">Manage Settings</h2>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editSettingsModal">
                <i class="bi bi-gear-fill me-1"></i> Edit Settings
            </button>
        </div>

        <div class="card shadow rounded-4 mb-4">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-sliders2-vertical me-2"></i> Current Settings</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Site Name:</strong> {{ $settings->site_name ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Admin Email:</strong> {{ $settings->admin_email ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Timezone:</strong> {{ $settings->timezone ?? 'UTC' }}</li>
                    <li class="list-group-item"><strong>Maintenance Mode:</strong>
                        <span class="badge bg-{{ $settings->maintenance_mode ? 'danger' : 'success' }}">
                            {{ $settings->maintenance_mode ? 'Enabled' : 'Disabled' }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Edit Settings Modal -->
        <div class="modal fade" id="editSettingsModal" tabindex="-1" aria-labelledby="editSettingsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content shadow rounded-4">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="editSettingsModalLabel">
                            <i class="bi bi-gear-fill me-2"></i>Edit Settings
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('admin.settings.update', ['id' => $settings->id]) }}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Site Name</label>
                                <input type="text" name="site_name" class="form-control"
                                    value="{{ $settings->site_name ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Admin Email</label>
                                <input type="email" name="admin_email" class="form-control"
                                    value="{{ $settings->admin_email ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Timezone</label>
                                <select name="timezone" class="form-select">
                                    <option value="UTC" {{ $settings->timezone === 'UTC' ? 'selected' : '' }}>UTC
                                    </option>
                                    <option value="Asia/Karachi"
                                        {{ $settings->timezone === 'Asia/Karachi' ? 'selected' : '' }}>Asia/Karachi</option>
                                    <option value="America/New_York"
                                        {{ $settings->timezone === 'America/New_York' ? 'selected' : '' }}>America/New_York
                                    </option>
                                </select>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" name="maintenance_mode"
                                    id="maintenance_mode" {{ $settings->maintenance_mode ? 'checked' : '' }}>
                                <label class="form-check-label" for="maintenance_mode">Enable Maintenance Mode</label>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle me-1"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-2"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
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
@endpush
