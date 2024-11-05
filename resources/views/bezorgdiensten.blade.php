@extends('layout.layout')


@section('content')
<main>
<div class="container">
    <h1 class="textbezorg">Bezorgdiensten</h1>
    <p class="textbezorg"> Onze bezorgdiensten zijn beschikbaar van maandag tot en met vrijdag tussen 10:00 en 17:30. Plaats uw bestelling binnen deze tijden voor snelle en efficiënte levering</p>
    <p class="textbezorg">Kies een bezorgdienst:</p>
    <ul>
        <li><button class="bezorgdiensten" onclick="selectBezorgdienst('UPS')">UPS</button></li>
        <li><button class="bezorgdiensten" onclick="selectBezorgdienst('DHL')">DHL</button></li>
        <li><button class="bezorgdiensten" onclick="selectBezorgdienst('Homerr')">Homerr</button></li>
        <!-- Voeg hier andere bezorgdiensten toe -->
    </ul>
    <div id="result"></div>
</div>
<script>
    function selectBezorgdienst(bezorgdienst) {
        document.getElementById('result').innerText = `Je hebt ${bezorgdienst} gekozen.`;
    }
</script>
</main>
@endsection