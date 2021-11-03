<!DOCTYPE html>

<html lang="en">

<html>

	<head>
		<meta charset="UTF-8">
		<title>House Pizza</title>
		<link rel="stylesheet" href="css/CSS Pagina Principal.css"/>
		<link rel="icon" type="image/jpg" href="imagenes/Logo/logo.jpg"/>
	</head>
	
	<body>
		<header>
			<img src="imagenes/Logo/logo.jpg" alt="House Pizza Logo"/>
		</header>
		
		<section>
			<div class="contenedor">
				<img src="imagenes/Logo/Cuadro naranja.png" alt="Base"/>
				<div id="naranja"><strong>LAS PIZZAS DEL HOGAR</strong></div>
			</div>
			<div class="contenedor">
				<img src="imagenes/Logo/Cuadro rojo.png" alt="Base"/>
				<div id="rojo">
					<strong>
						<a href="{{route('menu')}}">MENÚ</a>
						<hr/><br/>
						<a href="{{route('promociones')}}">PROMOCIONES</a>
						<br/>
						<a href="{{route('ordenar')}}">ORDENAR</a>
						<br/>
						<a href="{{route('ubicacion')}}">UBICACION</a>
						<hr/><br/>
						<a href="{{route('contacto')}}">CONTACTANOS</a>
					</strong>
				</div>
			</div>
			<div class="union">
				<img id="anuncio" src="imagenes/Anuncio/Anuncio.jpg" alt="Anuncio"/>
				<div id="fecha">ACOMPAÑANDOTE DESDE 1990</div>
			</div>
		</section>
		
		<a href="{{route('promociones')}}"><div id="enlace"></div></a>
		
	</body>

</html>