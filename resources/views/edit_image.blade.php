<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

    <body class="app_background">
        <div class="top_left_container">
            <a href="/admin/images" class="top_left" alt="">Back</a>
        </div>

        @if ( session('succes') )
            <div class="alert alert-succes">
                <h1 class="admin_title">{{ session('succes') }}</h1>
            </div>
        @elseif( session('error') )
            <div class="alert alert-error">
                <h1 class="admin_title">{{ session('error') }}</h1>
            </div>
        @else
            <h1 class="admin_title">UPDATE IMAGE</h1>
        @endif

        <div class="flex">
            <form action="{{ route('images.update', ['id' => $image->id]) }}" method="POST">
                @csrf
                <fieldset>
                    <img  src="{{ $image->path }}" id="{{ $image->id }}" class="small_img"/>
                    </br></br>
                    <label for="title">Title:<label>
                    </br>
                    <input type="text" name="title" value="{{$image->title}}">
                    </br>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    </br>
                    <label for="path">Path:<label>
                    </br>
                    <input type="text" name="path" value="{{$image->path}}">
                    </br>
                    @error('path')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    </br>
                    <label for="date">Date:<label>
                    </br>
                    <input type="date" name="date" value="{{$image->date}}">
                    </br>

                    </br>
                    <label for="en_description">English description:<label>
                    </br>
                    <textarea name="desc">{{$image->desc}}</textarea>
                    </br>
                    @error('en_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    </br>
                    <label for="fr_description">French description:<label>
                    </br>
                    <textarea name="desc_fr">{{$image->desc_fr}}</textarea>
                    </br>

                    @error('fr_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    </br>
                    <label for="type">Type:<label>
                    @foreach ($types as $type)
                        <input type="radio" name="id_type" value="{{$type->id}}" checked="{{ $type->id == $image->id_type }}">
                        <label for="{{$type->name}}">{{$type->name}}</label>
                    @endforeach 
                    </br></br>
                    <input type="submit" class="submit" value="Send">
                </fieldset>
            </form>
        </div>
        </br></br></br></br>
    </body>
    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
