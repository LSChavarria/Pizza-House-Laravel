@extends('Client.templateCliente')

@section('promociones')
    <div class="tituloSeccion">
        <h1>Promociones</h1>
    </div>

    @if($sucursal != null)
        <div class="promociones" id="textoPromociones">
            {{$sucursal->nombre}}<break/>
            <h6>{{$sucursal->direccion}}</h6>
            <center><div></div></center>
            GRAN APERTURA<BR/>
            {{$sucursal->apertura}}
        </div>
    @endif
    <!--
    <img id="completo" src="imagenes/Anuncio/Anuncio promocion.jpg" alt="Anuncio promocion"/>
    -->
    <div class="formularioWhite">
        <p id="textoPromociones">¡CHECA NUESTROS DESCUENTOS!</p>
    </div>
    <table class="promos">
        <tbody>
            <tr>
                <td>
                    <img style="width:50%; margin-left:50%" src="imagenes/Pizzas/Pepperoni-Especial-compressor.png" alt="Peperoni especial"/>
                    <h3 style="width:50%; margin-left:50%; color:black">asdasd</h3>
                </td>
                <td class="precio-promocion">
                    <p class="rotate tres" style="color:black">
                        $169
                    </p>
                    <p class="rotate dos" style="color:orange">
                        $169
                    </p>
                    <p class="rotate uno" style="color:yellow">
                        $169
                    </p>
                </td>
            </tr>
            <tr>
                <td style="height:30px;"></td>
            </tr>
        </tbody>
    </table>
@endsection