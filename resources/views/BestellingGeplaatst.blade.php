

@extends('layout.layout')

@section('content')

    <div class="container" style="text-align: center; padding-block-start: 50px;">
        <h1>Bestelling Gelukt!</h1>
        <p>Bedankt voor je bestelling. Je ontvangt binnenkort meer informatie over de voortgang van je bestelling per e-mail.</p>
        
        <a href="{{ route('home') }}" class="btn btn-primary" style="margin-block-start: 20px;">Terug naar de homepage</a>
    </div>
@endsection