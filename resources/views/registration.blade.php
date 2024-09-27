@extends('layout.layout')


@section('content')
<main class="main-content">
    <div class="form-container">
        <h1 class="form-title">Registration</h1>
        <form id="registration-form" action="check.php" method="post">
            <label for="naam">Name:</label>
            <input type="text" name="naam" id="naam" placeholder="Name" required><br>
            <label for="telefoonnummer">Phone:</label>
            <input type="text" name="telefoonnummer" id="telefoonnummer" placeholder="Phone Number" required><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Email" required><br>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" placeholder="Address" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Password" required><br>
            <button type="submit">Register</button>
        </form>
    </div>
</main>
@endsection