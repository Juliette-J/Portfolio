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

        <title>JJ's Portfolio - Delete</title>
    </head>
    <body class="app_background">
        <div class="top_left_container">
            <a href="/home/admin" class="top_left" alt="">Back</a>
        </div>
        <h1 class="admin_title">DELETE HASHTAG</h1>
        <!-- TOKEN -->
        <input type="hidden" name="csrftoken" id="csrf-token" value="{{ Session::token() }}" />
        <div id ="index" class="masonry">
        {{-- 
            @foreach ($hashtags as $hashtag)
                <fieldset class="miniature">
                    <form id="form" onsubmit="return post_delete('/api/admin/images/store')">
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
            --}}
        </div>
        <script type="text/javascript" src="{{asset('js/post.js')}}"> </script>
        <script type="text/javascript" src="{{asset('js/index_hashs.js')}}"></script>
    </body>
    </br></br></br>
    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
