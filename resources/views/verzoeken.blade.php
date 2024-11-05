@extends('layout.layout')

@section('content')
    <h1>Nieuw Verzoek Aanmaken</h1>

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

        <label for="omschrijving">Omschrijving:</label>
        <textarea id="omschrijving" name="omschrijving" required></textarea><br>

        <label for="typemachine">Typemachine:</label>
        <input type="text" id="typemachine" name="typemachine" required><br>

        <label for="garantie">Garantie:</label>
        <input type="text" id="garantie" name="garantie" required><br>

        <label for="datum">Datum:</label>
        <input type="date" id="datum" name="datum" required><br>

        <label for="password">Wachtwoord ter bevestiging:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Verzoek indienen</button>
    </form>
@endsection
