@extends('layout.layout')

@section('content')
    <h1>Bestelling Details</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $order->id }}</td>
        </tr>
        <tr>
            <th>Stad</th>
            <td>{{ $order->city }}</td>
        </tr>
        <tr>
            <th>Straat</th>
            <td>{{ $order->street }}</td>
        </tr>
        <tr>
            <th>Postcode</th>
            <td>{{ $order->postcode }}</td>
        </tr>
        <tr>
            <th>Huisnummer</th>
            <td>{{ $order->house_number }}</td>
        </tr>
        <tr>
            <th>Telefoon</th>
            <td>{{ $order->phone }}</td>
        </tr>
        <tr>
            <th>Betaalmethode</th>
            <td>{{ $order->payment_method }}</td>
        </tr>
        <tr>
            <th>Totaalprijs</th>
            <td>{{ $order->total_price }}</td>
        </tr>
        <tr>
            <th>Voorwaarden geaccepteerd</th>
            <td>{{ $order->terms_accepted ? 'Ja' : 'Nee' }}</td>
        </tr>
        <tr>
            <th>Aangemaakt op</th>
            <td>{{ $order->created_at }}</td>
        </tr>
        <tr>
            <th>Bijgewerkt op</th>
            <td>{{ $order->updated_at }}</td>
        </tr>
    </table>

    <a href="{{ route('adminOverzicht') }}" class="btn btn-primary">Terug naar Overzicht</a>
@endsection
