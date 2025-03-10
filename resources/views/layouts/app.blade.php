<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <style>
        body {
            height: 40vh; /* Full viewport height */
        }
    </style>
</head>
<body class="bg-light">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-8 text-center">
                <a style="text-decoration: none;" href="{{ route('users.index') }}">
                <h1 class="display-7">TO DO App</h1>
                </a>
                <!-- Nav bar and menu -->
                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e7e7e7;">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('users.index') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Users
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('users.index') }}">All Users</a></li>
                            <li><a class="dropdown-item" href="{{ route('users.create') }}">Add User</a></li>
                        </ul>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tasks
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('tasks.index')}}">All Tasks</a></li>
                            <li><a class="dropdown-item" href="{{route('tasks.create')}}">Add Task</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Add Bulk Task</a></li>
                        </ul>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-outline-danger" type="submit">Logout</button>
                    </form>
                    </div>
                </div>
            </nav>
                <!-- Nav bar and menu Ends-->
                @yield('content')
            </div>
        </div>
    </div>

<!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>