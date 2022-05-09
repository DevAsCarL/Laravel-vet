@extends('layouts.app')

@section('title','Veterinaria')
@section('content')

<section class="container vw-30">
    @forelse ($errors->all() as $error) 
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        
            <strong>{{$error}}</strong> Debes verificar el campo.
        </div>
            
        @empty
            
        @endforelse
<div class="mb-3 ">
<form action="{{route('citas.store')}}" method="post">
        @csrf
        <label for="servicio" class="form-label">Servicio</label>
        <select name="servicio" id="" class="form-control">
            @foreach ($getServices as $service )
              <option value="{{$service->id}}">{{$service->name}}</option>  
            @endforeach
        </select>
        <label for="mascota" class="form-label">Mascota</label>
        <select name="mascota" id="" class="form-control">
            @forelse ($getPets as $pet )
              <option value="{{$pet->id}}">{{$pet->name}}</option>  
            @empty
            <option value="null" >No presenta mascota(s)</option>
            @endforelse
        </select>

  
    <label for="fecha" class="form-label">Fecha</label>
    <input type="date" class="form-control" name="fecha" id="">

    <input type="submit" class=" mt-4 btn btn-primary form-control" value="Agendar">
</form>
    


  
</div>
</section>

@endsection