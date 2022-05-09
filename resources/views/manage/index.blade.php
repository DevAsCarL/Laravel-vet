
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Contenido</h1>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@stop

@section('content')

<div class="card-group d-flex flex-wrap gap-5 justify-content-center">

    <a href="{{route('users.index')}}" class="btn d-flex flex-wrap">
        <div class="card bg-gradient-cyan d-flex flex-row align-items-center justify-content-center flex-wrap btn-size ">
            <span class="m-5"><i class="fa fa-users i-panel"></i></span>
            <article class="card-body d-flex flex-column align-items-center">
                <div class="card-text i-panel text-bold">{{$users}}</div>
                <h4 class="card-title">Usuarios</h4>
            </article>
        </div>
    </a>

    <a href="{{route('role.index')}}" class="btn ">
        <div class="card bg-gradient-indigo d-flex flex-row align-items-center justify-content-center flex-wrap btn-size ">
            <span class="m-5"><i class="fa fa-bars i-panel"></i></span>
            <article class="card-body d-flex flex-column align-items-center">
                <div class="card-text i-panel text-bold">{{$roles}}</div>
                <h4 class="card-title">Roles</h4>
            </article>
        </div>
    </a>

    <a href="{{route('pets.index')}}" class="btn ">
        <div class="card bg-gradient-green d-flex flex-row align-items-center justify-content-center flex-wrap btn-size ">
            <span class="m-5"><i class="fa fa-paw i-panel"></i></span>
            <article class="card-body d-flex flex-column align-items-center">
                <div class="card-text i-panel text-bold">{{$pets}}</div>
                <h4 class="card-title">Mascotas</h4>
            </article>
        </div>
    </a>

    <a href="{{route('service.index')}}" class="btn ">
        <div class="card bg-gradient-lightblue d-flex flex-row align-items-center justify-content-center flex-wrap btn-size ">
            <span class="m-5"><i class="fa fa-calendar-plus i-panel"></i></span>
            <article class="card-body d-flex flex-column align-items-center">
                <div class="card-text i-panel text-bold">{{$services}}</div>
                <h4 class="card-title">Servicios</h4>
            </article>
        </div>
    </a>

    <a href="{{route('citas.index')}}" class="btn ">
        <div class="card bg-gradient-maroon d-flex flex-row align-items-center justify-content-center flex-wrap btn-size ">
            <span class="m-5"><i class="fa fa-calendar-day i-panel"></i></span>
            <article class="card-body d-flex flex-column align-items-center">
                <div class="card-text i-panel text-bold">{{$dates}}</div>
                <h4 class="card-title">Citas Hoy</h4>
            </article>
        </div>
    </a>
    
</div>

@stop



@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@stop