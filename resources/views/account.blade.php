<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Account</title>
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    </head>
<body>
<nav id="navbar">
    <div id="logonav">
        <img src="{{ asset('Photos/cropped-logo%20UNEED-IT.png') }}">
    </div>
    <div id="logoptions">
        <ul>
            <li class="redc"> <a href="{{ url('home') }}">Home</a> </li>
            <li class="bluec"> <a href="{{ url('OverOns') }}">Over ons</a></li>
            <li class="redc"> <a href="{{ url('service') }}">Service</a></li>
            <li class="bluec" > <a href="{{ url('zakelijk') }}">Zakelijk</a></li>
            <li class="redc"> <a href="{{ url('faq') }}">Faq</a> </li>
            <li class="bluec"><a href="{{ url('Bezorgdiensten') }}"> Bezorgdiensten</a></li>
            <li class="redc"> <a href="{{ url('account') }}">Account</a> </li>
        </ul>
    </div>
</nav>
<main id="mainAccount">
    <div class="account-info">
        <h1>My Account</h1>
        <div class="info-block">
            @if ($user)
                <p><strong>Naam:</strong> {{ $user['naam'] }}</p>
                <p><strong>Telefoonnummer:</strong> {{ $user['telefoonnummer'] }}</p>
                <p><strong>Adres:</strong> {{ $user['address'] }}</p>
                <p><strong>Email:</strong> {{ $user['email'] }}</p>
            @else
                <script>window.location.href = '{{ url('login_or_signup.html') }}';</script>
            @endif
        </div>
    </div>
    <div class="edit-info" style="display: none;">
        <h1>Edit Information</h1>
        <div class="changeForm">
            <form id="changeInfoForm" action="{{ url('changeinfo.php') }}" method="post" onsubmit="handleFormSubmission()">
                <label for="newName">New Name:</label><br>
                <input type="text" id="newName" name="newName" value="{{ $user['naam'] }}"><br>
                <label for="newPhoneNumber">New Phone Number:</label><br>
                <input type="text" id="newPhoneNumber" name="newPhoneNumber" value="{{ $user['telefoonnummer'] }}"><br>
                <label for="newAddress">New Address:</label><br>
                <input type="text" id="newAddress" name="newAddress" value="{{ $user['address'] }}"><br>
                <label for="newEmail">Email:</label><br>
                <input type="text" id="newEmail" name="newEmail" value="{{ $user['email'] }}"><br>

                <div class="button-group">
                    <button type="submit" style="background-color: mediumturquoise;">Wijzigingen opslaan</button>
                    <button type="button" onclick="cancelChanges()" id="cancelButton" style="background-color: red;">Cancel Changes</button>
                </div>
            </form>
        </div>
    </div>

    <div class="buttons">
        <button id="editButton">Informatie bewerken</button>

        <form action="{{ url('logout.php') }}" method="post">
            <button type="submit" name="logout">Log Out</button>
        </form>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function toggleEdit() {
            var infoBlock = document.querySelector('.info-block');
            var editBlock = document.querySelector('.edit-info');
            var editButton = document.getElementById('editButton');
            var cancelButton = document.getElementById('cancelButton');

            if (infoBlock.style.display === 'none') {
                infoBlock.style.display = 'block';
                editBlock.style.display = 'none';
                editButton.style.display = 'block';
                cancelButton.style.display = 'none';
            } else {
                infoBlock.style.display = 'none';
                editBlock.style.display = 'block';
                editButton.style.display = 'none';
                cancelButton.style.display = 'block';
                populateForm();
            }
        }

        function populateForm() {
            var user = @json($user);
            document.getElementById('newName').value = user.naam;
            document.getElementById('newPhoneNumber').value = user.telefoonnummer;
            document.getElementById('newAddress').value = user.address;
            document.getElementById('newEmail').value = user.email;
        }

        function cancelChanges() {
            var infoBlock = document.querySelector('.info-block');
            var editBlock = document.querySelector('.edit-info');
            var editButton = document.getElementById('editButton');
            var cancelButton = document.getElement;
</script>