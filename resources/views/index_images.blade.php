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

        <title>JJ's Portfolio - Update / Delete</title>
    </head>

    <body class="app_background">
        <div class="top_left_container">
            <a href="/home/admin" class="top_left" alt="">Back</a>
        </div>
        <h1 class="admin_title">UPDATE / DELETE</h1>
        <!-- TOKEN -->
        <input type="hidden" name="csrftoken" id="csrf-token" value="{{ Session::token() }}" />
        <!-- INDEX -->
        <div id="index" class="masonry"></div>
        <script type="text/javascript" src="{{asset('js/post.js')}}"> </script>
        <script type="text/javascript" src="{{asset('js/index_images.js')}}"></script>
        </br></br></br>
    </body>
    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
