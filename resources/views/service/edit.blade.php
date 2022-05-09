@extends('layouts.adminlte')

@section('content_header')
    <h1>Servicios</h1>
@stop

@section('content')
<form class="d-flex justify-content-center align-items-center" action="{{route('service.update',$service->id)}} " method="post">

    @csrf
    @method('PUT')
   <div class="card w-25">
    <div class="card-body d-flex flex-column ">
           
        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="name" id="" aria-describedby="emailHelpId" value="{{$service->name}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" class="form-control" name="description" id="" aria-describedby="emailHelpId" value="{{$service->description}}">
        </div>
        
        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select class="form-control" name="status" id="">
                @if($service->status == 'A')
                <option value="{{$service->status}}">{{$service->status}}</option>
                <option value="D">D</option> 
                @else
                <option value="D">D</option> 
                <option value="A">A</option> 
                @endif
            
            </select>
        </div>
    

       
        <a href="{{route('service.index')}}" class="btn btn-primary">Atrás</a>
        <button type="submit" class="btn btn-warning" onclick="return confirm('¿Desea actualizar servicio?')">Actualizar</button>
    </div>
   </div>
</form>
@stop

@section('css')
    
@stop

@section('js')
    <script>
        
    </script>
@stop