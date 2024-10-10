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
