@extends('layout.layout')

@section('content')
<main id="mainhome">
    <div id="hometext" class="content-container">
        <!-- Logo afbeelding en tekst -->
        <img src="{{ asset('foto\'s/cropped-logo UNEED-IT(notext).png') }}" alt="De logo van UNEED-IT">
        <h1>Voor al uw reparaties kunt u terecht bij <span class="highlighted">Uneed</span><span class="highlighted2"> - it</span></h1>
    </div>

    <!-- Zoekbalk -->
    <div class="search-container">
        <input type="text" id="search" class="search-input" placeholder="Zoek naar producten...">
        <div id="search-results" class="search-results"></div>
    </div>

    <!-- Modal voor productdetails -->
    <div id="product-modal" class="modal" style="display: none;">
        <div id="modal-content" class="modal-content">
            <span id="close-modal" class="close-modal">&times;</span>
            <h2 id="product-name" class="modal-title"></h2>
            <p id="product-description" class="modal-description"></p>
            <p>Prijs: <span id="product-price" class="modal-price"></span></p>
        </div>
    </div>
</main>
@endsection

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#search').on('keyup', function() {
        let query = $(this).val();
        if (query.length > 0) {
            $.ajax({
                url: '{{ route('search.product') }}', // Zorg ervoor dat deze route correct is
                type: 'GET',
                data: { query: query },
                success: function(data) {
                    let results = '';
                    if (data.length > 0) {
                        data.forEach(function(product) {
                            results += `<div class="result-item" data-id="${product.id}">${product.name}</div>`;
                        });
                    } else {
                        results = '<div>Geen resultaten gevonden</div>';
                    }
                    $('#search-results').html(results);
                }
            });
        } else {
            $('#search-results').html(''); // Wis de resultaten als de zoekbalk leeg is
        }
    });

    // Klik event voor de zoekresultaten
    $(document).on('click', '.result-item', function() {
        let productId = $(this).data('id');
        $.ajax({
            url: '/product/' + productId, // Route om productdetails op te halen
            type: 'GET',
            success: function(product) {
                $('#product-name').text(product.name);
                $('#product-description').text(product.description);
                $('#product-price').text(product.price);
                $('#product-modal').show();
            }
        });
    });

    // Sluit de modal
    $('#close-modal').on('click', function() {
        $('#product-modal').hide();
    });

    $(window).on('click', function(event) {
        if (event.target == document.getElementById('product-modal')) {
            $('#product-modal').hide();
        }
    });
});
</script>
