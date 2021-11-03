@extends('admin.templateAdmin')

@section('insertUser')

    <div class="container">
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{route('user')}}" class="btn btn-primary me-md-2" rol="button">
                <i class="fas fa-arrow-left"></i> Administrar
            </a>
        </div>

        <h1>Insertar Usuario</h1>

        @include('admin.alertResult')

        @include('admin.user.formUser')
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 20px;">
            <a href="{{route('user')}}" class="btn btn-primary me-md-2" rol="button">
                <i class="fas fa-arrow-left"></i> Administrar
            </a>
        </div>

    </div>
    
@endsection