

@extends('layout.layout')



@section('content')




<div class="webshop"> 
<div class="titel"> <h1> Webshop</h1> </div>
<ul class="producten">
    @foreach($products as $product)
        <li>
            <!-- Laat de product naam zien in hoofdletter en prijs (Gaby) -->
            <strong>{{ $product->name }}</strong> 
            <!-- De prijs --> 
             <br> 
            <strong> Prijs</strong> €{{ $product->price }} 
            
          
        
             <!-- Laat product information zien -->
            <p><strong>Information:</strong> {{ $product->productInformation }}</p>

            

            <!-- Laat de specications zien (Gaby) -->
            <p><strong>Specifications:</strong> {{ $product->specifications }}</p>
            
           

              <!-- Laat afbeedling van product zien / Als die er is/ (Gaby)-->
              @if($product->picture)
                <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->name }}" style="max-width: 100px;">
            @else
                <p>Geen afbeelding </p>
            @endif
           

            <!-- Voeg de product aan winkelmandhe (Gaby)-->
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Toevoegen aan winkelmandje</button>  
            </form>
        </li>
        <hr>
    @endforeach
</ul>

    </div>
</div> 
    
   

