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
        <img src="Photos/cropped-logo%20UNEED-IT.png">
    </div>
    <div id="logoptions">
        <ul>
            <li class="redc"> <a href="home">Home</a> </li>
            <li class="bluec"> <a href="overons">Over ons </a></li>
            <li class="redc"> <a href="service">Service </a></li>
            <li class="bluec" > <a href="zakelijk">Zakelijk </a></li>
            <li class="redc"> <a href="faq">Faq </a> </li>
            <li class="bluec"><a href="bezorgdiensten"> Bezorgdiensten </a></li>
            <li class="redc"> <a href="account">Account </a> </li>
             <!-- pagina's staan in mapje webshop (Gaby) -->
            <li class="bluec"><a href="webshop/webshop"> webshop  </a> </li>
            <li class="redc"> <a href="webshop/admincreate">admin create </a> </li>
        </ul>
    </div>
</nav>
    <!-- Inhoud dat op de pagina komt te staan (Gaby) -->
    <div class=""> 
        @yield ('content')
    </div>

<footer id="footer">
    <div id="adress">
        <img src="Photos/location.png">
        <p>ZUIDBAAN 514, 2841MD</p>
       <p> MOORDRECHT</p>
    </div>
    <div id="telefoonnnumer">
        <img src="Photos/phone.png">
        <p>+316 30 985 409 SERVICENUMMER</p>
        <p>+3118 28 202 18 KANTOOR </p>
        <p> BEREIKBAAR VAN 09:00-18:00</p>
    </div>
    <div id="tijd">
        <img src="Photos/clock.png">
        <p>MA T/M VRIJ, 09:00 - 23:00</p>
        <p>TELEFONISCH BEREIKBAAR</p>
        <p>VOOR ABONNEMENTHOUDERS</p>
    </div>
</footer>
</body>
</html>