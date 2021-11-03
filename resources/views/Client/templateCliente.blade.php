<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>House Pizza</title>
		<link rel="stylesheet" href="css/Generico.css"/>
		@yield('cssSelect')
		<link rel="icon" type="image/jpg" href="imagenes/Logo/logo.jpg"/>
    </head>
    <body>
        <header>
			<div>
            	<a href="{{route('PaginaPrincipal')}}"><img src="imagenes/Logo/Encabezado.jpg" alt="Encabezado"/></a>
				<nav>
					<ul>
						<li><a href="{{route('menu')}}">MENU</a></li>
						<li><a href="{{route('promociones')}}">PROMOCIONES</a></li>
						<li><a href="{{route('ordenar')}}">ORDENAR</a></li>
						<li><a href="{{route('ubicacion')}}">UBICACION</a></li>
						<li><a href="{{route('contacto')}}">CONTACTANOS</a></li>
					</ul>
				</nav>
            </div>
		</header>
        
        <section>

            <!--Colocar yields-->
            @yield('menu')
            @yield('ordenar')
            @yield('promociones')
            @yield('contacto')
            @yield('ubicacion')

        </section>

        <footer>
			<table class="informacionDeContacto">
				<tr>
					<td>
						<strong>House Pizza<br/></strong>
						Oficinas principales:<br/>
						Contacto: house_pizza@pizza.com<br/>
						Tel. 01(81)83 50 56 78<br/>
						Av. Universidad #321, Col. Anahuac, 12345<br/>
						Nuevo Leon, San Nicolas de los Garza
					</td>
					<td><a href="{{route('PaginaPrincipal')}}"><img src="imagenes/Logo/Encabezado.jpg" alt="Encabezado"/></a></td>
				</tr>
			</table>
		</footer>
    </body>
</html>
