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
            <form action="{{route('addPost')}}" method="post">
                @method('post')
                @csrf
                <label for="title">Titolo:</label>
                <input type="text" name="title" placeholder="Titolo del post" class="mb-2"><br>
                <label for="subtitle">Sottotitolo:</label>
                <input type="text" name="subtitle" placeholder="Sottotitolo del post" class="mb-2"><br>
                <label for="publication_date">Data di pubblicazione:</label>
                <input type="date" name="publication_date" class="mb-2"><br>
                <textarea name="post_content" cols="30" rows="5" placeholder="Scrivi qui il tuo post" class="mb-2"></textarea><br>
                <label for="category_id">Categoria: </label>
                <select name="category_id">
                    <option value="">Nessuna</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select><br>
                @foreach ($tags as $tag)
                    <input type="checkbox" name="tags[]" value="{{$tag->id}}">
                    <label for="tags" class="mr-3">{{$tag->name}}</label>
                @endforeach
                <br>
                <a href="{{route('posts')}}" class="btn btn-secondary">Annulla</a>
                <input type="submit" value="Pubblica" class="btn btn-primary">
            </form>
        @else
            <h3>Per vedere i post pubblicati, accedi o registrati.</h3>
            <a href="{{route('loginForm')}}" class="btn btn-primary">Accedi</a>
            <a href="{{route('registerForm')}}" class="btn btn-primary">Registrati</a>
        @endauth
        
    </div>

    <script src="{{asset('/js/app.js')}}"></script>
</body>
</html>