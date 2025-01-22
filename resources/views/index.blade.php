<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Todos los coches</h1>
    @foreach ($coches as $coche)
        <p>{{$coche->marca}} - {{$coche->modelo}} - {{$coche->precio}} - {{$coche->color}}</p>
        <p><a href="{{route('coches.edit', $coche->id)}}">Editar</a></p>
        <form action="/coches/{{ $coche->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    @endforeach
    <a href="{{route('coches.create')}}">Crear coche</a>

</body>
</html>