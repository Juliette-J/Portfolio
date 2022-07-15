<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('css/welcome.css')}}">
        <title>JJ's Porfolio</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pangolin&family=Special+Elite&display=swap" rel="stylesheet">  
        <!-- Script -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    </head>
    <body class="portfolio_background">
        <nav class="top_container">
            <div class="top_left_container">
                <a href="/login" class="top_left">{{ __("Log In") }}</a>
            </div>
            <div class="top_right_container">
                <a href="locale/en" class="top_right">En</a>
                <a href="locale/fr" class="top_right">Fr</a>
            </div>
        </nav>
        <fieldset class="banner">
            <h1>Portfolio</h1>
        </fieldset>
        <nav>
            <a href="/">{{ __("Homepage") }}</a> 
            </br>
            <a href="#dessin" data-type="dessin" class="type_link">{{ __("Drawings") }}</a>
            <a href="#photo" data-type="photo" class="type_link">{{ __("Photos") }}</a>
            </br>
            <a href="/portfolio">{{ __("Back") }}</a>
        </nav>
        <div id="nav_btns" class="hash_labels"></div>
        <div id="galery" class="masonry"></div>
        <!-- Script -->
        <script type="text/javascript" src="{{asset('js/portfolio.js')}}"></script>
        </br></br></br>
    </body>
    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>