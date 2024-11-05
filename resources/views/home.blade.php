@extends('layout.layout')


@section('content')

<input type="text" id="search" placeholder="Zoek naar producten...">
<div id="search-results" style="position: relative;"></div>

<!-- Modal voor productdetails -->
<div id="product-modal" style="display: none;">
    <div id="modal-content">
        <span id="close-modal">&times;</span>
        <h2 id="product-name"></h2>
        <p id="product-description"></p>
        <p>Prijs: <span id="product-price"></span></p>
    </div>
</div>
<main id="mainhome">
<div id="hometext">


     <img src="{{ asset('foto\'s/cropped-logo UNEED-IT(notext).png') }}" alt="De logo van UNEED-IT">
  
    <p><span class="white-text">voor al uw reparaties kunt u terecht bij </span><span class="red-text">Uneed-</span><span  class="blue-text">it</span></p>
</div>
</main>
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
