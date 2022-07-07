@extends('layouts.app')

@section('content')
<div class="top_left_container">
    <a href="/" alt="" class="top_left">Back</a>
</div>
</br>
<div class="container">
    <div class="card">
        <h2>Verify Your Email Address</h2>
        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    <p>A fresh verification link has been sent to your email address.</p>
                </div>
            @endif
            <p>Before proceeding, please check your email for a verification link.</p>
            <p>If you did not receive the email,</p>
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" >Click here to request another</button>.
            </form>
        </div>
    </div>
</div>
@endsection
