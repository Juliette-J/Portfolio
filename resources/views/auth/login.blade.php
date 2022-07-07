@extends('layouts.app')

@section('content')

<div class="container">
    <div class="top_left_container">
        <a href="/" alt="" class="top_left">Back</a>
    </div>
    </br>
    <div class="card">
        <h1 class="admin_title">Log In</h1>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <fieldset>
                    <label for="email">Email:</label>
                    </br>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <h3>{{ $message }}</h3>
                        </span>
                    @enderror
                    </br>
                    <label for="password">Password:</label>
                    </br>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <h3>{{ $message }}</h3>
                        </span>
                    @enderror
                    <div class="btn_login">
                        <button type="submit" class="submit">Go!</button>
                    </div>
                    {{-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div> --}}
                </fieldset>
            </form>
        </div>
        <div class="flex">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="flex_children">Forgot your password?</a>
            @endif
        </div>
    </div>
</div>
@endsection
