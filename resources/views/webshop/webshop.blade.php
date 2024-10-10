@extends('layout.layout')


@section('content')
<h1> Webshop</h1>



    <h1>{{ $product->name }}</h1>  <!--Producten kunnen toevoegen aan winkelmandje (Gaby) --> 
    <p>Prijs: €{{ number_format($product->price, 2) }}</p>

    <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Toevoegen aan winkelmandje</button>
    </form>


@endsections
@extends('layout.layout')


@section('content')
    <h1> Webshop</h1>

    <form action="{{ url('/webshop') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Productnaam">
        <input type="text" name="price" placeholder="Prijs">
        <button type="submit">Toevoegen</button>
    </form>





    ///crud-show (tishanty)///
    <ul>
        @foreach($products as $product)
            <li>{{$product->name}} -{{$product->price}}</li>
        @endforeach
    </ul>
@endsection
