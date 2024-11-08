@extends('layout.layout')

@section('content')
<div class="container">
    <h1>Product Wijzigen</h1>

    <form action="{{ route('adminUpdate', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')  <!-- Dit zorgt ervoor dat het formulier een PUT-verzoek stuurt -->

        <div class="form-group">
            <label for="name">Product Naam</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="form-group">
            <label for="price">Prijs</label>
            <input type="text" class="form-control" name="price" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Categorie</label>
            <select class="form-control" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="productInformation">Productinformatie</label>
            <textarea class="form-control" name="productInformation">{{ old('productInformation', $product->productInformation) }}</textarea>
        </div>

        <div class="form-group">
            <label for="specifications">Specificaties</label>
            <textarea class="form-control" name="specifications">{{ old('specifications', $product->specifications) }}</textarea>
        </div>

        <div class="form-group">
            <label for="picture">Afbeelding</label>
            <input type="file" class="form-control" name="picture">
        </div>

        <button type="submit" class="btn btn-primary">Product Bijwerken</button>
    </form>
</div>
@endsection
