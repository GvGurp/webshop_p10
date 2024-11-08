

@if($products->isNotEmpty())
    <div class="products">
        @foreach($products as $product)
            <div class="product">
                <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->productInformation }}</p>
                <p>{{ $product->specifications }}</p>
                <p>Prijs: €{{ number_format($product->price, 2, ',', '.') }}</p>
            </div>
        @endforeach
    </div>
@else
    <p>Geen producten gevonden.</p>
@endif