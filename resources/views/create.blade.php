<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear coche</title>
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Crear un coche</h1>
    <form action="{{route('coches.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca">
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo">
        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio">
        <label for="color">Color:</label>
        <input type="text" name="color" id="color">
        <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" id="imagen">
        <button type="submit">Enviar</button>
    </form>

    <a href="{{ route('coches.index') }}" class="back-button">Volver</a>
</body>
</html>
