@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <fieldset>
            <h2>Something to add ?</h2>
            </br>
            <nav>
                <a href="{{ route('images.create') }}" alt="">An image</a>
                <a href="{{ route('hashs.create') }}" alt="">A hashtag</a>
                <a href="{{ route('links.create') }}" alt="">A link</a>
            </nav>
            </br></br>
        </fieldset>
        </br></br>
        <fieldset>
            <h2>Or to update / delete ?</h2>
            </br>
            <nav>
                <a href="{{ route('images.list') }}" alt="">An image</a>
                <a href="{{ route('hashs.list') }}" alt="">A hashtag</a>
                <a href="{{ route('links.list') }}" alt="">A link</a>
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
        </br></br></br></br></br>
    </div>
</div>
@endsection
