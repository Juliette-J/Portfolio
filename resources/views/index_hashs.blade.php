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

        <title>JJ's Portfolio - Delete</title>
    </head>

    <body>
        <div class="top_left_container">
            <a href="/home/admin" class="top_left" alt="">Back</a>
        </div>
        <h1>DELETE</h1>
        <fieldset>
            <h2>Delete a hashtag</h2>
            @foreach ($hashtags as $hashtag)
                <fieldset>
                        <h3> <a href="{{ route('hashs.destroy', ['id' => $hashtag->id]) }}" alt="">Delete</a> {{ $hashtag->label}} </h3>
                        <p>Linked images :</p>
                        <div>
                        @foreach ($images as $image)
                            @if ($image->id == $hashtag->id)
                                <img  src="{{ $image->path }}" id="{{ $image->id_image }}" class="image"/>
                            @endif
                        @endforeach
                        </div>
                        </br>
                </fieldset>
                </br></br>
            @endforeach
            </br>
        </fieldset>
    </body>

    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
