@extends('admin.templateAdmin')

@section('pizza')
    
    @include('admin.modal')

    <div class="d-grid gap-2 col-6 mx-auto" style="margin-top:20px">
        <a href="{{route('prepareInsertPizza')}}" class="btn btn-primary active" rol="button">
            <i class="fas fa-user-plus"></i>  Agregar Pizza
        </a>
    </div>

    <div id="renderTable">
        @include('admin.pizza.pizzaTable')
    </div>

    <script type="text/javascript">
        function renderizarModal(id) {
            data = {id:id, _token:'{{csrf_token()}}'};
            $.ajax(
                {
                    type: 'POST',
                    url:'{{route("prepareUpdatePizza")}}',
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
            var precio = document.getElementById('precio').value;
            var ingredientes = document.getElementById('ingredientes').value;
            var urlImagen = document.getElementById('urlImagen').value;
            var token = '{{csrf_token()}}';
            var data = {
                id:id, 
                nombre:nombre, 
                precio:precio, 
                ingredientes:ingredientes, 
                urlImagen:urlImagen,
                _token:token
            };
            console.log(data);
            $.ajax(
                {
                    type: 'POST',
                    url:'{{route("updatePizza")}}',
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
                        url:'{{route("deletePizza")}}',
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