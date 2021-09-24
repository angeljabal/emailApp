<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <style>
        .navbar, .btn {
            background-image: linear-gradient(#6a9ce6, #0D6EFD, #0dc5fd);
        }
    </style>
    <title>IPT Systems</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
          <a class="navbar-brand" href="#">IPT Systems</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/dashboard')}}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/logout')}}">Logout</a>
                        </li>
                    @else
                    <li class="nav-item">
                    <a class="nav-link" href="{{url('/register')}}">Register</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{url('/login')}}">Login</a>
                    </li>
                    @endif
            </ul>
          </div>
        </div>
    </nav>
    @if (session('Error'))
        <div class="alert alert-danger">
            <div class="container">
                {{ session('Error') }}
            </div>
        </div>    
    @endif
    @if (session('Message'))
        <div class="alert alert-info">
            <div class="container">
                {{ session('Message') }}
            </div>
        </div>    
    @endif
    @if (session('errors'))
        <div class="alert alert-danger">
            <div class="container">
                Please fix the following errors
                <ul>
                    @foreach (session('errors')->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>    
    @endif
    <div class="container">
        @yield('content')
    </div>
</body>
</html>