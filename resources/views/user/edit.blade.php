@extends('adminlte::page')

@section('title', 'Editar Usuario')
@section('content_header')
    <h1>Editar Usuario</h1>
@stop


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
    <section class="d-flex justify-content-center">
        <div class="card bg-light d-flex flex-wrap">
            <div class="card-body " style="width:30rem">
                <form action="{{ route('users.edit', $user->id) }}" method="get">
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
                                <option value="{{ $role->id }}" @if ($role->name == $user->getRoleNames()->first()) selected @endif>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row row-cols-2 my-2">

                        <div class="col d-flex justify-content-center">
                            <a href="{{ route('users.index') }}" class="btn btn-primary" role="button">Atras</a>
                        </div>

                        <div class="col d-flex justify-content-start">
                            <input type="submit" value="Actualizar Usuario" class="btn btn-success">

                        </div>
                        
                    </div>

                </form>
            </div>
        </div>
        {{-- INTEGRAR CDN DE BOOTSTRAP A PLANTILLA ADMILTE --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </section>
@stop
