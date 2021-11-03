@extends('Client.templateCliente')

@section('contacto')

    <div class="tituloSeccion">
        <h1>¿Queja o sujerencia?<br/>¡¡¡Contáctanos!!!</h1>
    </div>
    @if(session()->has('ok'))
        <h2 style="color:blue">{{session()->get('ok')}}</h2>
    @elseif(session()->has('error'))
        <h2 style="color:blue">{{session()->get('error')}}</h2>
    @endif
    <div>
        <form action="{{route('generarContacto')}}" method="POST" class="formularioWhite">
        @csrf
            <fieldset id="complete">
                <input placeholder="Nombre" type="number" tabindex="1" name="idCliente" required autofocus>
            </fieldset>
            <fieldset id="complete">
                <textarea placeholder="Escribe tu mensaje" tabindex="4" name="mensaje" required></textarea>
            </fieldset>
            <fieldset class="tituloSeccion">
                <button type="submit" id="contact-submit" data-submit="...Enviando">Enviar</button>
            </fieldset>
        </form>
    </div>
    <div class="formularioOrange">
    <h2>Visita nuestras redes sociales</h2>
        </br>
        <a href="https://www.facebook.com/"><img src="imagenes/Redes sociales/P facebook.jpg" alt="facebook"/></a>
        <div></div>
        <a href="https://www.instagram.com/?hl=es-la"><img src="imagenes/Redes sociales/P instagram.jpg" alt="instagram"/></a>
        <div></div>
        <a href="https://twitter.com/?lang=es"><img src="imagenes/Redes sociales/P twiter.jpg" alt="twiter"/></a>
        <div></div>
        <a href="https://www.youtube.com/"><img src="imagenes/Redes sociales/P youtube.jpg" alt="youtube"/></a>
    </div>
@endsection