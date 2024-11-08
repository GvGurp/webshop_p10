@extends('layout.layout')

@section('content')
<div class="container">
    
    <!-- Titel -->
    <div class="titel">
        <h1>Webshop</h1>
    </div>
    <form id="search-form" action="{{ route('product.search') }}" method="GET">
        <input type="text" name="query" placeholder="Zoek naar producten..." value="{{ request('query') }}" required>
        <button type="submit">Zoeken</button>
    </form>
    
    <!-- Div voor dynamische zoekresultaten -->
    <div id="search-results"></div>
    
    
    <!-- Filter en winkelmandje linksboven -->
    <div class="top-left">
        @auth
            <!-- Winkelmandje-icoon -->
            <div class="winkelmandje-icon">
                <a href="{{ route(name: 'cart.index') }}">
                    <img src="{{ asset('foto\'s/cartIcoon.png') }}" alt="Winkelmandje" style="inline-size: 40px; block-size: 40px;">
                </a>
            </div>
        @endauth

        <!-- Filter opties -->
        <div class="filters">
            <form method="GET" action="{{ route('cart.index') }}">
                <h3>Categorieën</h3>
                @if (isset($categories) && $categories->isNotEmpty())
                @foreach($categories as $category)
                    <label>
                        <input type="checkbox" name="category[]" value="{{ $category->id }}"
                        {{ in_array($category->id, request('category', [])) ? 'checked' : '' }}>
                        {{ $category->name }}
                    </label><br>
                @endforeach
                @endif

                <h3>Max Prijs</h3>
                <input type="number" name="max_price" value="{{ request('max_price', 3000) }}" min="100" max="3000">
                <button type="submit">Filteren</button>
            </form>
        </div>
    </div>

    <!-- Toon een melding als de gebruiker niet is ingelogd -->
    @guest
        <p class="text-danger">Je moet inloggen om producten toe te voegen aan je winkelmandje.</p>
    @endguest

    <!-- Producten sectie aan de rechterkant -->
    <ul class="producten">
        @foreach($products as $product)
            <li>
                <strong>{{ $product->name }}</strong><br>
                <strong>Prijs:</strong> €{{ $product->price }}
                <p><strong>Informatie:</strong> {{ $product->productInformation }}</p>
                <p><strong>Specificaties:</strong> {{ $product->specifications }}</p>

                @if($product->picture)
                    <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->name }}" style="max-inline-size: 100px;">
                @else
                    <p>Geen afbeelding</p>
                @endif

                <!-- Toevoegen aan winkelmandje en verwijderen knop als de gebruiker is ingelogd -->
                @auth
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            <img src="{{ asset('foto\'s/cartIcoon.png') }}" alt="Winkelmandje" style="inline-size: 20px; block-size: 20px; vertical-align: middle; margin-right: 5px;">
                            Toevoegen aan winkelmandje
                        </button>
                    </form>
                @endauth
            </li>
            <hr>
        @endforeach
    </ul>
</div>
@endsection