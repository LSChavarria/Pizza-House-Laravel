<form action="{{route($ruta)}}" method="POST" class="row g-3">
    @if($ruta == 'updatePizza')
        <input type="hidden" name ="id" id="id" value="{{$Pizza['id']}}" class="form-control" required>
    @else
        @csrf
    @endif
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name ="nombre" id="nombre" value="{{$Pizza['nombre']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="Number" name ="precio" id="precio" value="{{$Pizza['precio']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Ingredientes</label>
        <input type="text" name ="ingredientes" id="ingredientes" value="{{$Pizza['ingredientes']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">URL Imagen</label>
        <input type="text" name ="urlImagen" id="urlImagen" value="{{$Pizza['urlImagen']}}" class="form-control" required>
    </div>
    @if($ruta != 'updatePizza')
        <button type="submit" class="btn btn-primary">Registrar</button>
    @endif
</form>