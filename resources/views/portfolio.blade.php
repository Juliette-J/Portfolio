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

        <title>JJ's Porfolio</title>
    </head>
    <body>
        <div class="top_left_container">
            <a href="/login" class="top_left">Log In</a>
        </div>
        </br>
        <fieldset>
            <h1>Portfolio</h1>
        </fieldset>
        </br>
        <nav>
            <a href="/">Homepage</a> 
            </br>
            <a href="/portfolio/dessin">Drawings</a>
            <a href="/portfolio/photo">Photos</a>
            </br>
            <a href="/portfolio">Back</a>
        </nav>
        </br>

        </br>
        <div class="hash_labels">
            <button type="button" id="IMAC" class="hash_btn">#IMAC</button>
            <button type="button" id="ESIPE" class="hash_btn">#ESIPE</button>
            <button type="button" id="Paris" class="hash_btn">#Paris</button>
            <button type="button" id="Nantes" class="hash_btn">#Nantes</button>
        </div>
        <script type="text/javascript" src="{{asset('js/hash_URL.js')}}"> </script>
        </br>

        <div class="images">
            @foreach ($images as $image)
                <div class="miniature">
                    <img  src="{{ $image->path }}" id="{{ $image->id }}" class="image"/>
                    <button type="button" id="{{ $image->id . '-button'}}" class="button-desc">+</button>
                </div>
                
                <!-- Modale Image -->
                <div id="{{ $image->id . '-modal-img'}}" class="modal-img">
                    <span class="close-img" id="{{ $image->id . '-close-img'}}">&times;</span>
                    <img class="modal-content-img" id="{{ $image->id . '-fullsize'}}">
                </div>

                <!-- Modale Description -->
                <div class="modal-desc" id="{{ $image->id . '-button-modal-desc'}}" >
                    <span class="close-desc" id="{{ $image->id . '-button-close-desc'}}">&times;</span>
                    <div class="modal-content-desc" id="{{ $image->id . '-button-desc'}}"> 
                        <img src="{{ $image->path }}" class="img-desc" id="{{ $image->id }} .'-in-desc'"/>
                        <p>{{ $image->title }}</p> 
                        </br>
                        <p>{{ $image->date }} </p>
                        </br>
                        <p>{{ $image->desc }}</p>
                    </div>
                </div>
                
                <script type="text/javascript" src="{{asset('js/modal.js')}}"> </script>
            @endforeach
        </div>

    </body>
    </br>
    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</html>
