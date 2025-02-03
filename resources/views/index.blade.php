<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos los coches</title>
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
</head>

<body>
    <h1>Todos los coches</h1>
    <a href="{{ route('coches.create') }}" class="create-link">Crear coche</a>
    
    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ route('coches.index') }}">
        <input type="text" name="marca" class="b" placeholder="Buscar por marca" value="{{ request('marca') }}">
        <button type="submit">Buscar</button>
    </form>

    <!-- Mostrar mensaje si no hay resultados -->
    @if (isset($mensaje))
        <div class="alert alert-warning">
            {{ $mensaje }}
        </div>
    @endif

    <!-- Mostrar coches si hay resultados -->
    @if ($coches->isNotEmpty())
        <div class="car-container">
            @foreach ($coches as $coche)
                <div class="car-item">
                    @if($coche->imagen)
                        <img src="{{ asset('storage/' . $coche->imagen) }}" alt="Imagen de {{$coche->marca}} {{$coche->modelo}}"
                            style="max-width: 100%; height: 60%;">
                    @endif
                    <div class="car-info">
                        <p><strong>Marca:</strong> {{$coche->marca}}</p>
                        <p><strong>Modelo:</strong> {{$coche->modelo}}</p>
                        <p><strong>Precio:</strong> {{$coche->precio}}</p>
                        <p><strong>Color:</strong> {{$coche->color}}</p>
                    </div>
                    <div class="car-actions">
                        <a href="{{ route('coches.edit', $coche->id) }}" class="edit-link">Editar</a>
                        <form class="delete-form" action="/coches/{{ $coche->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</body>

</html>
