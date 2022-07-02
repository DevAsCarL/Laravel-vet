@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles</h1>  
@stop

@section('content')
<form class="d-flex justify-content-center align-items-center" action="{{route('role.update',$role->id)}} " method="post">

    @csrf
    @method('PUT')
   <div class="card" style="width:25rem">
       <div class="card-body d-flex flex-column ">
           <h1 class="card-title">{{$role->name}}</h1>
           <small>Rol</small>
       </div>
       <hr>
       <div class="row g-2">
        {{-- @dd($role->getAllPermissions()) --}}
       @foreach ($allPermissions as $key => $value)
            
           <input type="checkbox" name="permissions[]" id="{{$key}}" value="{{$key+1}}" class="col-4" 
           {{$role->hasPermissionTo($value->name)?'checked':''}}>
           <label for="{{$key}}" class="col-8">{{$value->name}}
            </label>       
       @endforeach
        </div>
        <a href="{{route('role.index')}}" class="btn btn-primary">Atrás</a>
        <button type="submit" class="btn btn-warning" >Actualizar</button>
       
   </div>
</form>
@stop

@section('css')
 
@stop

@section('js')
 
@stop

