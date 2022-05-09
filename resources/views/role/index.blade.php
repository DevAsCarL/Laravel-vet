@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
@forelse ($errors->all() as $error) 
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    <strong>{{$error}}</strong> Debes verificar el campo.
</div>
    
@empty
    
@endforelse
<div class="card text-dark bg-link w-50 m-auto">
    <div class="card-body">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg my-4" data-bs-toggle="modal" data-bs-target="#modelId">
      Crear Nuevo Rol
    </button>
    
    
    
    <table class="table table-sm-responsive" id="roles">
        <thead class="thead-inverse">
            <tr>
                <th>Numero</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Rol</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('role.store')}}" method="post">
                @csrf
            <div class="modal-body">
                <label for="name">
                    Nombre de Rol
                    <input type="text" name="name">
                </label>
                <ul>
                @foreach ($permissions as $permission)
                    <li>
                        <input type="checkbox"  name="id[]" id="permission{{$loop->iteration}}" value="{{$permission->id}}">
                        <label for="permission{{$loop->iteration}}" >
                            {{$permission->name}}  
                        </label>
                    </li>
                @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
            </form>
        </div>
    </div>
</div>


@stop



@section('js')
   
    <script> 
    $(document).ready(function() {
        $('#roles').DataTable({
        "processing": true,
        "ajax": "{{route('datatable.roles')}}",
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "btn" }
        ],

        language: {
            url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        },
        responsive:true,
        autoWidth:false
    });
    } );
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

@stop