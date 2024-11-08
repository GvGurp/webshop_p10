@extends('layout.layout')

@section('content')
<main id="mainBezorgdiensten">
    <div class="content-container">
        <!-- Hoofdsectie met titel en beschrijving -->
        <div class="content-header">
            <h1 class="over-ons-title">Bezorgdiensten</h1>
            <p class="over-ons-text">Onze bezorgdiensten zijn beschikbaar van maandag tot en met vrijdag tussen 10:00 en 17:30. Plaats uw bestelling binnen deze tijden voor snelle en efficiënte levering.</p>
        </div>

        <!-- Opties voor bezorgdiensten -->
        <div class="content-body">
            <p class="over-ons-text">Kies een bezorgdienst:</p>
            <ul class="service-section">
                <li><button class="service-item" onclick="selectBezorgdienst('UPS')">UPS</button></li>
                <li><button class="service-item" onclick="selectBezorgdienst('DHL')">DHL</button></li>
                <li><button class="service-item" onclick="selectBezorgdienst('Homerr')">Homerr</button></li>
                <!-- Voeg hier andere bezorgdiensten toe -->
            </ul>
        </div>

        <!-- Resultaat sectie -->
        <div id="result" class="content-body"></div>
    </div>

    <!-- Script voor het tonen van de geselecteerde bezorgdienst -->
    <script>
        function selectBezorgdienst(bezorgdienst) {
            document.getElementById('result').innerText = `Je hebt ${bezorgdienst} gekozen.`;
        }
    </script>
</main>
@endsection
