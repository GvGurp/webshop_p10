@extends('layout.layout')

@section('content')
<div class="container">
    <h1>Beheer Producten</h1>

    <!-- Lijst van alle producten -->
    @foreach($products as $product)
        <div class="product">
            <h2>{{ $product->name }}</h2>
            <p>Prijs: €{{ $product->price }}</p>
            <p>{{ $product->productInformation }}</p>

            <!-- Wijzig product knop (link naar bewerkpagina) -->
            <a href="{{ route('adminEditForm', $product->id) }}" class="btn btn-warning">Wijzig Product</a>

            <!-- Verwijder product -->
            <form action="{{ route('products.showDeleteConfirmation', $product->id) }}" method="GET" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Verwijder Product</button>
            </form>
        </div>
        <hr>
    @endforeach
</div>
@endsection