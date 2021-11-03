<div class="tituloSeccion">
    <form action="{{route('ubicacionSucursal')}}" method="POST" class="formularioWhite">
    <h3 style="color:red; font-size:20px;">Busca tu sucursal mas cercana: </h3>
        <select name="urlMapa" id="urlMapa" autocomplete="off">
            @foreach($sucursales as $s)
                @if($selectedId == $s->id)
                    <option value="{{$s->urlMapa}} {{$s->id}}" selected>{{$s->nombre}}</option>
                @else
                    <option value="{{$s->urlMapa}} {{$s->id}}">{{$s->nombre}}</option>
                @endif
            @endforeach
        </select>
        <fieldset class="tituloSeccion">
            <button type="button" id="contact-submit" onclick="modificarSucursal()" data-submit="...Enviando">Buscar</button>
        </fieldset>
    </form>
</div>

<div class="tituloSeccion">
    <iframe src="{{$urlMapa}}" width="800" height="400" style="border:6px solid red; border-radius:5px;" allowfullscreen="" loading="lazy"></iframe>
</div>