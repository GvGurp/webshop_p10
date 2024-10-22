@extends('layout.layout')

@section('content')
<div class="edit-product">
    <h1>Wijzig Product: {{ $product->name }}</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Productnaam:</label>
        <input type="text" name="name" value="{{ $product->name }}" required><br>

        <label>Prijs:</label>
        <input type="number" name="price" value="{{ $product->price }}" step="0.01" required><br>

        <label>Categorie:</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select><br>

        <label>Productinformatie:</label>
        <textarea name="productInformation">{{ $product->productInformation }}</textarea><br>

        <label>Specificaties:</label>
        <textarea name="specifications">{{ $product->specifications }}</textarea><br>

        <label>Afbeelding:</label>
        @if($product->picture)
            <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->name }}" style="max-width: 100px;"><br>
        @endif
        <input type="file" name="picture"><br><br>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>

    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Terug naar productenlijst</a>
</div>
@endsection
