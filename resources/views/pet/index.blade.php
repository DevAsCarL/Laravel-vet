@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
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
    <div class="modal fade" id="showPetsModal" tabindex="-1" aria-labelledby="petsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="petsModalLabel">Mascotas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-sm-responsive text-center" id="pet">
                        <thead class="thead-inverse">
                            <tr>
                                <th>id</th>
                                <th>Dueño</th>
                                <th>Mascota(s)</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@stop



@section('js')
    <script>
        $(document).ready(function() {
            let isResponsive = $('nav').innerWidth() <= 793 ? true : false;
            let pet = '';
            var dtOptions = {
                "processing": true,
                ajax: "{{ route('datatable.pets') }}",

                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "pets[<br>].name",
                    }
                ],
                "columnDefs": [{

                    "targets": [2],
                    render: function(data, type, row) {
                        return updateColumns(data)
                    }

                }],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                responsive: isResponsive,
                autoWidth: false,
            };

            let datatable = $('#pets').DataTable(dtOptions);

            window.onresize = function() {
                let responsive = dtOptions.responsive = $('nav').innerWidth() <= 793 ? true : false;
                if (isResponsive != responsive) {
                    dtOptions["columnDefs"] = [{
                            "targets": [2],
                            render: function(data, type, row) {
                                return updateColumns(data)
                            }
                        }],
                        $('#pets').DataTable().destroy();
                    // $('#pets tbody').empty();
                    $('#pets').removeClass('dtr-inline collapsed');
                    let datatable = $('#pets').DataTable(dtOptions);
                    isResponsive = responsive;
                }
            };

            function updateColumns(data) {
                if (isResponsive) {
                    pet = `<p>Sin mascota(s)</p>`;
                    if (data !== '') {
                        pet = `<p>${data}</p>`;
                    }
                } else {
                    pet = `<p>Sin mascota(s)</p>`;
                    if (data !== '') {
                        pet =
                            '<button type="button" id="btnShowPets" class="btn btn-primary">Ver mascotas</button>';
                    }
                }
                return '<div class="d-flex text-center" style="height:2.5rem;">' + pet +
                    '</div>';
            }

            $('#pets tbody').on('click', '#btnShowPets', function(e) {
                let rowData = datatable.row().data();
                let id = rowData.id;
                let name = rowData.name;
                // let pets = rowData.pets.map(x => x.name);
                $.get("pets/"+id, {id:id},
                    function (data, textStatus, jqXHR) {
                        pets = $.map(data,x=>x.name);
                         showMyModalSetInput(id, name, pets);
                    },
                    "json"
                );
            })

            function showMyModalSetInput(id, name, data) {
                $('#pet tbody').html(
                    `<tr>
                <td>${id}</td>
                <td>${name}</td>
                <td>${pets}</td>
                </tr>`);
                $('#showPetsModal').modal('show');
            }


        });
    </script>
@stop
