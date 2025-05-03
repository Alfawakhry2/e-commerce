@extends('Admin.layout')

@section('body')

<div class="container mt-5">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="card-header bg-black text-white text-center py-4">
            <h2 class="mb-0 fw-bold">👤 User Profile</h2>
        </div>

        <div class="row g-0">
            <!-- Left: User Info -->
            <div class="col-md-8 px-5 py-4 bg-white">
                <div class="mb-3">
                    <span class="fw-semibold text-dark">🆔 ID:</span>
                    <span class="text-muted ms-2">{{ $user->id }}</span>
                </div>

                <div class="mb-3">
                    <span class="fw-semibold text-dark">🧑 Name:</span>
                    <span class="text-muted ms-2">{{ $user->name }}</span>
                </div>

                <div class="mb-3">
                    <span class="fw-semibold text-dark">📧 Email:</span>
                    <span class="text-muted ms-2">{{ $user->email }}</span>
                </div>

                <div class="mb-3">
                    <span class="fw-semibold text-dark">📅 Created At:</span>
                    <span class="text-muted ms-2">{{ $user->created_at->format('d M Y - h:i A') }}</span>
                </div>

                <div>
                    <span class="fw-semibold text-dark">♻️ Updated At:</span>
                    <span class="text-muted ms-2">{{ $user->updated_at->format('d M Y - h:i A') }}</span>
                </div>
            </div>

            <!-- Right: Image -->
            <div class="col-md-4 d-flex align-items-center justify-content-center bg-light">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&size=200"
                     alt="User Avatar" class="rounded-circle shadow" style="width: 150px; height: 150px;">
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between bg-light px-4 py-3">
            <a href="{{ url('allusers') }}" class="btn btn-outline-secondary rounded-pill px-4">
                ⬅️ Back
            </a>
            <a href="#" class="btn btn-outline-warning rounded-pill px-4">
                ✏️ Edit
            </a>
        </div>
    </div>
</div>

@endsection
