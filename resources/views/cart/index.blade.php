
@extends('layout.layout')

@section('content')
    <h1>Winkelmandje</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($cart) <!-- Controleren of het winkelmandje niet leeg is (Gaby) -->
        <table> <!-- Tabel voor de productinformatie in het winkelmandje (Gaby) -->
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Prijs</th>
                    <th>Aantal</th>
                    <th>Actie</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $details)
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>€{{ number_format($details['price'], 2) }}</td>
                        <!-- Aantal aanpassen met pijltjes (Gaby) -->
                        <td>
                              <form action="{{ route('cart.update', $id) }}" method="POST"> <!-- Route voor het bijwerken van het aantal producten -->
                              @csrf
                               <button type="button" onclick="this.form.elements['aantal'].stepDown()">&#8595;</button> <!-- Pijltje omlaag -->
                               <input type="number" name="aantal" value="{{ $details['total'] }}" min="1" style="inline-size: 50px; text-align: center;" required>
                               <button type="button" onclick="this.form.elements['aantal'].stepUp()">&#8593;</button> <!-- Pijltje omhoog -->
                               <button type="submit">Bijwerken</button> <!-- Knop om de hoeveelheid bij te werken -->
                               </form>
                        </td>


                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST"> <!--Om het product te verwijderen (Gaby) -->
                                @csrf
                                <button type="submit">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Totaal: €{{ number_format($totalPrice, 2) }}</h3> <!-- De totale prijs met twee decimalen tonen (Gaby) --> 
        <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Afrekenen</a> <!-- Naar de checkout kunnen gaan (Gaby) -->
        <a class="btn btn-primary" href="{{ route('cart.webshop') }}">Verder winkelen</a> 
    @endif
@endsection
