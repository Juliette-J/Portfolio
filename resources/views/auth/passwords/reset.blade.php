@extends('layouts.app')

@section('content')
<div class="top_left_container">
    <a href="/" alt="" class="top_left">Back</a>
</div>
</br>
<div class="container">
    <div class="card">
        <h2>Reset Password</h2>
        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <fieldset>
                    <input type="hidden" name="token" value="{{ $token }}">
                    <label for="email">Email Address :</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="password">Password :</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="password-confirm" >Confirm Password :</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </fieldset>    
            </form>
        </div>
    </div>
</div>
@endsection
