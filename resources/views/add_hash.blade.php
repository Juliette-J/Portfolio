<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('css/welcome.css')}}">
        <title>JJ's Portfolio - New</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pangolin&family=Special+Elite&display=swap" rel="stylesheet">
        <!-- Script -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="{{asset('js/post.js')}}"></script>
    </head>
    <body class="app_background">
        <div class="top_left_container">
            <a href="/home/admin" class="top_left" alt="">Back</a>
        </div>
        <h1>NEW HASHTAG</h1>
        <div class="card-body">
            <form id="form" onsubmit="return post_add('/api/admin/hashs/store')">
                @csrf
                <fieldset>
                    <label for="label">Eng label:<label>
                    <input type="text" name="label">
                    </br>
                    <label for="label_fr">French label:<label>
                    <input type="text" name="label_fr">
                    </br>
                    <input type="submit" class="submit" value="Send">
                </fieldset>
            </form>
        </div>
    </body>
    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
