<form action="{{route($ruta)}}" method="POST" class="row g-3">
    @if($ruta == 'updateSucursal')
        <input type="hidden" name ="id" id="id" value="{{$Sucursal['id']}}" class="form-control" required>
    @else
        @csrf
    @endif
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name ="nombre" id="nombre" value="{{$Sucursal['nombre']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Direccion</label>
        <input type="text" name ="direccion" id="direccion" value="{{$Sucursal['direccion']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Telefono</label>
        <input type="text" name ="telefono" id="telefono" value="{{$Sucursal['telefono']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Apertura (yyyy-mm-dd)</label>
        <input type="text" name ="apertura" id="apertura" value="{{$Sucursal['apertura']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">urlMapa</label>
        <input type="text" name ="urlMapa" id="urlMapa" value="{{$Sucursal['urlMapa']}}" class="form-control" required>
    </div>
    @if($ruta != 'updateSucursal')
        <button type="submit" class="btn btn-primary">Registrar</button>
    @endif
</form>