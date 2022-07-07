@extends('layouts.app')

@section('content')
<div class="top_left_container">
    <a href="/" alt="" class="top_left">Back</a>
</div>
</br>
<div class="container">
    <div class="card">
        <h2>Confirm Password</h2>
        <div class="card-body">
            <p>Please confirm your password before continuing.</p>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <fieldset>
                    <label for="password" >Password :</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-primary">Confirm Password :</button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
                    @endif
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection
