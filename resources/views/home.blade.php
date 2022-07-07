@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body">
        <fieldset>
            <h2>Add something?</h2>
            </br>
            <nav>
                <a href="{{ route('images.create') }}" alt="">An image</a>
                <a href="{{ route('hashs.create') }}" alt="">A hashtag</a>
                <a href="{{ route('links.create') }}" alt="">A link</a>
            </nav>
        </fieldset>
        <fieldset>
            <h2>Update|Delete?</h2>
            </br>
            <nav>
                <a href="{{ route('images.list') }}" alt="">An image</a>
                <a href="{{ route('hashs.list') }}" alt="">A hashtag</a>
                <a href="{{ route('links.list') }}" alt="">A link</a>
            </nav>
        </fieldset>
    </div>
    </br>
    <nav>
        <a href="/" class="top_left">See the website</a>
    </nav>
    <footer>
        <div class="footer-block"> Portfolio 2022 - Juliette Jeannin </div>
    </footer>
</div>

@endsection
