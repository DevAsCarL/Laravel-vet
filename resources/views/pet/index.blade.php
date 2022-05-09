@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
@stop

@section('content_header')
    <h1>Mascotas</h1>
@stop

@section('content')

<div class="card text-dark bg-link w-50 m-auto">
    <div class="card-body">
    <table class="table table-sm-responsive text-center" id="pets">
        <thead class="thead-inverse">
            <tr>
                <th>Numero</th>
                <th>Nombre</th>
                <th>Mascotas</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm-responsive text-center" id="pet">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Numero</th>
                            <th>Mascota</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

@stop



@section('js')
   
    <script> 
    $(document).ready(function() {
        $('#pets').DataTable({
        "processing": true,
        ajax: "{{route('datatable.pets')}}",
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "pets[<br>].name",
        
            "render": function (data) {
                let pet = '';
                if (data == '') {
                    pet = "<p>No tiene mascota</p>";    
                }
                else{
                    pet =  data; 
                }
                return  '<div class="overflow-auto text-center" style="height:2.5rem;">'+pet+'</div>';  
            } 
            }],

        language: {
            url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
        },
        responsive:{
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Detalles de '+data.name;
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        },
        autoWidth:false
    });
    });
    
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
@stop
  
