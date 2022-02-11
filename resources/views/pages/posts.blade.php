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
            <a href="{{route('logout')}}" class="btn btn-primary my-2">Logout</a>
            <br>
            <a href="{{route('newPost')}}" class="btn btn-primary my-2">Pubblica un nuovo post</a>
            <h3 class="mt-3">Tutti i post pubblicati</h3>
            @foreach ($posts as $post)
                <h5>{{$post->title}}</h5>
                <h6>{{$post->subtitle}}</h6>
                <h6>{{$post->author}} 
                    @if($post->category)
                        - categoria: {{$post->category->name}}
                    @endif
                </h6>

                <h6>
                    @foreach ($post -> tags as $tag)
                        {{$tag->name}}<br>
                    @endforeach
                </h6>
                <a class="btn btn-info" href="{{route('editPost', $post->id)}}">Modifica post</a>
                <a class="btn btn-danger" href="{{route('deletePost', $post->id)}}">Elimina post</a>
                <br><hr><br>
            @endforeach
            {{-- <div id="app">
                <show-all-posts></show-all-posts>
            </div> --}}
        @else
            <h3>Per vedere i post pubblicati, accedi o registrati.</h3>
            <a href="{{route('loginForm')}}" class="btn btn-primary">Accedi</a>
            <a href="{{route('registerForm')}}" class="btn btn-primary">Registrati</a>
        @endauth
        
    </div>

    <script src="{{asset('/js/app.js')}}"></script>
</body>
</html>