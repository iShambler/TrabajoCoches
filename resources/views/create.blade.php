<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('coches.store')}}" method="post">
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
        <button type="submit">Enviar</button>
    </form>
</body>
</html>