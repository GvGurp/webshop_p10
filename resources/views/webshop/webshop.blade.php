@extends('layout.layout')

@section('content')
<div class="webshop">
    <div class="titel"><h1>Webshop</h1></div>

    <!-- Filters -->
    <div class="filters">
        <form method="GET" action="{{ route('cart.webshop') }}">
            <h3>Categorieën</h3>
            @foreach($categories as $category)
                <label>
                    <input type="checkbox" name="category[]" value="{{ $category->id }}"
                    {{ in_array($category->id, request('category', [])) ? 'checked' : '' }}>
                    {{ $category->name }}
                </label><br>
            @endforeach

            <h3>Max Prijs</h3>
            <input type="number" name="max_price" value="{{ request('max_price', 3000) }}" min="100" max="3000">
            <button type="submit">Filteren</button>
        </form>
    </div>

    <ul class="producten">
        @foreach($products as $product)
            <li>
                <strong>{{ $product->name }}</strong>
                <br>
                <strong>Prijs:</strong> €{{ $product->price }}
                <p><strong>Information:</strong> {{ $product->productInformation }}</p>
                <p><strong>Specifications:</strong> {{ $product->specifications }}</p>

                @if($product->picture)
                    <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->name }}" style="max-width: 100px;">
                @else
                    <p>Geen afbeelding</p>
                @endif

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Toevoegen aan winkelmandje</button>
                </form>
            </li>
            <hr>
        @endforeach


        
    </ul>
</div>
@endsection
