@extends('layout.layout')


@section('content')
<div class="container">
    <h1>Omschrijf zo duidelijk mogelijk het defect:</h1>
    <form action="submit_request.php" method="post" enctype="multipart/form-data">
        <label for="defect">Omschrijving:</label><br>
        <textarea id="defect" name="defect" rows="6" cols="50" required></textarea><br>

        <label for="machine">Type machine:</label><br>
        <select id="machine" name="machine" required>
            <option value="Niet gespecificeerd">Niet gespecificeerd</option>
            <option value="Apple">Apple</option>
            <option value="Computer">Computer</option>
            <option value="Tablet">Tablet</option>
            <option value="Laptop">Laptop</option>
            <option value="Smartphone">Smartphone</option>
            <option value="Tarieven computer">Tarieven computer</option>
            <option value="Tarieven Apple">Tarieven Apple</option>
        </select><br>

        <label for="garantie">Garantie:</label><br>
        <select id="garantie" name="garantie" required>
            <option value="ja">Ja</option>
            <option value="nee">Nee</option>

        </select><br>

        <label for="datum">Datum:</label><br>
        <input type="date" id="datum" name="datum" required><br>

        <label for="photo">Foto (optioneel):</label><br>
        <input type="file" id="photo" name="photo"><br>

        <input type="hidden" name="idvanklant" value="<?php echo $idvanklant; ?>">
        <input type="hidden" name="Naam" value="<?php echo $_SESSION['user']['naam']; ?>">
        <input type="hidden" name="email" value="<?php echo $_SESSION['user']['email']; ?>">
        <input type="hidden" name="password" value="<?php echo $_SESSION['user']['password']; ?>">


        <input type="submit" value="Verzenden">

    </form>
</div><div class="container">
    <h1>Omschrijf zo duidelijk mogelijk het defect:</h1>
    <form action="submit_request.php" method="post" enctype="multipart/form-data">
        <label for="defect">Omschrijving:</label><br>
        <textarea id="defect" name="defect" rows="6" cols="50" required></textarea><br>

        <label for="machine">Type machine:</label><br>
        <select id="machine" name="machine" required>
            <option value="Niet gespecificeerd">Niet gespecificeerd</option>
            <option value="Apple">Apple</option>
            <option value="Computer">Computer</option>
            <option value="Tablet">Tablet</option>
            <option value="Laptop">Laptop</option>
            <option value="Smartphone">Smartphone</option>
            <option value="Tarieven computer">Tarieven computer</option>
            <option value="Tarieven Apple">Tarieven Apple</option>
        </select><br>

        <label for="garantie">Garantie:</label><br>
        <select id="garantie" name="garantie" required>
            <option value="ja">Ja</option>
            <option value="nee">Nee</option>

        </select><br>

        <label for="datum">Datum:</label><br>
        <input type="date" id="datum" name="datum" required><br>

        <label for="photo">Foto (optioneel):</label><br>
        <input type="file" id="photo" name="photo"><br>

        <input type="hidden" name="idvanklant" value="<?php echo $idvanklant; ?>">
        <input type="hidden" name="Naam" value="<?php echo $_SESSION['user']['naam']; ?>">
        <input type="hidden" name="email" value="<?php echo $_SESSION['user']['email']; ?>">
        <input type="hidden" name="password" value="<?php echo $_SESSION['user']['password']; ?>">


        <input type="submit" value="Verzenden">

    </form>
</div>
@endsection