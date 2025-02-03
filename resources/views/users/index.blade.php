@extends('layouts.app')

@section('content')
<div class="container">
    <h3>All Users</h3>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-end">
        <a href="{{ route('users.create') }}" class="btn btn-dark">Add User</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th style="text-align:left;">Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td style="text-align:left;">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-default btn-sm">
                            <button class="bi bi-pencil"></button>
                        </a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="bi bi-trash" onClick="return confirm('Are you sure you want to delete this record?');"></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-links">
    {{ $users->links() }}
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('users.pdf') }}" class="btn btn-dark">Download PDF</a>
        &nbsp;
        <a href="{{ route('users.excel') }}" class="btn btn-dark">Download Excel</a>
    </div>

</div>
@endsection
