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

        <title>JJ's Portfolio - Update / Delete</title>
    </head>

    <body>
        <div class="top_left_container">
            <a href="/home/admin" class="top_left" alt="">Back</a>
        </div>
        <h1>UPDATE / DELETE</h1>
        <fieldset>
            <h2>Update / Delete an image</h2>
            <fieldset class="flex">
                @foreach ($images as $image)
                    <fieldset class="flex_children">
                        <div>
                            <img  src="{{ $image->path }}" id="{{ $image->id }}" class="image"/>
                        </div>
                        </br>
                        <div class="flex">
                            <a href="{{ route('images.edit', ['id' => $image->id]) }}" alt="">Edit</a>
                            <form action="{{ route('images.destroy', ['id' => $image->id]) }}" method="POST">
                                @csrf
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </fieldset>
                @endforeach
            </fieldset>
            </br>
        </fieldset>
    </body>

    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
