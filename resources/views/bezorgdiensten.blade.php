@extends('layout.layout')

@section('content')
<main>
    <div class="container">
        <!-- Titel en Beschrijving -->
        <div class="bezorg-header">
            <h1 class="textbezorg">Bezorgdiensten</h1>
            <p class="textbezorg">Onze bezorgdiensten zijn beschikbaar van maandag tot en met vrijdag tussen 10:00 en 17:30. Plaats uw bestelling binnen deze tijden voor snelle en efficiënte levering.</p>
        </div>

        <!-- Instructies en lijst van bezorgdiensten -->
        <div class="bezorg-opties">
            <p class="textbezorg">Kies een bezorgdienst:</p>
            <ul class="bezorg-lijst">
                <li><button class="bezorgdiensten" onclick="selectBezorgdienst('UPS')">UPS</button></li>
                <li><button class="bezorgdiensten" onclick="selectBezorgdienst('DHL')">DHL</button></li>
                <li><button class="bezorgdiensten" onclick="selectBezorgdienst('Homerr')">Homerr</button></li>
                <!-- Voeg hier andere bezorgdiensten toe -->
            </ul>
        </div>

        <!-- Resultaat sectie -->
        <div id="result" class="resultaat"></div>
    </div>

    <!-- Script voor het tonen van geselecteerde bezorgdienst -->
    <script>
        function selectBezorgdienst(bezorgdienst) {
            document.getElementById('result').innerText = `Je hebt ${bezorgdienst} gekozen.`;
        }
    </script>
</main>
@endsection
