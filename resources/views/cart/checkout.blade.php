@extends('layout.layout')

@section('content')
    <h1>Afrekenen</h1>

    @if($cart)  <!--Tabel voor de product informatie in de winkelmandje (Gaby) --> 
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Prijs</th>
                    <th>Aantal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $details) <!--Pak de producten in cart bij ID (Gaby) --> 
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>€{{ number_format($details['price'], 2) }}</td>
                        <td>{{ $details['total'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Totaal: €{{ number_format($totalPrice, 2) }}</h3> <!-- de totale prijs laten zien met maar twee dicimalen (Gaby)--> 

        <form action="/order" method="POST">
            @csrf
            <!--Je kan geen echte bestellingen hebben met betaling (Gaby) -->
            <button type="submit" class="btn btn-success">Bestelling plaatsen</button>
        </form>
    @else  <!-- Als je niks in je winkelmandje hebt(Gaby)--> 
        <p>Je winkelmandje is leeg.</p>
    @endif
@endsection
