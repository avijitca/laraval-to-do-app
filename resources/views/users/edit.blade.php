@extends('layouts.app')
@section('title', 'Update User')
@section('content')
<br />
<div class="col-sm-12">
    <h4>Update a User</h4>
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
    <form name="crud_form" method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('PUT')
        <table class="table">
            <tr>
                <td><b>Name:</b></td>
                <td><input type="text" name="name" class="form-control" value="{{$user->name}}"></td>
            </tr>
            <tr>
                <td><b>Email:</b></td>
                <td><input type="text" name="email" class="form-control" value="{{$user->email}}"></td>
            </tr>
            <tr><td></td><td><input type="submit" name="submit" class="btn btn-dark form-control" /></td></tr>
        </table>
    </form>
</div>
@endsection
