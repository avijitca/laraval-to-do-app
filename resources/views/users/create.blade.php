@extends('layouts.app')

@section('title', 'Create User')

@section('content')
<br />
<div class="col-sm-12">
    <h4>Add a new User</h4>
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
    <form name="crud_form" method="post" action="{{ route('users.store') }}">
    @csrf
    <table class="table">
        <tr>
            <td><b>Name:</b></td>
            <td><input type="text" name="name" class="form-control"></td>
        </tr>
        <tr>
            <td><b>Email:</b></td>
            <td><input type="text" name="email" class="form-control"></td>
        </tr>
        <tr>
            <td><b>Password:</b></td>
            <td><input type="password" name="password" class="form-control"></td>
        </tr>
        <tr>
            <td><b>Confirm Password:</b></td>
            <td><input type="password" name="password_confirmation" class="form-control"></td>
        </tr>
        <tr><td></td><td><input type="submit" name="submit" class="btn btn-dark form-control" /></td></tr>
    </table>
    </form>
</div>


@endsection

