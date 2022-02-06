<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <title>Accedi</title>
</head>
<body>
    <div class="container text-center">
        <h3>Accedi</h3>
        <form action="{{route('login')}}" method="post">
            @method('post')
            @csrf

            <input type="email" name="email" class="mb-2" placeholder="Inserisci la tua email"><br>
            <input type="password" name="password" class="mb-2" placeholder="Inserisci la password"><br>
            <input type="submit" class="btn btn-primary" value="Accedi">
        </form>
        
    </div>

    <script src="{{asset('/js/app.js')}}"></script>
</body>
</html>