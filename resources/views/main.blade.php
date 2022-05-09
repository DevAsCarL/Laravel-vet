@extends('layouts.app')

@section('title','Veterinaria')
@section('content')
<section class="d-block  container-fluid ">
    <img src="{{ asset('img/inicio.jpg') }}" class="container-fluid img-fluid start-0">
    <div class="bg-dark bg-opacity-25 d-flex flex-column justify-content-center align-items-center container-fluid">
        <h1 class="text-white">Agenda tu visita!</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, mollitia.</p>
        <a href="{{route('citas.create')}}" class="btn btn-primary">Agendar Ahora!</a>
    </div>
</section>


<main class="container-fluid">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="3000">
            <img src="img\clinica-veterinaria-banner.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="3000">
            <img src="img\clinica-veterinaria.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="3000">
            <img src="img\Medicina-veterinaria.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</main>



@endsection
