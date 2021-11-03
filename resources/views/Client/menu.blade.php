@extends('Client.templateCliente')

@section('menu')
    <div class="tituloSeccion">
        <h1>Menú</h1>
    </div>
    <table class="letras">
        @for($i = 0; $i < count($pizzas); $i+=3)
            @if($ajustes['indice'] != $i)
                <tr>
                    @for($j = 0; $j < 3; $j++)
                        <td>
                            <div>
                                <a href="#">
                                    <img src="{{$pizzas[$i + $j]['urlImagen']}}" alt="{{$pizzas[$i + $j]['urlImagen']}}"/>
                                </a>
                            </div>
                            <p>${{$pizzas[$i + $j]['precio']}}</p>
                        </td>
                    @endfor
                </tr>
                
                <tr>
                    @for($j = 0; $j < 3; $j++)
                        <td>
                            <b>{{$pizzas[$i + $j]['nombre']}}</b><br/>
                            {{$pizzas[$i + $j]['ingredientes']}}
                        </td>
                    @endfor
                </tr>
            @elseif(count($ajustes['imagenes']) == 1)
                <tr>
                    @for($j = 0; $j < 2; $j++)
                        <td>
                            <div>
                                <a href="#">
                                    <img src="{{$pizzas[$i + $j]['urlImagen']}}" alt="{{$pizzas[$i + $j]['urlImagen']}}"/>
                                </a>
                            </div>
                            <p>${{$pizzas[$i + $j]['precio']}}</p>
                        </td>
                    @endfor
					<td>
						<img id="sinFor" src="imagenes/Pizzas/Pizza box D.png" alt="Pizza box D"/>
					</td>
                </tr>
                <tr>
                    @for($j = 0; $j < 2; $j++)
                        <td>
                            <b>{{$pizzas[$i + $j]['nombre']}}</b><br/>
                            {{$pizzas[$i + $j]['ingredientes']}}
                        </td>
                    @endfor
					<td></td>
                </tr>
            @elseif(count($ajustes['imagenes']) == 2)
                <tr>
					<td>
						<img id="sinFor" src="imagenes/Pizzas/Pizza box I.png" alt="Pizza box I"/>
					</td>
					<td>
                        <div>
                            <a href="#">
                                <img src="{{$pizzas[$i]['urlImagen']}}" alt="{{$pizzas[$i]['urlImagen']}}"/>
                            </a>
                        </div>
                        <p>${{$pizzas[$i]['precio']}}</p>
					</td>
					<td>
						<img id="sinFor" src="imagenes/Pizzas/Pizza box D.png" alt="Pizza box D"/>
					</td>
				</tr>
				
				<tr>
					<td></td>
                    <td>
                        <b>{{$pizzas[$i]['nombre']}}</b><br/>
                        {{$pizzas[$i]['ingredientes']}}
                    </td>
					<td></td>
				</tr>
            @endif
        @endfor
    </table>
@endsection