<form action="{{route($ruta)}}" method="POST" class="row g-3">
    @if($ruta == 'updateUser')
        <input type="hidden" name="id" id="id" value="{{$User['id']}}" class="form-control" required>
    @else
        @csrf
    @endif
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" id="name" value="{{$User['name']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Direccion</label>
        <input type="text" name="direccion" id="direccion" value="{{$User['direccion']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Referencia</label>
        <input type="text" name="referencia" id="referencia" value="{{$User['referencia']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Rol</label>
        <input type="text" name="rol" id="rol" value="{{$User['rol']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" name="email" id="email" value="{{$User['email']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="password" id="password" value="{{$User['password']}}" class="form-control" required>
    </div>
    @if($ruta != 'updateUser')
        <button type="submit" class="btn btn-primary">Registrar</button>
    @endif
</form>