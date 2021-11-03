<form action="{{route($ruta)}}" method="POST" class="row g-3">
    @if($ruta == 'updateMensajeCliente')
        <input type="hidden" name ="id" id="id" value="{{$MensajeCliente['id']}}" class="form-control" required>
    @else
        @csrf
    @endif
    <div class="mb-3">
        <label class="form-label">ID Cliente</label>
        <input type="number" name ="idCliente" id="idCliente" value="{{$MensajeCliente['idCliente']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Mensaje</label>
        <input type="text" name ="mensaje" id="mensaje" value="{{$MensajeCliente['mensaje']}}" class="form-control" required>
    </div>
    @if($ruta != 'updateMensajeCliente')
        <button type="submit" class="btn btn-primary">Registrar</button>
    @endif
</form>