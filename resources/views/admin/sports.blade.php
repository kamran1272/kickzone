@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <!-- Add Sport Form -->
                <div class="card glass-card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Add New Sport</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.sports.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="sportName" class="form-label">Sport Name</label>
                                <input type="text" id="sportName" name="name" placeholder="Enter Sport Name"
                                    class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-check-circle me-2"></i>Add Sport
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Sports List -->
                <div class="card glass-card">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0"><i class="bi bi-list-ul me-2"></i>Sports List</h4>
                    </div>
                    <div class="card-body">
                        @if ($sports->isEmpty())
                            <p class="text-center text-muted">No sports available. Add a new sport to get started.</p>
                        @else
                            <table class="table table-hover table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Sport Name</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sports as $index => $sport)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $sport->name }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('admin.sports.destroy', $sport) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash-fill"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
