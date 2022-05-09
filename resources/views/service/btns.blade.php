<div class="d-flex gap-2 flex-wrap ">

    <a href="{{ route('service.edit',$id)}}" class="btn btn-info">Editar</a>
        
    <form action="{{ route('service.destroy',$id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea Eliminar?')">Eliminar</button>
    </form>
  
</div>