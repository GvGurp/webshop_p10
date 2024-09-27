@extends('layout.layout')


@section('content')
<div class="container">
    <div class="login-signup">
        <h1>Het lijkt erop dat jij niet ingelogd is</h1>
        <button onclick="window.location.href='login.html'">Log In</button>
        <button onclick="window.location.href='registration.html'">Sign Up</button>
    </div>
</div>
@endsection