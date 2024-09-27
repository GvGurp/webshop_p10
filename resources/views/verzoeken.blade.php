<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verzoeken</title>
    <link rel="stylesheet" href="{{ asset('css/verzoekenstyle.css') }}">
</head>
<body>
<nav id="navbar">
    <div id="logonav">
        <img src="{{ asset('Photos/cropped-logo%20UNEED-IT.png') }}">
    </div>
    <div id="logoptions">
        <ul>
            <li class="redc"> <a href="{{ url('home') }}">Home</a> </li>
            <li class="bluec"> <a href="{{ url('OverOns') }}">Over ons</a></li>
            <li class="redc"> <a href="{{ url('service') }}">Service</a></li>
            <li class="bluec"> <a href="{{ url('zakelijk') }}">Zakelijk</a></li>
            <li class="redc"> <a href="{{ url('faq') }}">Faq</a> </li>
            <li class="bluec"><a href="{{ url('Bezorgdiensten') }}"> Bezorgdiensten</a></li>
            <li class="redc"> <a href="{{ url('account') }}">Account</a> </li>
        </ul>
    </div>
</nav>
<h1>Verzoeken</h1>
<div class="requests-container">
    @foreach ($requests as $request)
        <div class="request">
            <div class="user-info">
                <h2>Klantgegevens</h2>
                <div class="Klantgegevens">
                    <p><strong>Naam:</strong> {{ $request->naam }}</p>
                    <p><strong>Telefoonnummer:</strong> {{ $request->telefoonnummer }}</p>
                    <p><strong>Email:</strong> {{ $request->email }}</p>
                    <p><strong>Adres:</strong> {{ $request->address }}</p>
                </div>
            </div>
            <div class="request-info">
                <h2>Verzoekdetails</h2>
                <p><strong>Omschrijving:</strong><br>{{ $request->omschrijving }}</p>
                <div class="Klantgegevens">
                    <p><strong>Typemachine:</strong> {{ $request->typemachine }}</p>
                    <p><strong>Garantie:</strong> {{ $request->garantie }}</p>
                    <p><strong>Datum:</strong> {{ $request->datum }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
