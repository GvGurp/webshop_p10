<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">

</head>
<body>
<nav id="navbar">
    <div id="logonav">
    <img src="{{ asset('foto\'s/cropped-logo%20UNEED-IT.png') }}" alt="De logo van UNEED-IT">
    </div>
    <div id="logoptions">
        <ul>
            <li class="redc"> <a href="home">Home</a> </li>
            <li class="bluec"> <a href="overons">Over ons </a></li>
            <li class="redc"> <a href="service">Service </a></li>
            <li class="bluec" > <a href="zakelijk">Zakelijk </a></li>
            <li class="redc" > <a href="verzoeken">Verzoeken </a></li>
            <li class="bluec"> <a href="faq">Faq </a> </li>
            <li class="redc"><a href="bezorgdiensten"> Bezorgdiensten </a></li>
            <li class="bluec"> <a href="account">Account </a> </li>
             <!-- pagina's staan in mapje webshop (Gaby) -->
            <li class="bluec"><a href="webshop"> webshop  </a> </li>
            <li class="redc"> <a href="webshop/admincreate">admin create </a> </li>
            <li class="redc"> <a href="webshop/adminBewerken">admin bewerken </a> </li>
            <!--auth inloggen en registratie (Ola) -->
             <!-- Auth Links - Alleen tonen als gebruiker NIET is ingelogd(Ola) -->
            @guest
                <li class="bluec"><a href="{{ route('login') }}">Inloggen</a></li>
                <li class="redc"><a href="{{ route('register') }}">Registreren</a></li>
            @endguest

            <!-- Logout knop - Alleen tonen als gebruiker IS ingelogd (Ola)-->
            @auth
                <li class="bluec">
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Uitloggen
                    </a>
                </li>
                <!-- Formulier voor het uitloggen -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endauth

        </ul>
    </div>
</nav>
    <!-- Inhoud dat op de pagina komt te staan (Gaby) -->
    <div class="">
        @yield ('content')
    </div>

    <!-- Modal -->
    <div id="productModal" class="modal" style="display:none;">
        <div class="modal-content">
        <span class="close">&times;</span>
        <div id="modal-body">
            <!-- De productinformatie zal hier worden geladen -->
        </div>
        </div>
    </div>


<footer id="footer">
    <div id="adress">
    <img src="{{ asset('foto\'s/location.png') }}" alt="Afbeelding van een locatie icoon ">
        <p>ZUIDBAAN 514, 2841MD</p>
       <p> MOORDRECHT</p>
    </div>
    <div id="telefoonnnumer">
    <img src="{{ asset('foto\'s/phone.png') }}" alt="Afbeelding van een telefoon icoon ">
        <p>+316 30 985 409 SERVICENUMMER</p>
        <p>+3118 28 202 18 KANTOOR </p>
        <p> BEREIKBAAR VAN 09:00-18:00</p>
    </div>
    <div id="tijd">
    <img src="{{ asset('foto\'s/clock.png') }}" alt="Afbeelding van een klok icoo ">
        <p>MA T/M VRIJ, 09:00 - 23:00</p>
        <p>TELEFONISCH BEREIKBAAR</p>
        <p>VOOR ABONNEMENTHOUDERS</p>
    </div>
</footer>
</body>
</html>
