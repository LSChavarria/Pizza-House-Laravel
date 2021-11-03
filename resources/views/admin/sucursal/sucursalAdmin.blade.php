@extends('admin.templateAdmin')

@section('sucursal')
    
    @include('admin.modal')

    <div class="d-grid gap-2 col-6 mx-auto" style="margin-top:20px">
        <a href="{{route('prepareInsertSucursal')}}" class="btn btn-primary active" rol="button">
            <i class="fas fa-user-plus"></i>  Agregar Sucursal
        </a>
    </div>

    <div id="renderTable">
        @include('admin.sucursal.sucursalTable')
    </div>

    <script type="text/javascript">
        function renderizarModal(id) {
            data = {id:id, _token:'{{csrf_token()}}'};
            $.ajax(
                {
                    type: 'POST',
                    url:'{{route("prepareUpdateSucursal")}}',
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
            var nombre = document.getElementById('nombre').value;
            var direccion = document.getElementById('direccion').value;
            var telefono = document.getElementById('telefono').value;
            var apertura = document.getElementById('apertura').value;
            var urlMapa = document.getElementById('urlMapa').value;
            var token = '{{csrf_token()}}';
            var data = {
                id:id, 
                nombre:nombre, 
                direccion:direccion, 
                telefono:telefono, 
                apertura:apertura, 
                urlMapa:urlMapa, 
                _token:token
            };
            console.log(data);
            $.ajax(
                {
                    type: 'POST',
                    url:'{{route("updateSucursal")}}',
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
                console.log(data)
                $.ajax(
                    {
                        type: 'POST',
                        url:'{{route("deleteSucursal")}}',
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