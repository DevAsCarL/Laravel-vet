@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')

<div class="card text-dark bg-link">
    <div class="card-body">
    <table class="table table-sm-responsive" id="users">
        <thead class="thead-inverse">
            <tr>
                <th>Numero</th>
                <th>Nombre</th>
                <th>Numero Telefonico</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
    </div>
</div>
@stop



@section('js')
   
    <script> 
    $(document).ready(function() {
        $('#users').DataTable({
        "processing": true,
        "ajax": "{{route('datatable.users')}}",
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "number" },
            { "data": "email" }, 
            { "data": "roles[].name" },
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
@stop
  