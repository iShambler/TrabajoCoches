<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar coche</title>
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Editando los coches</h1>
    <form class="a" action="{{route('coches.update', $coche->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" value="{{$coche->marca}}">
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" value="{{$coche->modelo}}">
        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" value="{{$coche->precio}}">
        <label for="color">Color:</label>
        <input type="text" name="color" id="color" value="{{$coche->color}}">
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen">
        @if($coche->imagen)
        <img src="{{ asset('storage/'.$coche->imagen) }}" alt="Imagen del coche" style="max-width: 200px;">
    @endif
        <button type="submit">Enviar</button>
    </form>

    <a href="{{ route('coches.index') }}" class="back-button">Volver</a>
</body>
</html>