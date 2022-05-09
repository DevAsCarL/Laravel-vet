@extends('layouts.app')

@section('title','Veterinaria')
@section('content')

<section class="container-flex">

    <div class="container rounded bg-white mt-5 mb-5">
        @forelse ($errors->all() as $error) 
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        
            <strong>{{$error}}</strong> Debes verificar el campo.
        </div>
            
        @empty
            
        @endforelse
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                   <form action="{{route('users.update',$getUser->id)}}" method="post" enctype="multipart/form-data">  
                    @method('put')
                    @csrf
                   @isset($getImage)
                   <img class="img-fluid rounded-circle mt-5" width="150px" src="{{ asset($getImage)}}">
                   @else
                   <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                   <input type="hidden" name="user" value="create">
                   @endisset
                    
                     
                        
                    <div class="mb-3">
                        <input class="form-control form-control-sm" name="image" type="file" accept="image/*">
                      </div>
                    <span class="font-weight-bold">{{$getUser->name}}</span>
                    <span class="text-black-50">{{$getUser->email}}</span>
                    <span> </span></div>
            </div>
            <div class="col-md-4 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Perfil</h4>
                    </div>
                    
                    <div class="row mt-3 d-grid gap-2">
                        <div class="col-md-12"><label class="labels">Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{$getUser->name}}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Número móvil</label>
                            <input type="text" class="form-control" name="number" value="{{$getUser->number}}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Correo Electrónico</label>
                            <input type="text" class="form-control" name="email" value="{{$getUser->email}}">
                            <input type="hidden" class="form-control" name="profile" value="1">
                        
                    </div>

                        <div class="row mt-5 text-center align-content-center ">
                            <div class="col-sm-6 col-6   ">
                                <a href="{{url('home')}}" class="btn btn-secondary">Atrás</a>
                            </div>
                            <div class="col-sm-6 col-6">
                                <button class="btn btn-primary " type="submit">Guardar</button> 
                            </div>
                               
                        </div>
                </form>

                   
                </div>
            </div>
        </div>
    <div class=" col-md-4 container-fluid d-flex justify-content-center align-items-center">
    <div class="row row-cols-1">
        <div class="col border-right">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">

                    @forelse ( $getPet as $pet )
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$loop->iteration}}" class="active" aria-current="true" aria-label="Slide {{$loop->iteration}}"></button>
                    @empty
                        
                    @endforelse
                </div>

                <div class="carousel-inner">
                @if (count($getPet) == 1)
                @foreach ($getPet as $pet )
                <img src="{{ asset($pet->image->url)}}" class="d-block w-100" > 
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $pet->name}}</h5>
                    <p>{{ $pet->description}}</p>
                
                </div>
                @endforeach

                @elseif (count($getPet) > 1)
                
                @forelse ($getPet as $pet)
                @if ($loop->remaining == 1)
                    @php
                        $active = 'active'
                    @endphp
                @else
                    @php
                        $active = ''
                    @endphp
                @endif
                <div class="carousel-item {{$active}}" data-bs-interval="2000">
                    <img src="{{asset($pet->image->url)}}"  width="150px" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>{{ $pet->name}}</h5>
                      <p>{{ $pet->description}}</p>
                    </div>
                </div>
                @empty
                    
                @endforelse

                @endif 

                </div>

                @empty($getPet)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
                @endempty

              </div>
              
        </div> 
        <div class="col d-flex justify-content-center"><button type="submit" data-bs-toggle="modal" data-bs-target="#Modal" class="btn btn-warning d-flex justify-content-around">
            <i class="fa fa-plus" aria-hidden="true"></i>Añadir Mascota</button></div>  
        </div>
    </div>





    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Añadir Mascota</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action="{{route('pets.store')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <label class="labels">Nombre de su mascota</label>
                <input type="text" class="form-control" name="name" value="">
                <label class="labels">Description de su mascota</label>
                <input type="text" class="form-control" name="description" value="">
                <label class="labels">Imagen de su mascota</label>
                <input type="file" name="image" accept="image/*">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        </form>
          </div>
        </div>
        
      </div>

      
    {{-- <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
    })
    </script> --}}
</section>

@endsection