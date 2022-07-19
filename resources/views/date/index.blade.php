@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Citas</h1>
@stop

@section('content')
<section class="w-50 m-auto my-5">
    <div id="calendar"></div>
</section>
<!-- Modal -->
<div class="modal fade" id="date" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="mb-3">
                      <label for="number" class="form-label">Número</label>
                      <input type="text" class="form-control" id="number" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="pet" class="form-label">Mascota</label>
                        <input type="text" class="form-control" id="pet" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="service" class="form-label">Servicio</label>
                        <input type="text" class="form-control" id="service" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" id="description" rows="3" readonly></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/combine/npm/fullcalendar@5.11.0/main.min.css">
<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
<style>
    .fc-event-main {
        display: flex;
    }

    .fc-event-title-container .fc-event-time {
        overflow: hidden;
        width: max-content;
    }

    .fc-daygrid-event-harness {
        overflow: hidden;
    }
</style>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"
integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/combine/npm/fullcalendar@5.11.0,npm/fullcalendar@5.11.0/locales-all.min.js">
</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        themeSystem: 'bootstrap5',
        headerToolbar: {
            start: 'today',
            center: 'title',
            end: 'prev,next'
        },
        buttonText: {
            today: 'hoy'
        },
        eventSources: [{
            events: {!! $reserved !!},
            display: 'block',
            color: 'primary', // an option!
            textColor: 'white',
            borderColor: 'black',
        }],
        eventClick: function(info) {
            let date = info.event.startStr;
            
            $.get("mostrar",{
                date:date
            },
            function (data, textStatus, jqXHR) {
                    let reserved = moment(info.event.startStr).locale('es').format('LLLL');
                    $('#number').val(data[1].number);
                    $('#email').val(data[1].email);
                    $('#pet').val(data[2].name);
                    $('#service').val(data[3].name);
                    $('#description').val(data[0].description);
                    $('.modal-title').html(`Cita de ${data[1].name} el ${reserved}`);
                    $('#date').modal('show');
                },
                // "json"
            );

            
        }
    });
    calendar.render();
});
</script>
@stop

