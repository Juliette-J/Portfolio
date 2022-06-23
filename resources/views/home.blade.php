@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
            <nav>
                <a href="{{ route('images.create') }}" alt="">Add an image</a>
                <a href="{{ route('hashs.create') }}" alt="">Add a hashtag</a>
                <a href="{{ route('links.create') }}" alt="">Add a link</a>
            </nav>
            </br></br>
        </fieldset>
        </br>
        <fieldset>
            <h2>Or to update ? Delete ?</h2>
            </br></br>
            <nav>
                <a href="{{ route('images.list') }}" alt="">Update / Delete</a>
            </nav>
            </br></br>
        </fieldset>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        </br></br></br>
        <nav>
            <a href="/" class="top_left">See the website</a>
        </nav>
        </br></br>
    </div>
</div>
@endsection
