@extends('layouts.app')

@section('title', 'Veterinaria')
@section('content')

    <div class="card w-75 m-auto">
        <h4 class="card-title text-center mt-3">PERFIL</h4>
        <hr>
        <div class="card-body row d-flex flex-direction-column">

            <form action="{{ route('users.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data"
                class="card-body col-md-8">
                <section class="row d-flex flex-direction-column section">
                    <div class="col-md-6 border-right d-flex justify-content-center align-items-center">
                        @method('put')
                        @csrf
                        <div class="section card-profile">
                            <div class="blob"></div>
                            @isset(auth()->user()->image)
                                <img class="img" src="{{ asset(auth()->user()->image->url) }}">
                            @else
                                <img class="img"
                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                <input type="hidden" name="user" value="create">
                            @endisset
                            <h2>{{ auth()->user()->name }}<br><span>{{ auth()->user()->email }}</span></h2>
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
                                <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Número móvil</label>
                                <input type="text" class="form-control" name="number"
                                    value="{{ auth()->user()->number }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Correo Electrónico</label>
                                <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}"
                                    disabled>
                                <input type="hidden" class="form-control" name="profile" value="1">

                            </div>
                            <div class="row mt-5 d-flex flex-wrap-reverse gap-3">
                                <a href="{{ url('home') }}" class="btn btn-secondary">Atrás</a>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#ModalPassword"
                                    class="btn btn-warning" data-bs-dismiss="modal">Cambiar Contraseña</button>
                                <button class="btn btn-primary " type="submit">Guardar</button>
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
                                @forelse (auth()->user()->pets as $pet)
                                    <button @if ($loop->first) class="active" @endif type="button"
                                        data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $loop->index }}"
                                        aria-current="true" aria-label="Slide {{ $loop->index }}">
                                    </button>
                                @empty
                                @endforelse
                            </div>

                            <div class="carousel-inner">
                                @forelse (auth()->user()->pets as $pet)
                                    <div class="carousel-item @if ($loop->first) active @endif"
                                        data-bs-interval="2000">
                                        <img src="{{ asset($pet->image->url) }}" class="img-fluid d-block w-100"
                                            style="object-fit:cover; height:200px">
                                    </div>
                                @empty
                                @endforelse
                            </div>

                            @if (count(auth()->user()->pets) > 1)
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
                            <button type="submit" data-bs-toggle="modal" data-bs-target="#Modal" class="btn btn-warning">
                                <i class="fa fa-plus" aria-hidden="true"></i> Añadir Mascota
                            </button>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>



    {{-- MASCOTA --}}

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

    {{-- CONTRASEÑA --}}
    <div class="modal fade" id="ModalPassword" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('password.change', auth()->id()) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        @isset(auth()->user()->password)
                            <label class="labels" for="currentPassword">Contraseña Actual</label>
                            <input type="password" class="form-control" name="currentPassword" id="currentPassword">
                        @endisset

                        <label class="labels" for="newPassword">Nueva contraseña</label>
                        <div class="row row-cols-2" id="passwordContainer">
                            <span class="col-11">
                                <input type="password" class="form-control" name="password" id="newPassword">
                            </span>
                            <button type="button" class="col-1 d-flex justify-content-center align-items-center" id="eye1">
                                <i class="far fa-eye"></i>
                            </button>
                            <label class="labels col-12" for="repeatPassword">Confirmar contraseña</label>
                            <span class="col-11">
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="repeatPassword">
                            </span>
                            <button type="button" class="col-1 d-flex justify-content-center align-items-center" id="eye2">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-evenly">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            $('#eye1').click(function() {
                showOrHide('#eye1>i', '#newPassword')
            });
            $('#eye2').click(function() {
                showOrHide('#eye2>i', '#repeatPassword')
            });

            function showOrHide(icon, input) {
                $(icon).toggleClass('fa-eye-slash');
                $(input).attr('type') == 'password' ?
                    $(input).attr('type', 'text') :
                    $(input).attr('type', 'password');
            }
        });
    </script>
@stop
