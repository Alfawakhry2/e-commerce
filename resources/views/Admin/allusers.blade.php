@extends('Admin.layout')

@section('body')

<div class="container mt-5">
    <h2 class="text-center mb-4">All Users</h2>

    <table class="table table-striped  shadow-sm rounded bg-white">
        <thead class="table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @if (isset($users))

            @foreach($users as $user)
            <tr>
                <td>{{$loop->iteration }}</td>
                <td>{{$user->name }}</td>
                @if ($user->role == 1)
                <td>Admin</td>
                @else
                <td>User</td>
                @endif
                <td>{{$user->email }}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route("showuser" , $user->id) }}" class="btn btn-lg btn-primary">View</a>
                        {{-- <a href="#" class="btn btn-sm btn-warning">Edit</a>
                        <form action="#" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

    @endsection

