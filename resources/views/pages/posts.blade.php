<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <title>Bacheca</title>
</head>
<body>
    <div class="container text-center">
        @auth
            <h2>Ciao {{Auth::user()->name}}</h2>
            <a href="{{route('logout')}}" class="btn btn-primary">Logout</a>
        @else
            <h3>Per vedere i post pubblicati, accedi o registrati.</h3>
            <a href="{{route('loginForm')}}" class="btn btn-primary">Accedi</a>
            <a href="{{route('registerForm')}}" class="btn btn-primary">Registrati</a>
        @endauth
        
    </div>

    <script src="{{asset('/js/app.js')}}"></script>
</body>
</html>