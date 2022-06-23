<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('css/welcome.css')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pangolin&family=Special+Elite&display=swap" rel="stylesheet">  

        <title>JJ's Portfolio - New</title>
    </head>

    <body>
        <div class="top_left_container">
            <a href="/home/admin" class="top_left" alt="">Back</a>
        </div>
        </br>
        <h1>NEW</h1>
        <fieldset>
            <h2>Add a hashtag</h2>
            <form action="{{ route('hashs.store') }}" method="POST">
                @csrf
                <fieldset>
                    </br>
                    <label for="label">Label :<label>
                    </br>
                    <input type="text" name="label">
                    </br></br>
                    <input type="submit" value="Send">
                    </br></br>
                </fieldset>
            </form>
            </br>
        </fieldset>
        </br></br>
    </body>

    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
