<form action="{{route($ruta)}}" method="POST" class="row g-3">
    @if($ruta == 'updatePromocion')
        <input type="hidden" name="id" id="id" value="{{$Promocion['id']}}" class="form-control" required>
    @else
        @csrf
    @endif
    <div class="mb-3">
        <label class="form-label">Id Pizza</label>
        <select name="idPizza" id="idPizza" class="form-select" aria-label="Default select example">
            @foreach($pizzas as $p)
                @if($selectedId == $p->id)
                    <option value="{{$p->id}}" selected>{{$p->nombre}}</option>
                @else
                    <option value="{{$p->id}}">{{$p->nombre}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Tipo de promocion</label>
        <input type="number" name="tipo" id="tipo" value="{{$Promocion['tipo']}}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Descuento</label>
    </div>
    @if($ruta != 'updatePromocion')
        <button type="submit" class="btn btn-primary">Registrar</button>
    @endif
</form>