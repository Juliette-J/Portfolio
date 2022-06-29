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

        <title>JJ's Portfolio - Delete</title>
    </head>
    <body class="app_background">
        <div class="top_left_container">
            <a href="/home/admin" class="top_left" alt="">Back</a>
        </div>
        <h1 class="admin_title">DELETE LINK</h1>
        <div class="masonry">
            @foreach ($images as $image)
                <fieldset class="miniature">
                    <img  src="{{ $image->path }}" id="{{ $image->id_image }}" class="image"/>
                    <p>Link.s:</p>
                    @foreach ($links as $link)
                        @if ($link->id_image == $image->id)
                            <h2>{{ $link->label}}</h2>
                            <form action="{{ route('links.destroy', ['id' => $link->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="submit">Delete</button>
                            </form>
                        @endif
                    @endforeach
                </fieldset>
            @endforeach
        </div>
        </br></br></br>
    </body>
    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
