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
            <h2>Add an image</h2>
            <form action="{{ route('images.store') }}" method="POST">
                @csrf
                <fieldset>
                    </br>
                    <label for="title">Title :<label>
                    </br>
                    <input type="text" name="title">
                    </br></br>
                    <label for="path">Path :<label>
                    </br>
                    <input type="text" name="path">
                    </br></br>
                    <label for="date">Date :<label>
                    </br>
                    <input type="date" name="date">
                    </br></br>
                    <label for="description">Description :<label>
                    </br>
                    <textarea name="desc">...</textarea>
                    </br></br>
                    <label for="type">Type :<label>
                    @foreach ($types as $type)
                        <input type="radio" name="id_type" value="{{$type->id}}">
                        <label for="{{$type->name}}">{{$type->name}}     </label>
                    @endforeach
                    </br></br>
                </fieldset>
                </br>
                <input type="submit" value="Send">
                </br></br>
            </form>
        </fieldset>
    </body>

    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
