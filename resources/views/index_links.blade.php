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
            <h2>Delete a link</h2>
            <fieldset class="flex">
                @foreach ($images as $image)
                    <fieldset class="flex_children">
                        <img  src="{{ $image->path }}" id="{{ $image->id_image }}" class="image"/>
                        <p>Link.s :</p>
                        @foreach ($links as $link)
                            @if ($link->id_image == $image->id)
                                <p>{{ $link->label}} <a href="{{ route('links.destroy', ['id' => $link->id]) }}" alt="">Delete</a> </p>
                            @endif
                        @endforeach
                    </fieldset>
                @endforeach
            </fieldset>
        </fieldset>
    </body>

    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
