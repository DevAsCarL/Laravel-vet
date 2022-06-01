@extends('layouts.app')

@section('title', 'Veterinaria')
@section('content')

    <section class="container-flex">
        <div class="container rounded bg-white mt-5 mb-5">
            @forelse ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>{{ $error }}</strong> Debes verificar el campo.
                </div>
            @empty
            @endforelse
        </div>
    </section>
    
    <div class="card w-75 m-auto">
        <h4 class="card-title text-center mt-3">PERFIL</h4>
        <hr>
        <div class="card-body row d-flex flex-direction-column">

            <form action="{{ route('users.update', $getUser->id) }}" method="post" enctype="multipart/form-data"
                class="card-body col-md-8">
                <section class="row d-flex flex-direction-column section">
                    <div class="col-md-6 border-right d-flex justify-content-center align-items-center">
                        @method('put')
                        @csrf
                        <div class="section card-profile">
                            <div class="blob"></div>
                            @isset($getImage)
                                <img class="img" src="{{ asset($getImage) }}">
                            @else
                                <img class="img"
                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                <input type="hidden" name="user" value="create">
                            @endisset
                            <h2>{{ $getUser->name }}<br><span>{{ $getUser->email }}</span></h2>
                            <p>
                            <div class="file">
                                <label for="file-upload" class="buttonUpload">
                                    Subir Foto
                                </label>
                                <input id="file-upload" type="file" name="image" accept="image/*">
                            </div>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 py-5">
                        <div class="row mt-3 d-grid gap-2">
                            <div class="col-md-12"><label class="labels">Nombre</label>
                                <input type="text" class="form-control" name="name" value="{{ $getUser->name }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Número móvil</label>
                                <input type="text" class="form-control" name="number" value="{{ $getUser->number }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Correo Electrónico</label>
                                <input type="text" class="form-control" name="email" value="{{ $getUser->email }}"
                                    disabled>
                                <input type="hidden" class="form-control" name="profile" value="1">

                            </div>
                            <div class="row mt-5 text-center align-content-center ">
                                <div class="col-sm-6 col-6">
                                    <a href="{{ url('home') }}" class="btn btn-secondary">Atrás</a>
                                </div>
                                <div class="col-sm-6 col-6">
                                    <button class="btn btn-primary " type="submit">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>

            <div class=" col-md-4 d-flex justify-content-center align-items-center section my-3">
                <div class="row row-cols-1">
                    <section>
                        <div id="carouselExampleDark" class="col carousel slide my-3" data-bs-ride="carousel">                      
                            <div class="carousel-indicators">
                                @forelse ($getPet as $pet)
                                    <button @if ($loop->first) class="active" @endif
                                        type="button" data-bs-target="#carouselExampleDark"
                                        data-bs-slide-to="{{ $loop->index }}" 
                                        aria-current="true"
                                        aria-label="Slide {{ $loop->index }}">
                                    </button>
                                @empty
                                @endforelse
                            </div>
    
                            <div class="carousel-inner">
                                    @forelse ($getPet as $pet)
                                        <div class="carousel-item @if ($loop->first) active @endif" data-bs-interval="2000" >
                                            <img src="{{ asset($pet->image->url) }}"  class="img-fluid d-block w-100" style="object-fit:cover; height:200px">
                                        </div>
                                    @empty
                                    @endforelse
                            </div>
    
                            @if(count($getPet)>1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
    
                        </div>
                        <div class="col d-flex justify-content-center">
                            <button type="submit" data-bs-toggle="modal" data-bs-target="#Modal"
                                class="btn btn-warning" >
                                <i class="fa fa-plus" aria-hidden="true"></i>  Añadir Mascota
                            </button>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>





    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir Mascota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pets.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label class="labels">Nombre de su mascota</label>
                        <input type="text" class="form-control" name="name" value="">
                        <label class="labels">Description de su mascota</label>
                        <input type="text" class="form-control" name="description" value="">
                        <label class="labels">Imagen de su mascota</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

@endsection
