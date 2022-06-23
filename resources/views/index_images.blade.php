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

        <title>Portfolio - Update</title>
    </head>

    <body>
        <div class="top_left_container">
            <a href="/home/admin" class="top_left" alt="">Back</a>
        </div>
        <h1>UPDATE</h1>
        <fieldset>
            <h2>Update an image</h2>
            <fieldset>
                <div class="images">
                    @foreach ($images as $image)
                        <div>
                            <div class="miniature">
                                <img  src="{{ $image->path }}" id="{{ $image->id }}" class="image"/>
                            </div>
                            </br>
                            <a href="{{ route('images.edit', ['id' => $image->id]) }}" alt="">Edit</a>
                            <a href="{{ route('images.destroy', ['id' => $image->id]) }}" alt="">Delete</a>
                            </br></br></br>
                        </div>
                    @endforeach
                </div>
            </fieldset>
            </br>
        </fieldset>
    </body>

    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
