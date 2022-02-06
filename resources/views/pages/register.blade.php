<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <title>Registrati</title>
</head>
<body>
    <div class="container text-center">
        <h3>Registrati</h3>
        <form action="{{route('register')}}" method="post">
            @method('post')
            @csrf
            <input type="text" name="name" class="mb-2" placeholder="Inserisci il tuo nome"><br>
            <input type="email" name="email" class="mb-2" placeholder="Inserisci la tua email"><br>
            <input type="password" name="password" class="mb-2" placeholder="Inserisci la password"><br>
            <input type="password" name="password_confirmation" class="mb-2" placeholder="Conferma la password"><br>
            <input type="submit" class="btn btn-primary" value="Registrati">
        </form>
        
    </div>

    <script src="{{asset('/js/app.js')}}"></script>
</body>
</html>