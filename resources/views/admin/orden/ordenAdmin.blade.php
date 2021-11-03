@extends('admin.templateAdmin')

@section('orden')
    
    @include('admin.modal')

    <div class="d-grid gap-2 col-6 mx-auto" style="margin-top:20px">
        <a href="{{route('prepareInsertOrden')}}" class="btn btn-primary active" rol="button">
            <i class="fas fa-user-plus"></i>  Agregar Orden
        </a>
    </div>

    <div id="renderTable">
        @include('admin.orden.ordenTable')
    </div>

    <script type="text/javascript">
        function renderizarModal(id) {
            data = {id:id, _token:'{{csrf_token()}}'};
            $.ajax(
                {
                    type: 'POST',
                    url:'{{route("prepareUpdateOrden")}}',
                    data:data,
                    success:function(data) {
                        $('#exampleModal').modal('show');
                        document.getElementById('renderModal').innerHTML = data.html
                    }
                }
            );
        }

        function accionModal() {
            var id = document.getElementById('id').value;
            var idPizza = document.getElementById('idPizza').value;
            var idCliente = document.getElementById('idCliente').value;
            var nombre = document.getElementById('nombre').value;
            var direccion = document.getElementById('direccion').value;
            var referencia = document.getElementById('referencia').value;
            var token = '{{csrf_token()}}';
            var data = {
                id:id, 
                idPizza:idPizza, 
                idCliente:idCliente, 
                nombre:nombre, 
                direccion:direccion, 
                referencia:referencia,
                _token:token
            };
            console.log(data);
            $.ajax(
                {
                    type: 'POST',
                    url:'{{route("updateOrden")}}',
                    data:data,
                    success:function(data) {
                        $('#exampleModal').modal('hide');
                        document.getElementById('renderTable').innerHTML = data.html;
                        $('#table_id').DataTable();
                    }
                }
            );
        }

        function borrar(registro) {
            id = JSON.parse(registro).id;
            aux = confirm("Eliminar: " + registro);
            if(aux) {
                data = {id:id, _token:'{{csrf_token()}}'};
                $.ajax(
                    {
                        type: 'POST',
                        url:'{{route("deleteOrden")}}',
                        data:data,
                        success:function(data) {
                            document.getElementById('renderTable').innerHTML = data.html;
                            $('#table_id').DataTable();
                        }
                    }
                );
            }
        }
    </script>

@endsection