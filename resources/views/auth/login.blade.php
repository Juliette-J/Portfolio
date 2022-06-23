@extends('layouts.app')

@section('content')
<div class="top_left_container">
    <a href="/" alt="" class="top_left">Back</a>
</div>
</br>
<div class="container">
    <div class="card">
        <h2>Log In</h2>
        </br>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <fieldset>
                    </br>
                    <label for="email">Email :</label>
                    </br>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        </br>
                        <span class="invalid-feedback" role="alert">
                            <h3>{{ $message }}</h3>
                        </span>
                    @enderror
                    </br></br>
                    <label for="password">Password :</label>
                    </br>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        </br>
                        <span class="invalid-feedback" role="alert">
                            <h3>{{ $message }}</h3>
                        </span>
                    @enderror

                    <!-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div> -->
                    </br></br>
                    <div class="btn_login">
                        <button type="submit">Go !</button>
                    </div>
                </fieldset>
                </br> </br>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">Forgot your password ?</a>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
