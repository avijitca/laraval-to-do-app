@extends('layouts.app')

@section('content')
<div class="container">
    <h3>All Tasks</h3>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-end">
        <a href="{{ route('tasks.create') }}" class="btn btn-dark">Add Task</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th style="text-align:left;">Task Title</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Created By</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td style="text-align:left;">{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->start_date }}</td>
                    <td>{{ $task->end_date }}</td>
                    <td>{{ $task->created_by }}</td>
                    <td>{{ $task->status }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-default btn-sm">
                            <button class="bi bi-pencil"></button>
                        </a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline-block;">
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
    {{ $tasks->links() }}
    </div>
    

</div>
@endsection
