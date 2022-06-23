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

        <title>Portfolio - Delete</title>
    </head>

    <body>
        <a href="/home/admin" alt="">Back</a>
        <h2>DELETE</h2>
        <h3>Supprimer une image</h3>
        <form action="{{ route('image.destroy', ['id' => $image->id]) }}" method="POST">
            @csrf
            <fieldset>
                <label for="image">Choisir l'image à supprimer :<label>
                <ul>
                    @foreach ($images as $image)
                        <input type="radio" name="id_image" value="{{$image->id}}">
                        <label for="{{$image->path}}">{{$image->path}}</label>
                        </br>
                    @endforeach
                </ul>
            </fieldset>
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit">Supprimer</button>
        </form>
    </body>

    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
