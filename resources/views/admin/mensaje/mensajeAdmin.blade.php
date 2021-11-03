@extends('admin.templateAdmin')

@section('mensaje')
    
    @include('admin.modal')

    <div class="d-grid gap-2 col-6 mx-auto" style="margin-top:20px">
        <a href="{{route('prepareInsertMensajeCliente')}}" class="btn btn-primary active" rol="button">
            <i class="fas fa-user-plus"></i> Agregar Mensaje
        </a>
    </div>

    <div id="renderTable">
        @include('admin.mensaje.mensajeTable')
    </div>

    <script type="text/javascript">
        function renderizarModal(id) {
            data = {id:id, _token:'{{csrf_token()}}'};
            $.ajax(
                {
                    type: 'POST',
                    url:'{{route("prepareUpdateMensajeCliente")}}',
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
            var idCliente = document.getElementById('idCliente').value;
            var mensaje = document.getElementById('mensaje').value;
            var token = '{{csrf_token()}}';
            var data = {
                id:id, 
                idCliente:idCliente, 
                mensaje:mensaje, 
                _token:token
            };
            console.log(data);
            $.ajax(
                {
                    type: 'POST',
                    url:'{{route("updateMensajeCliente")}}',
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
                        url:'{{route("deleteMensajeCliente")}}',
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