@extends('layouts.public')

@section('title','Veterinaria')
@section('content')

<section class="container-flex">
<div class="mb-3">
    <form action="{{route('citas.store')}}" method="post" method="post">
        @csrf
        <label for="servicio" class="form-label">Servicio</label>
    <input type="text" class="form-control" name="servicio" id="">
  
    <label for="descripcion" class="form-label">Descripcion</label>
    <textarea class="form-control" name="descripcion"></textarea>
  
    <label for="fecha" class="form-label">Fecha</label>
    <input type="date" class="form-control" name="fecha" id="">

    <input type="submit" class="btn btn-primary form-control" value="Agendar">
</form>
    


  
</div>
</section>

@endsection