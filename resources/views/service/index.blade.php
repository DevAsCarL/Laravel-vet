@extends('adminlte::page')

@section('title', 'Dashboard')




@section('content_header')
    <h1>Servicios</h1>
@stop

@section('content')
@isset($message)

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{$message}}.</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      x
    </button>
  </div>

    
@endisset
<div class="card text-dark bg-link">
    <div class="card-body">
    <table class="table table-sm-responsive" id="services">
        <thead class="thead-inverse">
            <tr>
                <th>Numero</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
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
        $('#services').DataTable({
        "processing": true,
        "ajax": "{{route('datatable.services')}}",
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "description",
                orderable: false,},
            { "data": "status" }, 
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
  