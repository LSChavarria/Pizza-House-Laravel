<div class="container mt-5">
    <!--Tabla obtenida de datatables.net-->
    <table id="table_id" class="display" style="text-align:center;">
        <thead>
            <tr>
                <th>Registro</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Apertura</th>
                <th>urlMapa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $registro)
                <tr>
                    <td>{{$registro->id}}</td>
                    <td>{{$registro->nombre}}</td>
                    <td>{{$registro->telefono}}</td>
                    <td>{{$registro->direccion}}</td>
                    <td>{{$registro->apertura}}</td>
                    <td>
                        <a onclick="showURL('{{$registro->urlMapa}}')" class="btn btn-success" rol="button">
                            <i class="fas fa-eye"></i>  Ver URL
                        </a>
                    </td>
                    <td>
                        <button onclick="borrar('{{$registro}}')" type="button" class="btn btn-danger" style="margin-top: 10px;">
                            <i class="fas fa-user-minus"></i>  Eliminar
                        </button>
                        <button onclick="renderizarModal('{{$registro->id}}')" type="button" class="btn btn-primary" style="margin-top: 10px;">
                            <i class="fas fa-user-edit"></i>  Editar 
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script type="text/javascript">
    function showURL(url) {
        alert(url);
    };
</script>