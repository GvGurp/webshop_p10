
@extends('layout.layout')

@section('content')
    <h1>Winkelmandje</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($cart)
        <table>  <!--Tabel voor de product informatie in de winkelmandje (Gaby) --> 
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
                        <td>{{ $details['total'] }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Totaal: €{{ number_format($totalPrice, 2) }}</h3> <!-- de totale prijs laten zien met maar twee dicimalen (Gaby)--> 
        <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Afrekenen</a> <!--naar de chechout kunnen gaan (Gaby) -->
      @else
      <!-- Als er niks in je winkelmandje staat komt deze tekst (Gaby) -->
        <p>Je winkelmandje is leeg.</p>
    @endif
@endsection
