<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('css/welcome.css')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pangolin&family=Special+Elite&display=swap" rel="stylesheet">  

        <title>Portfolio - Update</title>
    </head>

    <body>
        <div class="top_left_container">
            <a href="/home/admin" class="top_left" alt="">Back</a>
        </div>
        <h1>UPDATE</h1>
        <fieldset>
            <h2>Update an image</h2>

            @if ( session('succes') )
                <div class="alert alert-succes">
                    <h3>{{ session('succes') }}</h3>
                </div>
            @endif

            @if ( session('error') )
                <div class="alert alert-error">
                    <h3>{{ session('error') }}</h3>
                </div>
            @endif

            <form action="{{ route('images.update', ['id' => $image->id]) }}" method="POST">
                @csrf
                <fieldset>
                    <img  src="{{ $image->path }}" id="{{ $image->id }}" class="image"/>
                    </br>
                    <label for="title">Title :<label>
                    </br>
                    <input type="text" name="title" value="{{$image->title}}">
                    </br>

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    </br>
                    <label for="path">Path :<label>
                    </br>
                    <input type="text" name="path" value="{{$image->path}}">
                    </br>

                    @error('path')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    </br>
                    <label for="date">Date :<label>
                    </br>
                    <input type="date" name="date" value="{{$image->date}}">
                    </br>

                    @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    </br>
                    <label for="en_description">English description :<label>
                    </br>
                    <textarea name="desc">{{$image->desc}}</textarea>
                    </br>

                    @error('en_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    </br>
                    <label for="fr_description">French description :<label>
                    </br>
                    <textarea name="desc_fr">{{$image->desc_fr}}</textarea>
                    </br>

                    @error('fr_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    </br>
                    <label for="type">Type :<label>
                    @foreach ($types as $type)
                        <input type="radio" name="id_type" value="{{$type->id}}" checked="{{ $type->id == $image->id_type }}">
                        <label for="{{$type->name}}">{{$type->name}}</label>
                    @endforeach 
                    </br>

                    @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </br>
                </fieldset>
                </br>
                <input type="submit" value="Send">
            </form>
        </fieldset>
    </body>

    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
