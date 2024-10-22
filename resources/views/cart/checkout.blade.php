@extends('layout.layout')

@section('content')
    <h1>Afrekenen</h1>

    @if($cart)  <!-- Tabel voor de product informatie in de winkelmandje (Gaby) -->
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Prijs</th>
                    <th>Aantal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $details) <!-- Pak de producten in cart bij ID (Gaby) -->
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>€{{ number_format($details['price'], 2) }}</td>
                        <td>{{ $details['total'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Totaal: €{{ number_format($totalPrice, 2) }}</h3> <!-- Totale prijs met twee decimalen laten zien (Gaby) --> 

        <form action="/order" method="POST">
            @csrf

            <!-- Adresgegevens invoeren (Gaby) -->
            <h4>Vul je adres in</h4>
            <div>
                <label for="city">Stad</label>
                <input type="text" id="city" name="city" required>
            </div>
            <div>
                <label for="street">Straatnaam</label>
                <input type="text" id="street" name="street" required>
            </div>
            <div>
                <label for="postcode">Postcode</label>
                <input type="text" id="postcode" name="postcode" required>
            </div>
            <div>
                <label for="house_number">Huisnummer</label>
                <input type="text" id="house_number" name="house_number" required>
            </div>

            <!-- Telefoonnummer (Gaby) -->
            <div>
                <label for="phone">Telefoonnummer</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <!-- Wachtwoord bevestiging invoeren (Gaby) -->
            <h4>Bevestig je wachtwoord</h4>
            <div>
                <label for="password">Wachtwoord</label>
                <input type="password" id="password" name="password" required>
            </div>

            <!-- Betaalmethode kiezen via dropdown (Gaby) -->
            <h4>Kies een betaalmethode</h4>
            <div>
                <label for="payment_method">Betaalmethode</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="ideal">iDeal</option>
                    <option value="paypal">PayPal</option>
                    <option value="creditcard">Creditcard</option>
                    <option value="bancontact">Bancontact</option>
                </select>
            </div>

            <!-- Checkbox voor akkoord betaling (Gaby) -->
            <div style="margin-top: 20px;">
                <label for="terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    Ik begrijp dat ik moet betalen zodra ik op "Bestelling plaatsen" klik.
                </label>
            </div>

            <!-- Bestelling plaatsen knop (Gaby) -->
            <button type="submit" class="btn btn-success" style="margin-top: 10px;">Bestelling plaatsen</button>
        </form>
    @else 
     <!-- Als de winkelmand leeg is (Gaby) -->
        <p>Je winkelmandje is leeg.</p>
    @endif

    
@endsection
