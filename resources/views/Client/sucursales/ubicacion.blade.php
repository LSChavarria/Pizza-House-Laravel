@extends('Client.templateCliente')

@section('ubicacion')
    <div class="tituloSeccion">
        <h1>Ubica nuestas sucursales</h1>
    </div>

    <div id="render">
        @include('Client.sucursales.mapaSucursales')
    </div>

    <br>
    <br>
    <div class="formularioOrange">
        @for($i = 0; $i < count($sucursales); $i+=2)
            @if($ajustes['indice'] != $i)
                <table>
                    <tr id="ubicacion">
                        <td>{{$sucursales[$i]->nombre}}</td>
                        <td id="nothing"></td>
                        <td>{{$sucursales[$i+1]->nombre}}</td>
                    </tr>
                    
                    <tr id="datos">
                        <td>
                            Tel. {{$sucursales[$i]->telefono}}<br/>
                            {{$sucursales[$i]->direccion}}<br/>
                            Desde: {{$sucursales[$i]->apertura->year}}
                        </td>
                        <td id="nothing"></td>
                        <td>
                            Tel. {{$sucursales[$i+1]->telefono}}<br/>
                            {{$sucursales[$i+1]->direccion}}<br/>
                            Desde: {{$sucursales[$i+1]->apertura->year}}
                        </td>
                    </tr>
                </table>
            @else
            <table>
                <tr id="ubicacion">
                    <td>{{$sucursales[$i]->nombre}}</td>
                </tr>
                
                <tr id="datos">
                    <td>
                        Tel. {{$sucursales[$i]->telefono}}<br/>
                        {{$sucursales[$i]->direccion}}<br/>
                        Desde: {{$sucursales[$i]->apertura->year}}
                    </td>
                </tr>
			</table>
            @endif
        @endfor
    </div>

    <script type="text/javascript">
        function modificarSucursal() {
          var sucursal = document.getElementById('urlMapa').value;
          var token = '{{csrf_token()}}';
          var data = {urlMapa:sucursal, _token:token};
          $.ajax(
            {
              type: 'POST',
              url:'{{route("ubicacionSucursal")}}',
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