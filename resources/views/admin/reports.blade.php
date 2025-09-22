@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">Reports & Analytics</h2>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#generateReportModal">
                <i class="bi bi-file-earmark-bar-graph me-1"></i> Generate New Report
            </button>
        </div>

        <div class="row">
            <!-- Overview Stats -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-lg rounded-4 border-0 overflow-hidden">
                    <div class="card-header bg-info text-white py-3">
                        <h5 class="mb-0 fw-semibold">Total Registrations</h5>
                    </div>
                    <div class="card-body text-center">
                        <h2 class="fw-bold text-info">1,230</h2>
                        <p class="text-muted">Total registrations this year</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-lg rounded-4 border-0 overflow-hidden">
                    <div class="card-header bg-success text-white py-3">
                        <h5 class="mb-0 fw-semibold">Total Events</h5>
                    </div>
                    <div class="card-body text-center">
                        <h2 class="fw-bold text-success">56</h2>
                        <p class="text-muted">Total events conducted</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-lg rounded-4 border-0 overflow-hidden">
                    <div class="card-header bg-warning text-dark py-3">
                        <h5 class="mb-0 fw-semibold">Active Players</h5>
                    </div>
                    <div class="card-body text-center">
                        <h2 class="fw-bold text-warning">879</h2>
                        <p class="text-muted">Currently active players</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-lg rounded-4 border-0 overflow-hidden">
                    <div class="card-header bg-danger text-white py-3">
                        <h5 class="mb-0 fw-semibold">Pending Registrations</h5>
                    </div>
                    <div class="card-body text-center">
                        <h2 class="fw-bold text-danger">12</h2>
                        <p class="text-muted">Registrations pending</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Reports Table -->
            <div class="col-12 mb-4">
                <div class="card shadow rounded-4">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-graph-up-arrow me-2"></i>Generated Reports
                        </h5>
                        <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal"
                            data-bs-target="#generateReportModal">
                            <i class="bi bi-plus-circle me-1"></i> Generate New
                        </button>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-dark text-nowrap">
                                    <tr>
                                        <th>#</th>
                                        <th>Report Title</th>
                                        <th>Generated On</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($reports as $report)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="fw-semibold">
                                                <i
                                                    class="bi bi-file-earmark-text me-1 text-primary"></i>{{ $report->title }}
                                            </td>
                                            <td>{{ $report->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $report->status === 'completed' ? 'success' : 'warning' }}">
                                                    <i
                                                        class="bi bi-{{ $report->status === 'completed' ? 'check-circle' : 'hourglass-split' }} me-1"></i>
                                                    {{ ucfirst($report->status) }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <!-- View Report Button -->
                                                <button class="btn btn-outline-info btn-sm me-1" data-bs-toggle="modal"
                                                    data-bs-target="#viewReportModal{{ $report->id }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>

                                                <!-- Delete Report Button -->
                                                <form action="{{ route('admin.reports.destroy', $report->id) }}"
                                                    method="POST" class="d-inline delete-report-form"
                                                    id="delete-form-{{ $report->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm delete-btn"
                                                        data-id="{{ $report->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- View Report Modal -->
                                        @foreach ($reports as $report)
                                            <div class="modal fade" id="viewReportModal{{ $report->id }}" tabindex="-1"
                                                aria-labelledby="viewReportModalLabel{{ $report->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content shadow-lg">
                                                        <div class="modal-header bg-dark text-white">
                                                            <h5 class="modal-title"
                                                                id="viewReportModalLabel{{ $report->id }}">
                                                                <i class="bi bi-file-earmark-text me-2"></i>View Report:
                                                                {{ $report->title }}
                                                            </h5>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Type:</strong> {{ ucfirst($report->type) }}</p>
                                                            <p><strong>Generated On:</strong>
                                                                {{ $report->created_at->format('d M, Y') }}</p>
                                                            <p><strong>Status:</strong>
                                                                <span
                                                                    class="badge bg-{{ $report->status == 'completed' ? 'success' : 'warning' }}">
                                                                    {{ ucfirst($report->status) }}
                                                                </span>
                                                            </p>
                                                            <p><strong>Details:</strong> {{ $report->details }}</p>

                                                            @if ($report->file)
                                                                <p><strong>Attached File:</strong>
                                                                    <a href="{{ asset('storage/' . $report->file) }}"
                                                                        target="_blank" class="text-decoration-underline">
                                                                        <i class="bi bi-download me-1"></i>Download
                                                                    </a>
                                                                </p>
                                                            @endif

                                                            <div class="mt-3">
                                                                <h6>Notifications:</h6>
                                                                <ul class="list-unstyled mb-0">
                                                                    @if ($report->notify)
                                                                        <li><i
                                                                                class="bi bi-bell-fill text-warning me-1"></i>General
                                                                            Notification Enabled</li>
                                                                    @endif
                                                                    @if ($report->email)
                                                                        <li><i
                                                                                class="bi bi-envelope-fill text-primary me-1"></i>Email
                                                                            Sent</li>
                                                                    @endif
                                                                    @if ($report->sms)
                                                                        <li><i
                                                                                class="bi bi-chat-dots-fill text-success me-1"></i>SMS
                                                                            Sent</li>
                                                                    @endif
                                                                    @if ($report->push)
                                                                        <li><i
                                                                                class="bi bi-phone-fill text-info me-1"></i>Push
                                                                            Notification Sent</li>
                                                                    @endif
                                                                    @if ($report->webhook)
                                                                        <li><i
                                                                                class="bi bi-diagram-3-fill text-danger me-1"></i>Webhook
                                                                            Triggered</li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bi bi-x-circle me-1"></i> Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">
                                                <i class="bi bi-inbox text-secondary fs-4 d-block mb-2"></i>
                                                No reports found.
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


        <!-- Modal to Generate New Report -->
        <div class="modal fade" id="generateReportModal" tabindex="-1" aria-labelledby="generateReportModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content shadow-lg">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="generateReportModalLabel"><i
                                class="bi bi-file-earmark-bar-graph me-2"></i>Generate New Report</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.reports.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="reportTitle" class="form-label">Report Title</label>
                                <input type="text" class="form-control" id="reportTitle" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="reportType" class="form-label">Report Type</label>
                                <select class="form-select" id="reportType" name="type" required>
                                    <option value="" disabled selected>Select report type</option>
                                    <option value="summary">Summary</option>
                                    <option value="detailed">Detailed</option>
                                    <option value="custom">Custom</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="reportDetails" class="form-label">Report Details</label>
                                <textarea class="form-control" id="reportDetails" name="details" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="reportStatus" class="form-label">Report Status</label>
                                <select class="form-select" id="reportStatus" name="status" required>
                                    <option value="" disabled selected>Select report status</option>
                                    <option value="completed">Completed</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="reportDate" class="form-label">Report Date</label>
                                <input type="date" class="form-control" id="reportDate" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="reportTime" class="form-label">Report Time</label>
                                <input type="time" class="form-control" id="reportTime" name="time" required>
                            </div>
                            <div class="mb-3">
                                <label for="reportFile" class="form-label">Upload File</label>
                                <input type="file" class="form-control" id="reportFile" name="file"
                                    accept=".pdf,.docx">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="reportNotify" name="notify">
                                <label class="form-check-label" for="reportNotify">Notify me when the report is
                                    ready</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="reportEmail" name="email">
                                <label class="form-check-label" for="reportEmail">Send report to my email</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="reportSMS" name="sms">
                                <label class="form-check-label" for="reportSMS">Send report via SMS</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="reportPush" name="push">
                                <label class="form-check-label" for="reportPush">Send report via Push Notification</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="reportWebhook" name="webhook">
                                <label class="form-check-label" for="reportWebhook">Send report via Webhook</label>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="bi bi-file-earmark-plus me-1"></i>
                                Generate
                                Report</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const reportId = this.getAttribute('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + reportId).submit();
                }
            });
        });
    });
    // SweetAlert for success messages
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
