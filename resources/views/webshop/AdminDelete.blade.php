@extends('layout.layout')

@section('content')
<div class="admin-webshop">
    <div class="titel"><h1>Product Verwijderen</h1></div>

    <!-- Tabel met productinformatie (Gaby) -->
    <table class="table">
        <thead>
            <tr>
                <th>Product Naam</th>
                <th>Prijs</th>
                <th>Informatie</th>
                <th>Specificaties</th>
                <th>Afbeelding</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $product->name }}</td>
                <td>€{{ $product->price }}</td>
                <td>{{ $product->productInformation }}</td>
                <td>{{ $product->specifications }}</td>
                <td>
                    @if($product->picture)
                        <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->name }}" style="max-width: 100px;">
                    @else
                        Geen afbeelding
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Verwijderbevestiging formulier -->
    <form action="{{ route('products.confirmDelete', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <!-- Inloggegevens invoeren -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Wachtwoord:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-check">
            <input type="checkbox" name="confirm_delete" id="confirm_delete" class="form-check-input" required>
            <label for="confirm_delete" class="form-check-label">
                Ik begrijp dat dit product definitief verwijderd zal worden en niet meer terug te vinden is.
            </label>
        </div>

        <button type="submit" class="btn btn-danger mt-3">Verwijder Product</button>
    </form>

    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error')) <!-- Display the error message -->
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif
</div>
@endsection
