<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('css/welcome.css')}}">
        <title>Portfolio - Update</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pangolin&family=Special+Elite&display=swap" rel="stylesheet">
        <!-- Script -->
        <script type="text/javascript" src="{{asset('js/post.js')}}"> </script>
    </head>
    <body class="app_background">
        <div class="top_left_container">
            <a href="/admin/images" class="top_left" alt="">Back</a>
        </div>
        <h1 class="admin_title">UPDATE IMAGE</h1>
        <div class="flex">
            <form id="form" onsubmit="return post_update()" >
                @csrf
                <fieldset>
                    <img  src="{{ $image->path }}" id="{{ $image->id }}" class="small_img"/>
                    </br></br>
                    <label for="title">Title:<label>
                    <input type="text" name="title" value="{{$image->title}}">
                    </br>
                    <label for="path">Path:<label>
                    <input type="text" name="path" value="{{$image->path}}">
                    </br>
                    <label for="date">Date:<label>
                    <input type="date" name="date" value="{{$image->date}}">
                    </br>
                    <label for="en_description">English description:<label>
                    <textarea name="desc">{{$image->desc}}</textarea>
                    </br>
                    <label for="fr_description">French description:<label>
                    <textarea name="desc_fr">{{$image->desc_fr}}</textarea>
                    </br>
                    <label for="type">Type:<label>
                    @foreach ($types as $type)
                        <input type="radio" name="id_type" value="{{$type->id}}" checked="{{ $type->id == $image->id_type }}">
                        <label for="{{$type->name}}">{{$type->name}}</label>
                    @endforeach
                    <input type="submit" class="submit" value="Send">
                </fieldset>
            </form>
        </div>
    </body>
    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
