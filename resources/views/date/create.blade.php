@extends('layouts.app')

@section('title', 'Veterinaria')
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

        .disabled {
            cursor: not-allowed;
            pointer-events: all !important;
        }
    </style>
@stop
@section('content')
    <section class="w-50 m-auto my-5">
        <h1 class="text-center text-white bg-black">Click en la fecha a reservar</h1>
        <div id="calendar"></div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title"></h5>
                    <input type="hidden" id="date">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('citas.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="reserved_at" id="reserved_at">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="container row">
                                <span class="col">
                                    <div class="mb-3">
                                        <label for="user" class="form-label">Usuario: </label>
                                        <input type="text" class="form-control" id="user"
                                            value="{{ auth()->user()->name }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pet" class="form-label">Mascota: </label>
                                        <select class="form-select" name="pet_id" id="pet"
                                            @if (auth()->user()->pets->count() == 0) disabled @endif>
                                            @forelse (auth()->user()->pets as $pet)
                                                <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                                            @empty
                                                <option readonly>Sin Mascota</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="service" class="form-label">Servicio: </label>
                                        <select class="form-select" name="service_id" id="service">
                                            @foreach ($getServices as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="veterinary" class="form-label">Veterinario: </label>
                                        <select class="form-select" name="user_id" id="veterinary">
                                            @foreach ($veterinaryUsers as $veterinary)
                                                <option value="{{ $veterinary->id }}">{{ $veterinary->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Descripción: </label>
                                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                    </div>
                                </span>
                                <span class="col">
                                    <div class="d-flex gap-2 flex-wrap justify-content-center" id="schedule">
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection



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
                    url: "{{ url('reservar') }}",
                    method: 'get',
                    failure: function() {
                        alert('Ocurrio un error con los datos Fullcalendar!');
                    },
                    display: 'block',
                    color: '#76BD57', // an option!
                    textColor: 'black',
                    borderColor: 'black',
                }],
                dateClick: function(date) {
                    getSchedules(date);
                    $('#date').val(date.dateStr);
                    $('#title').html(moment(date.dateStr).locale('es').format('LL'));
                    $('#reserved_at').val(date.dateStr);
                    $('#reservationModal').modal('show');
                }
            });
            calendar.render();

            $('#veterinary').change(function(e) {
                e.preventDefault();
                date={dateStr:null}
                date.dateStr = $('#date').val();
                getSchedules(date)
            });

            function getSchedules(date) {
                let vet = $('#veterinary').val();
                let url = "{{ route('citas.show', ':id') }}";
                url = url.replace(':id', vet);
                $.ajax({
                    type: "get",
                    url: url,
                    data: {
                        date: date.dateStr,
                    },
                    dataType: "json",
                    success: function(response) {
                        let scheduleSelected = response[0].map((x) => x)
                        let schedules = response[1].map((x) => x)
                        let selected = [];
                        scheduleSelected.forEach((el, index) => {
                            selected.push(el.schedule_id);
                        });
                        $('#schedule').empty();
                        schedules.forEach((element) => {
                            let content =
                                `<input type="radio" name="schedule_id" id="${element.id}" class="radio-schedule" value="${element.id}"
                                        ${selected.includes(element.id)?'disabled':''}>
                                        <label for="${element.id}" name="hour" 
                                        class="btn ${selected.includes(element.id)?'btn-secondary disabled':'btn-outline-dark'}" >${element.schedule} </label>`;
                            $('#schedule').append(content);
                        });

                    }
                });
            }

        });
    </script>
@stop
