@extends('adminlte::page')

@if (isset($user))
    @section('title', 'Editar Usuario')
    @section('content_header')
        <h1>Editar Usuario</h1>
    @stop
@else
    @section('title', 'Crear Usuario')
    @section('content_header')
        <h1>Crear Usuario</h1>
    @stop
@endif


@section('content')

    <section class="d-flex justify-content-center w-100">


        <div class="card bg-light d-flex flex-wrap">

            <div class="card-body " style="width:30rem">

                @isset($user)
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @method('PUT')
                    @else
                    <form action="{{ route('users.store') }}" method="post">
                @endisset
                    @csrf

                <div class="row my-2">
                    <label for="name" class="col-3 form-label ">Nombre: </label>
                    <input type="text" class="col-9 form-control " name="name" id=""
                        value="{{ isset($user->name) ? $user['name'] : old('name') }}">
                </div>
                <div class="row my-2">
                    <label for="email" class="col-3 form-label ">Correo: </label>
                    <input type="text" class="col-9 form-control " name="email"
                        value="{{ isset($user->email) ? $user->email : old('email') }}">
                </div>
                <div class="row my-2">
                    <label for="password" class="col-3 form-label ">Contraseña: </label>
                    <input type="password" class="col-9 form-control " name="password"
                        value="{{ isset($user->password) ? Str::limit($user->password, 8) : old('password') }}">
                </div>
                <div class="row my-2">
                    <label for="rol" class="col-3 form-label ">Rol: </label>
                    <select name="role">
                        @foreach ($getRoles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row row-cols-2 my-2">

                    <div class="col d-flex justify-content-center">
                        <a href="{{ route('users.index') }}" class="btn btn-primary" role="button">Atras</a>
                    </div>

                    <div class="col d-flex justify-content-start">
                        @if (isset($user))
                            <input type="submit" value="Actualizar Usuario" class="btn btn-success">
                        @else
                            <input type="submit" value="Crear Usuario" class="btn btn-success">
                        @endif
                    </div>

                </div>

                </form>
            </div>
        </div>

    </section>
@stop
