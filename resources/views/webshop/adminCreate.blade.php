@extends('layout.layout')


@section('content')
    <h1> Webshop</h1>
<p> voeg hier ur product aan de webshop/database!</p>
    <form action="{{ url('/adminCreate') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Productnaam">
        <input type="text" name="price" placeholder="Prijs">
        <select name="category" id="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name}}</option>
            @endforeach
          </select>

        <input type="text" name="specifications" placeholder="specifications">
        <input type="text" name="picture" placeholder="Picture">
        <input type="text" name="productInformation" placeholder="productInformation">
        <button type="submit">Toevoegen</button>
    </form>





{{--        ///crud-show (tishanty)///--}}
{{--        <ul>--}}
{{--            @foreach($products as $product)--}}
{{--                <li>{{$product->name}} -{{$product->price}}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
@endsection


