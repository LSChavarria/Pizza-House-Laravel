@extends('admin.templateAdmin')

@section('insertOrden')

    <div class="container">
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{route('orden')}}" class="btn btn-primary me-md-2" rol="button">
                <i class="fas fa-arrow-left"></i> Administrar
            </a>
        </div>

        <h1>Insertar Orden</h1>

        @include('admin.alertResult')

        @include('admin.orden.formOrden')
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 20px;">
            <a href="{{route('orden')}}" class="btn btn-primary me-md-2" rol="button">
                <i class="fas fa-arrow-left"></i> Administrar
            </a>
        </div>

    </div>
    
@endsection