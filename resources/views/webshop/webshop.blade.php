@extends('layout.layout')

@section('content')


    <div class="titel"><h1>Webshop</h1></div>
    <div class="webshop">
    <!-- Toon de melding als de gebruiker niet is ingelogd (Gaby) -->

    <!-- Toon de afbeelding van het winkelmandje als de gebruiker is ingelogd (Gaby) -->
    @auth
    <div class="winkelmandje-icon">
        <a href="{{ route('cart.index') }}">
            <img src="{{ asset('foto\'s/cartIcoon.png') }}" alt="Winkelmandje" style="width: 40px; height: 40px; vertical-align: middle; margin-bottom: 20px;">
        </a>
    </div>
    @endauth

    <!-- Toon de melding als de gebruiker niet is ingelogd -->

    @guest
        <p class="text-danger">Je moet inloggen om producten toe te voegen aan je winkelmandje.</p>
    @endguest

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

                <!-- Verberg de knop als de gebruiker niet is ingelogd -->
                @auth
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                 @csrf
                     <button type="submit" class="btn btn-primary">
                       <img src="{{ asset('foto\'s/cartIcoon.png') }}" alt="Winkelmandje" style="width: 20px; height: 20px; vertical-align: middle; margin-right: 5px;">
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
