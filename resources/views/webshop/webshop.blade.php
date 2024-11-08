@extends('layout.layout')

@section('content')
<div class="webshop">
    <div class="titel">
        <h1>Webshop</h1>
        <div class="winkelmandje-icon">
            <a href="{{ route('cart.index') }}">
                <img src="{{ asset('foto\'s/cartIcoon.png') }}" alt="Winkelmandje" style="inline-size: 40px; block-size: 40px;">
            </a>
        </div>
    </div>

    <div class="alles">
        <div class="filters">
            <form method="GET" action="{{ route('products.index') }}">
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

        <div class="producten">
            @foreach($products as $product)
                <li>
                    <div class="product-info">
                        <strong>{{ $product->name }}</strong><br>
                        <strong>Prijs:</strong> €{{ $product->price }}<br>
                        <p><strong>Informatie:</strong> {{ $product->productInformation }}</p>
                        <p><strong>Specificaties:</strong> {{ $product->specifications }}</p>
                    </div>
                    <div class="product-image">
                        @if($product->picture)
                            <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->name }}">
                        @else
                            <p>Geen afbeelding</p>
                        @endif
                    </div>

                    @auth
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-primary">
                                <img src="{{ asset('foto\'s/cartIcoon.png') }}" alt="Winkelmandje" style="inline-size: 20px; block-size: 20px; vertical-align: middle; margin-right: 5px;">
                                Toevoegen aan winkelmandje
                            </button>
                        </form>
                    @endauth
                </li>
            @endforeach
        </div>
    </div>
</div>
@endsection
