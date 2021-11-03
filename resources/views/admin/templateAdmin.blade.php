<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpg" href="imagenes/Logo/logo.jpg"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>Admin House Pizza</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('administracion')}}">
                <img src="imagenes/Logo/logo.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                House Pizza
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        @include('admin.dropdownButtonNavBar', [
                                'titulo' => 'Usuario',
                                'administrar' => 'user',
                                'insertar' => 'prepareInsertUser'
                            ])
                    </li>
                    <li class="nav-item">
                        @include('admin.dropdownButtonNavBar', [
                                'titulo' => 'Mensajes',
                                'administrar' => 'mensaje_cliente',
                                'insertar' => 'prepareInsertMensajeCliente'
                            ])
                    </li>
                    <li class="nav-item">
                        @include('admin.dropdownButtonNavBar', [
                                'titulo' => 'Ordenes',
                                'administrar' => 'orden',
                                'insertar' => 'prepareInsertOrden'
                            ])
                    </li>
                    <li class="nav-item">
                        @include('admin.dropdownButtonNavBar', [
                                'titulo' => 'Pizzas',
                                'administrar' => 'pizza',
                                'insertar' => 'prepareInsertPizza'
                            ])
                    </li>
                    <li class="nav-item">
                        @include('admin.dropdownButtonNavBar', [
                                'titulo' => 'Promociones',
                                'administrar' => 'promocion',
                                'insertar' => 'prepareInsertPromocion'
                            ])
                    </li>
                    <li class="nav-item">
                        @include('admin.dropdownButtonNavBar', [
                                'titulo' => 'Sucursales',
                                'administrar' => 'sucursal',
                                'insertar' => 'prepareInsertSucursal'
                            ])
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                Login
            </div>
        </div>
    </nav>
  
    <section>
        @yield('admin')
        @yield('user')
        @yield('sucursal')
        @yield('promocion')
        @yield('pizza')
        @yield('orden')
        @yield('mensaje')
        
        <div style="margin-top: 10px">
            @yield('insertUser')
            @yield('insertSucursal')
            @yield('insertPromocion')
            @yield('insertPizza')
            @yield('insertOrden')
            @yield('insertMensajeCliente')
        </div>
    </section>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">     
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
      </script>
  </body>
</html>