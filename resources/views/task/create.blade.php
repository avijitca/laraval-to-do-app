@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
<br />
<div class="col-sm-12">
    <h4>Add a new Task</h4>
    @if ($errors->any())
    <div class="alert alert-danger">
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    <form name="crud_form" method="post" action="{{ route('tasks.store') }}">
    @csrf
    <table class="table">
        <tr>
            <td><b>Title:</b></td>
            <td><input type="text" name="title" class="form-control"></td>
        </tr>
        <tr>
            <td><b>Description:</b></td>
            <td><textarea rows="5" name="description" cols="10" class="form-control"></textarea></td>
        </tr>
        <tr>
            <td><b>Start Date:</b></td>
            <td><input type="date" name="start_date" class="form-control"></td>
        </tr>
        <tr>
            <td><b>End Date:</b></td>
            <td><input type="date" name="end_date" class="form-control"></td>
        </tr>
        <tr>
            <td><b>Status:</b></td>
            <td>
            <select name="status" id="status" class="form-control" required>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
            </td>
        </tr>
        <tr><td></td><td><input type="submit" name="submit" value="Save Task" class="btn btn-dark form-control" /></td></tr>
    </table>
    </form>
</div>


@endsection