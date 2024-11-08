@extends('layout.layout')

@section('content')
    <h1>Admin Overzicht - Bestellingen</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Stad</th>
                <th>Straat</th>
                <th>Postcode</th>
                <th>Huisnummer</th>
                <th>Totaalprijs</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->street }}</td>
                    <td>{{ $order->postcode }}</td>
                    <td>{{ $order->house_number }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>
                        <a href="{{ route('adminOrderDetails', $order->id) }}" class="btn btn-info">Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
