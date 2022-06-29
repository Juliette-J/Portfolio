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
        
        @if ( session('succes') )
            <div class="alert alert-succes">
                <h1 class="admin_title">{{ session('succes') }}</h1>
            </div>
        @elseif( session('error') )
            <div class="alert alert-error">
                <h1 class="admin_title">{{ session('error') }}</h1>
            </div>
        @else
            <h1 class="admin_title">DELETE HASHTAG</h1>
        @endif

        <div class="masonry">
            @foreach ($hashtags as $hashtag)
                <fieldset class="miniature">
                    <form action="{{ route('hashs.destroy', ['id' => $hashtag->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="submit">Delete</button>
                    </form>
                    <h2>{{ $hashtag->label }}</h2>
                    <p>Linked images:</p>
                    <div class="flex">
                        @foreach ($images as $image)
                            @if ($image->id == $hashtag->id)
                                <img src="{{ $image->path }}" id="{{ $image->id_image }}" class="image"/>
                            @endif
                        @endforeach
                    </div>
                </fieldset>
            @endforeach
        </div>
    </body>
    </br></br></br>
    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
