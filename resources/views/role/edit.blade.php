@extends('layouts.adminlte')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
<form class="d-flex justify-content-center align-items-center" action="{{route('role.update',$role->id)}} " method="post">

    @csrf
    @method('PUT')
   <div class="card w-25">
       <div class="card-body d-flex flex-column ">
           <h1 class="card-title">{{$role->name}}</h1>
           <small>Rol</small>
       </div>
       <hr>
        @foreach ($allPermissions as $permission)
            @if ($permission->checkbox)
            <label class="mx-5 my-2">
                <input type="checkbox" name="permissions[]" value="{{$permission->id}}" checked>
                {{$permission->name}}
            </label>
            @else
            
            <label class="mx-5 my-2">
                <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                {{$permission->name}}
            </label>
            @endif
                
        @endforeach

        <a href="{{route('role.index')}}" class="btn btn-primary">Atrás</a>
        <button type="submit" class="btn btn-warning" onclick="return confirm('¿Desea actualizar rol?')">Actualizar</button>
       
   </div>
</form>
@stop

@section('css')
    
@stop

@section('js')
    <script>
        
    </script>
@stop
