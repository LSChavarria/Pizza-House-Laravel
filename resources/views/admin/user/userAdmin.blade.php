@extends('admin.templateAdmin')

@section('user')
    
    @include('admin.modal')

    <div class="d-grid gap-2 col-6 mx-auto" style="margin-top:20px">
        <a href="{{route('prepareInsertUser')}}" class="btn btn-primary active" rol="button">
            <i class="fas fa-user-plus"></i>  Agregar Usuario
        </a>
    </div>

    <div id="renderTable">
        @include('admin.user.userTable')
    </div>

    <script type="text/javascript">
        function renderizarModal(id) {
            data = {id:id, _token:'{{csrf_token()}}'};
            $.ajax(
                {
                    type: 'POST',
                    url:'{{route("prepareUpdateUser")}}',
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
            var name = document.getElementById('name').value;
            var direccion = document.getElementById('direccion').value;
            var referencia = document.getElementById('referencia').value;
            var rol = document.getElementById('rol').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var token = '{{csrf_token()}}';
            var data = {
                id:id, 
                name:name, 
                direccion:direccion, 
                referencia:referencia, 
                rol:rol, 
                email:email, 
                password:password,
                _token:token
            };
            console.log(data);
            $.ajax(
                {
                    type: 'POST',
                    url:'{{route("updateUser")}}',
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
                        url:'{{route("deleteUser")}}',
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