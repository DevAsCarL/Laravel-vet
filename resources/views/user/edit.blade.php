@extends('adminlte::page')

@section('title', 'Editar Usuario')
@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
    <section class="container-flex">
        <div class="container rounded bg-white mt-5 mb-5">
        </div>
    </section>
    <section class="d-flex justify-content-center">
        <div class="card bg-light d-flex flex-wrap">
            <div class="card-body " style="width:30rem">
                <form action="{{ route('users.edit', $user->id) }}" method="get">
                    @csrf
                    <div class="row my-2">
                        <label for="name" class="col-3 form-label text-right">Nombre*: </label>
                        <input type="text" class="col-9 form-control " name="name" id=""
                            value="{{ isset($user->name) ? $user['name'] : old('name') }}">
                    </div>
                    <div class="row my-2">
                        <label for="email" class="col-3 form-label text-right">Correo*: </label>
                        <input type="text" class="col-9 form-control " name="email" id="email"
                            value="{{ isset($user->email) ? $user->email : old('email') }}">
                    </div>
                    <div class="row my-2">
                        <label for="password" class="col-3 form-label text-right">Contraseña*: </label>
                        <input type="password" class="col-9 form-control" name="password" id="password"
                            value="{{ isset($user->password) ? Str::limit($user->password, 8) : old('password') }}">
                    </div>
                    <div class="row my-2">
                        <label for="rol" class="col-3 form-label text-right">Rol*: </label>
                        <select name="role" id="rol" class="col-9 form-select">
                            @foreach ($getRoles as $role)
                                <option value="{{ $role->id }}" @if ($role->name == $user->getRoleNames()->first()) selected @endif>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row row-cols-2 my-4">
                        <div class="col d-flex justify-content-center">
                            <a href="{{ route('users.index') }}" class="btn btn-primary" role="button"
                                id="atras">Atras</a>
                        </div>

                        <div class="col d-flex justify-content-start">
                            <input type="submit" value="Actualizar Usuario" class="btn btn-success">

                        </div>

                    </div>

                </form>
            </div>
        </div>
    </section>
@stop
@section('js')
@stop
