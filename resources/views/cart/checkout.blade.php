@extends('layout.layout')

@section('content')

<div class="form-container">
    <form action="{{ route('order.place') }}" method="POST">
        @csrf

        <!-- Adresgegevens invoeren -->
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

        <!-- Telefoonnummer -->
        <div>
            <label for="phone">Telefoonnummer</label>
            <input type="tel" id="phone" name="phone" required>
        </div>

        <!-- Wachtwoord bevestiging invoeren -->
        <h4>Bevestig je wachtwoord</h4>
        <div>
            <label for="password">Wachtwoord</label>
            <input type="password" id="password" name="password" required>
        </div>

        <!-- Betaalmethode kiezen via dropdown -->
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

        <!-- Checkbox voor akkoord betaling -->
        <div style="margin-block-start: 20px;">
            <label for="terms">
                <input type="checkbox" id="terms" name="terms" required>
                Ik begrijp dat ik moet betalen zodra ik op "Bestelling plaatsen" klik.
            </label>
        </div>
        <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">

        <button type="submit">Bestelling plaatsen</button>
    </form>
</div>

@endsection
