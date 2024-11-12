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
            <img src="{{ asset("foto's/cropped-logo%20 UNEED-IT.png") }}" alt="De logo van UNEED-IT">
        </div>
        <div id="logoptions">
            <ul>
                {{-- Voor niet-ingelogde gebruikers (gast) --}}
                @guest
                    <li class="redc"><a href="{{ url('home') }}">Home</a></li>
                    <li class="bluec"><a href="{{ url('overOns') }}">Over ons</a></li>
                    <li class="redc"><a href="{{ url('service') }}">Service</a></li>
                    <li class="bluec"><a href="{{ url('zakelijk') }}">Zakelijk</a></li>
                    <li class="bluec"><a href="{{ url('faq') }}">Faq</a></li>
                    <li class="redc"><a href="{{ url('bezorgdiensten') }}">Bezorgdiensten</a></li>
                    <li class="bluec"><a href="{{ route('cart.webshop') }}">Webshop</a></li>
                    <li class="bluec"><a href="{{ route('login') }}">Inloggen</a></li>
                    <li class="redc"><a href="{{ route('register') }}">Registreren</a></li>
                @endguest
        
                {{-- Voor ingelogde gebruikers (geen admin) --}}
                @auth
                    @if (Auth::user()->email !== 'uneedit-admin@gmail.com')
                        <li class="redc"><a href="{{ url('home') }}">Home</a></li>
                        <li class="bluec"><a href="{{ url('overOns') }}">Over ons</a></li>
                        <li class="redc"><a href="{{ url('service') }}">Service</a></li>
                        <li class="bluec"><a href="{{ url('zakelijk') }}">Zakelijk</a></li>
                        <li class="redc"><a href="{{ route('requests.index') }}">Verzoeken</a></li>
                        <li class="bluec"><a href="{{ url('faq') }}">Faq</a></li>
                        <li class="redc"><a href="{{ url('bezorgdiensten') }}">Bezorgdiensten</a></li>
                        <li class="bluec"><a href="{{ url('account') }}">Account</a></li>
                        <li class="bluec"><a href="{{ url('webshop') }}">Webshop</a></li>
                        <li class="bluec">
                            <a href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Uitloggen
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endif
                @endauth
        
                {{-- Voor de admin gebruiker --}}
                @auth
                    @if (Auth::user()->email === 'uneedit-admin@gmail.com')
                        <li class="redc"><a href="{{ url('home') }}">Home</a></li>
                        <li class="bluec"><a href="{{ url('account') }}">Account</a></li>
                        <li class="redc"><a href="{{ url('webshop/admincreate') }}">Admin Create</a></li>
                        <li class="redc"><a href="{{ route('adminBewerken', ['id' => 1]) }}">Admin Bewerken</a></li>
                        <li class="redc"><a href="{{ route('adminOverzicht') }}">Admin Bestellingen</a></li>
                        <li class="bluec">
                            <a href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Uitloggen
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endif
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
