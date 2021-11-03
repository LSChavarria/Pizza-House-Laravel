<form action="{{route($ruta)}}" method="POST" class="row g-3">
    @if($ruta == 'updateOrden')
        <input type="hidden" name ="id" id="id" value="{{$Orden['id']}}" class="form-control" required>
    @else
        @csrf
    @endif
    <div class="mb-3">
        <label class="form-label">Id Pizza</label>
        <input type="number" name ="idPizza" id="idPizza" value="{{$Orden['idPizza']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Id Cliente</label>
        <input type="number" name ="idCliente" id="idCliente" value="{{$Orden['idCliente']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name ="nombre" id="nombre" value="{{$Orden['nombre']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Direccion</label>
        <input type="text" name ="direccion" id="direccion" value="{{$Orden['direccion']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Referencia</label>
        <input type="text" name ="referencia" id="referencia" value="{{$Orden['referencia']}}" class="form-control" required>
    </div>
    @if($ruta != 'updateOrden')
        <button type="submit" class="btn btn-primary">Registrar</button>
    @endif
</form>