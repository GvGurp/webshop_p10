@extends('layout.layout')

@section('content')
<main id="mainRequest">
    <div class="content-container">
        <div class="content-header">
            <h1 class="content-title">Nieuw Verzoek Aanmaken</h1>
        </div>

        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('requests.create') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="omschrijving" class="form-label">Omschrijving:</label>
                <textarea id="omschrijving" name="omschrijving" required class="form-input"></textarea>
            </div>

            <div class="form-group">
                <label for="typemachine" class="form-label">Typemachine:</label>
                <input type="text" id="typemachine" name="typemachine" required class="form-input">
            </div>

            <div class="form-group">
                <label for="garantie" class="form-label">Garantie:</label>
                <input type="text" id="garantie" name="garantie" required class="form-input">
            </div>

            <div class="form-group">
                <label for="datum" class="form-label">Datum:</label>
                <input type="date" id="datum" name="datum" required class="form-input">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Wachtwoord ter bevestiging:</label>
                <input type="password" id="password" name="password" required class="form-input">
            </div>

            <button type="submit" class="submit-button">Verzoek indienen</button>
        </form>
    </div>
</main>
@endsection
