@extends('admin.templateAdmin')

@section('promocion')
    
    @include('admin.modal')

    <div class="d-grid gap-2 col-6 mx-auto" style="margin-top:20px">
        <a href="{{route('prepareInsertPromocion')}}" class="btn btn-primary active" rol="button">
            <i class="fas fa-user-plus"></i>  Agregar Promocion
        </a>
    </div>

    <div id="renderTable">
        @include('admin.promocion.promocionTable')
    </div>

    <script type="text/javascript">
        function renderizarModal(id, idPizza) {
            data = {id:id, idPizza:idPizza, _token:'{{csrf_token()}}'};
            $.ajax(
                {
                    type: 'POST',
                    url:'{{route("prepareUpdatePromocion")}}',
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
            var tipo = document.getElementById('tipo').value;
            var token = '{{csrf_token()}}';
            var data = {
                id:id, 
                idPizza:idPizza, 
                tipo:tipo, 
                _token:token
            };
            console.log(data);
            $.ajax(
                {
                    type: 'POST',
                    url:'{{route("updatePromocion")}}',
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
                        url:'{{route("deletePromocion")}}',
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