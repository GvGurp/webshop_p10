@extends('layout.layout')

@section('content')
<main id="mainAccount">
    
        @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
        @endif

    <div class="account-info">
        <h1>My Account</h1>
        <div class="info-block">
            <p><strong>Voornaam:</strong> {{ $user->firstname }}</p>
            <p><strong>Achternaam:</strong> {{ $user->lastname }}</p>
            <p><strong>Telefoonnummer:</strong> {{ $user->phonenumber }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
        <button id="editButton" onclick="toggleEdit()">Informatie bewerken</button> <!-- Knop om informatie te bewerken -->
    </div>

    <!-- Bewerken formulier voor het wijzigen van gegevens -->
    <div class="edit-info" style="display: none;"> <!-- Zorg ervoor dat het formulier niet zichtbaar is bij het laden -->
        <h1>Edit Information</h1>
        <form id="changeInfoForm" action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="newFirstname">Nieuwe Voornaam:</label><br>
            <input type="text" id="newFirstname" name="firstname" value="{{ $user->firstname }}"><br>

            <label for="newLastname">Nieuwe Achternaam:</label><br>
            <input type="text" id="newLastname" name="lastname" value="{{ $user->lastname }}"><br>

            <label for="newPhoneNumber">Nieuwe Telefoonnummer:</label><br>
            <input type="text" id="newPhoneNumber" name="phonenumber" value="{{ $user->phonenumber }}"><br>

            <label for="newEmail">Nieuwe Email:</label><br>
            <input type="email" id="newEmail" name="email" value="{{ $user->email }}"><br>

            <div class="button-group">
                <button type="submit" style="background-color: mediumturquoise;">Wijzigingen opslaan</button>
                <button type="button" onclick="toggleEdit()" style="background-color: red;">Annuleer</button>
            </div>
        </form>
    </div>
</main>

<script>
    function toggleEdit() {
        const infoBlock = document.querySelector('.info-block');
        const editBlock = document.querySelector('.edit-info');
        const editButton = document.getElementById('editButton');

        // Wissel tussen de informatie en het bewerkingsformulier
        if (editBlock.style.display === 'none') {
            infoBlock.style.display = 'none'; // Verberg de info
            editBlock.style.display = 'block'; // Toon het bewerkingsformulier
            editButton.style.display = 'none'; // Verberg de bewerkknop
        } else {
            infoBlock.style.display = 'block'; // Toon de info weer
            editBlock.style.display = 'none'; // Verberg het bewerkingsformulier
            editButton.style.display = 'block'; // Toon de bewerkknop weer
        }
    }
</script>
@endsection
