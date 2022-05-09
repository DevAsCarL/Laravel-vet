@extends('layouts.app')

@section('title','Veterinaria')
@section('content')

<section class="container w-50">
    
    @forelse ($errors->all() as $error) 
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        
            <strong>{{$error}}</strong> Debes verificar el campo.
        </div>
            
        @empty
            
        @endforelse
<div class="card text-start">
<form action="{{route('citas.store')}}" method="post">
    @csrf
    <div class="card-body">
    <label for="servicio" class="form-label">Servicio</label>
        <select name="servicio" id="servicio" class="form-control">
            @foreach ($getServices as $service )
              <option value="{{$service->id}}">{{$service->name}}</option>  
            @endforeach
        </select>
        <label for="mascota" class="form-label">Mascota</label>
        <select name="mascota" id="mascota" class="form-control">
            @forelse ($getPets as $pet )
              <option value="{{$pet->id}}">{{$pet->name}}</option>  
            @empty
            <option value="null" >No presenta mascota(s)</option>
            @endforelse
        </select>
        <label for="fecha" class="form-label">Escoga la fecha de su cita</label>
        <div class="container my-2">
            <section class="buttons my-2">

                <input type="radio" name="date" id="date1" value="{{$day1}}" data-bs-toggle="collapse" data-bs-target="#contentId" aria-expanded="false"
                aria-controls="contentId"><label for="date1" class="btn btn-outline-info ">{{$day1}}</label>
                <input type="radio" name="date" id="date2" value="{{$day2}}" data-bs-toggle="collapse" data-bs-target="#contentId" aria-expanded="false"
                aria-controls="contentId"><label for="date2" class="btn btn-outline-info ">{{$day2}}</label>
                <input type="radio" name="date" id="date3" value="{{$day3}}" data-bs-toggle="collapse" data-bs-target="#contentId" aria-expanded="false"
                aria-controls="contentId"><label for="date3" class="btn btn-outline-info ">{{$day3}}</label>
                   
            </section>

            <div class="collapse" id="contentId"></div>
        </div>

        <input type="submit" class=" mt-4 btn btn-primary form-control" value="Agendar">

        


    </div>

</form>
    


  
</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

$(document).ready(function () {
    let contador=0
  $('#date1'||'#date2'||'#date3').click(function (e) { 
      e.preventDefault();
      
      $.ajax({
          type: "GET",
          url: "{{ route('citas.index') }}",
          data: {
              date:$('#date').val(),
              _token: $('input[name="_token"]').val()
          },
          success: function (response) {
            let array = JSON.parse(response) 
            
            if (contador == 0) {
                let container = `<article id="article" class="d-flex flex-wrap gap-2 justify-content-center"></article>`
                $('#contentId').append(container);
                array.forEach(element => {
                    let content = `<input type="radio" name="schedule" id="${element.id}">
                    <label for="${element.id}" name="hour" class="btn btn-outline-info ">${element.start}-${element.end}<span class="badge bg-info">3</span></label>
                    <input type="hidden" name="start" value="${element.start}"><input type="hidden" name="end" value="${element.end}">`
                    $('#article').append(content);
                });
                contador++
            }else{
                $('#article').remove();
                contador--
            }
             
          }
          
      })
  });
    
    
});


</script>

@endsection