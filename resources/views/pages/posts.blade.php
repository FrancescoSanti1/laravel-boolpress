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
    <div class="container text-center pt-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @auth
            <h2>Ciao {{Auth::user()->name}}</h2>
            <a href="{{route('logout')}}" class="btn btn-primary">Logout</a>

            <h3 class="mt-3">Pubblica un nuovo post</h3>
            <form action="{{route('newPost')}}" method="post">
                @method('post')
                @csrf
                <input type="text" name="author" value="{{Auth::user()->name}}" class="mb-2"><br>
                <input type="text" name="title" placeholder="Titolo del post" class="mb-2"><br>
                <input type="text" name="subtitle" placeholder="Sottotitolo del post" class="mb-2"><br>
                <input type="date" name="publication_date" class="mb-2"><br>
                <textarea name="post_content" cols="30" rows="5" placeholder="Scrivi qui il tuo post" class="mb-2"></textarea><br>
                <input type="submit" value="Pubblica">
            </form>

            <h3 class="mt-3">Tutti i post pubblicati</h3>
        @else
            <h3>Per vedere i post pubblicati, accedi o registrati.</h3>
            <a href="{{route('loginForm')}}" class="btn btn-primary">Accedi</a>
            <a href="{{route('registerForm')}}" class="btn btn-primary">Registrati</a>
        @endauth
        
    </div>

    <script src="{{asset('/js/app.js')}}"></script>
</body>
</html>