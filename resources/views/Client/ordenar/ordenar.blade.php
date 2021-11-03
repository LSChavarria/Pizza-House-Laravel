@extends('Client.templateCliente')

@section('ordenar')
    <div class="tituloSeccion">
        <h1>¿Hambre?<br/>Ordena tu pizza favorita</h1>
    </div>
    @if(session()->has('ok'))
        <h2 style="color:blue">{{session()->get('ok')}}</h2>
    @elseif(session()->has('error'))
        <h2 style="color:blue">{{session()->get('error')}}</h2>
    @endif
    <form action="{{route('generarOrden')}}" method="POST" class="formularioOrange">
        @csrf
        <p>Qué pizza desea?</p>
        <select name="idPizza" class="pedido" id="media">
            @foreach($pizzas as $pizza)
                <option value="{{$pizza->id}}" selected>{{$pizza->nombre}}</option>
            @endforeach
        </select>
        <fieldset class="tituloSeccion" id="media">
            <button onclick="agregarOrden()" style="width: 100%; height: 40px;" type="button" id="contact-submit">Agregar producto</button>
        </fieldset>

        <div id="render" style="width: 100%">
            @include('Client.ordenar.listaPedidos')
        </div>

        <br>
        <br>

        <fieldset id="media">
            <input placeholder="Id" type="number" tabindex="1" name="idCliente" required autofocus>
        </fieldset>
        <fieldset id="media">
            <input placeholder="Nombre" type="text" tabindex="1" name="nombre" required autofocus>
        </fieldset>
    
        <p>Ingresa tu direccion</p>
    
        <fieldset id="complete">
            <input placeholder="Direccion" type="text" tabindex="3" name="direccion" required>
        </fieldset>
        <fieldset id="complete">
            <input placeholder="Danos una referencia de la direcion (tienda, monumento, calle, etc.)" tabindex="4" name="referencia" required></textarea>
        </fieldset>
        <fieldset class="tituloSeccion">
            <button type="submit" id="contact-submit" data-submit="...Enviando">Enviar</button>
        </fieldset>
    </form>

    <script type="text/javascript">
        function agregarOrden() {
            var pedido = document.getElementsByClassName('pedido')[0].value;
            var token = '{{csrf_token()}}';
            var data = {pedido:pedido, _token:token};
            console.log(data)
            $.ajax(
                {
                    type: 'POST',
                    url:'{{route("agregarOrden")}}',
                    data:data,
                    success:function(data) {
                        document.getElementById('render').innerHTML = data.html;
                    }
                }
            );
        };
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection