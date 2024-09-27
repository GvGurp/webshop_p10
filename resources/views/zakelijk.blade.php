@extends('layout.layout')


@section('content')
<main id="mainZakelijk">
    <div class="block-text">
        <h1>Welkom!</h1>
        <p>We zijn blij om u te kunnen helpen. Hoe kunnen wij assisteren?</p>
        <div class="buttons">
            <button onclick="checkLoginStatus()">Ontvang hulp</button>
            <button id="verzoekenBtn" style="display: none;" onclick="viewRequests()">Verzoeken bekijken</button>
        </div>
    </div>
</main>
<script>
    window.onload = function() {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "checkUserRole.php", true);
        xhr.onload = function() {
            if (xhr.status == 200) {
                if (xhr.responseText.trim() === "admin") {
                    document.getElementById("verzoekenBtn").style.display = "block";
                    document.getElementById("verzoekenBtn").addEventListener("click", function() {
                        window.location.href = "verzoeken.php";
                    });
                }
            }
        };
        xhr.send();
    };
</script>
@endsection