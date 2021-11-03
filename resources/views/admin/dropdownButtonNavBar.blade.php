<div class="btn-group" style="margin-left:10px">
    <button type="button" class="btn btn-danger">
        <a  style="color:white" class="btn" rol="button" href="{{route($administrar)}}">{{$titulo}}</a>
    </button>
    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="visually-hidden">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route($administrar)}}">Administrar</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{route($insertar)}}">Insertar</a></li>
    </ul>
</div>