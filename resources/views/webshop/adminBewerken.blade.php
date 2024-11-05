@extends('layout.layout')

@section('content')
<div class="admin-webshop">
    <div class="titel"><h1>Producten Beheren</h1></div>

    <ul class="producten">
        @foreach($products as $product)

            <li>
                <strong>{{ $product->name }}</strong><br>
                <strong>Prijs:</strong> €{{ $product->price }}<br>
                <p><strong>Informatie:</strong> {{ $product->productInformation }}</p>
                <p><strong>Specificaties:</strong> {{ $product->specifications }}</p>

                @if($product->picture)
                    <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->name }}" style="max-inline-size: 100px;">
                @else
                    <p>Geen afbeelding</p>
                @endif

                <!-- Knop om product te wijzigen -->
                <a href="{{ route('adminBewerken', $product->id) }}" class="btn btn-warning">
                    Wijzig Product
                </a>

                <!-- Knop om product te verwijderen -->
                @auth
                    
                        @csrf
                
                        <a href="{{ route('products.showDeleteConfirmation', $product->id) }}" class="btn btn-danger">
                            Verwijder Product
                        </a>
                    </form>
                @endauth
            </li>
            <hr>
        @endforeach
    </ul>
</div>
@endsection
