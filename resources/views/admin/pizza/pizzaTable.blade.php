<div class="container mt-5">
    <!--Tabla obtenida de datatables.net-->
    <table id="table_id" class="display" style="text-align:center;">
        <thead>
            <tr>
                <th>Registro</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Ingredientes</th>
                <th>URL Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $registro)
                <tr>
                    <td>{{$registro->id}}</td>
                    <td>{{$registro->nombre}}</td>
                    <td>{{$registro->precio}}</td>
                    <td>{{$registro->ingredientes}}</td>
                    <td>{{$registro->urlImagen}}</td>
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