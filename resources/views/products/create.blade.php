<h1>Formulier</h1>

<form action="{{ url('/products') }}" method="POST"> 
     
    @csrf
     
    <label for="product">Naam van product</label>
     
    @error('name') <span style="color: red;">{{$message}}</span> @enderror
    @error('price') <span style="color: yellow;">{{$message}}</span> @enderror
     
    <input type="text" name="name" id="name" value="laptop">
    <input type="text" name="price" id="price" value="5">

    <input type="submit"> 
</form>