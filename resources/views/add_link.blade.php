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
        <h2>Link the image and its reference.s</h2>
        <form action="{{ route('links.store') }}" method="POST">
            @csrf
            <fieldset>
                </br>
                <label for="image_path">Choose an image :<label>
                </br></br>
                @foreach ($images as $image)
                    <fieldset>
                        </br>
                        <input type="radio" name="image_id" value="{{$image->id}}">
                        <label for="{{$image->title}}">{{$image->title}}</label>
                        </br>
                        <img  src="{{ $image->path }}" id="{{ $image->id }}" class="image"/>
                        @error('{{$image->title}}')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    </br>  
                @endforeach
                </br></br>
                <label for="image_hash_ref">Choose a reference :<label>
                </br></br>
                <fieldset>
                    <ul>
                        @foreach ($hashtags as $hashtag)
                            <input type="radio" name="hash_id" value="{{$hashtag->id}}"> 
                            <label for="{{$hashtag->label}}">{{$hashtag->label}}</label>
                            </br>
                            @error('{{$hashtag->label}}')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </br>
                        @endforeach
                    </ul>
                </fieldset>
                </br>
                <input type="submit" value="Link">
                </br></br>
            </fieldset>
        </form>
        </br></br>
    </body>

    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
