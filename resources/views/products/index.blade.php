<h1> Welkom bij onze producten</h1>


<a href=""> maak nieuw product aan</a>

<ul> 
@foreach($products as $product)

<a href={{url('/products')}}> 
    <li> {{ $product->name }}</li>
    <li> {{ $product->price}}</li>
</a>

@endforeach

</ul>