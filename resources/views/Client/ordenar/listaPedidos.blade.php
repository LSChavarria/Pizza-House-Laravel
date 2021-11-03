Pedidos:
@if(count($pedidos) == 0)
    Aun no cuentas con pedidos
@else
    <br>
    @foreach($pedidos as $p)
        {{$p}}
    @endforeach
@endif