@extends('layout.layout')


@section('content')
<h1> Admin product aanmaken</h1>
 

<!--crud-create (tishanty) --> 
  <form action="{{ url('/webshop') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Productnaam">
        <input type="text" name="price" placeholder="Prijs">
        <button type="submit">Toevoegen</button>
    </form>

    @endsection


    
   