@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
<br />
<div class="col-sm-12">
    <h4>Update Task</h4>
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
    <form name="crud_form" method="post" action="{{ route('tasks.update',$task) }}">
    @csrf
    @method('PUT')
    <table class="table">
        <tr>
            <td><b>Title:</b></td>
            <td><input type="text" name="title" class="form-control" value="{{$task->title}}"></td>
        </tr>
        <tr>
            <td><b>Description:</b></td>
            <td><textarea rows="5" name="description" cols="10" class="form-control">{{$task->description}}</textarea></td>
        </tr>
        <tr>
            <td><b>Start Date:</b></td>
            <td><input type="date" name="start_date" class="form-control" value="{{$task->start_date}}"></td>
        </tr>
        <tr>
            <td><b>End Date:</b></td>
            <td><input type="date" name="end_date" class="form-control" value="{{$task->end_date}}"></td>
        </tr>
        <tr>
            <td><b>Status:</b></td>
            <td>
            <select name="status" id="status" class="form-control" required>
                <option value="Pending" {{$task->status==='Pending' ? 'selected':''}}>Pending</option>
                <option value="In Progress" {{$task->status==='In Progress' ? 'selected':''}}>In Progress</option>
                <option value="Completed" {{$task->status==='Completed' ? 'selected':''}}>Completed</option>
            </select>
            </td>
        </tr>
        <tr><td></td><td><input type="submit" name="submit" value="Update Task" class="btn btn-dark form-control" /></td></tr>
    </table>
    </form>
</div>


@endsection