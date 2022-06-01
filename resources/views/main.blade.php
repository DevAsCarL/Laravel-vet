@extends('layouts.app')

@section('title','Veterinaria')
@section('content')

<section class="main__container"> 
<figure class="main__container image__container"><img src="{{asset('img/petMain.jpg')}}" class="image main__img"></figure>
<div class="main__content ">
  <h1 class="main__title">Bienvenidos a la veterinaria</h1>
  <p class="main__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam dolor in cupiditate, ipsa modi eum voluptates nam repellendus exercitationem provident maxime</p>
  <a href="#services" class="button button__special ">Ver Servicios</a>
</div>
</section>

<section class="services__container" id="services">
    <article class="service__article">
        <div class="plan-card">
            <h2>Consulta<span>Oferta Limitada</span></h2>
            <div class="etiquet-price">
                <p>59.99</p>
                <div></div>
            </div>
            <div class="benefits-list">
                <ul>
                    <li><svg viewBox="0 0 512 512">
                            <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                        </svg><span>Analisis</span></li>
                    <li><svg viewBox="0 0 512 512">
                            <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                        </svg><span>Consulta</span></li>
                    <li><svg viewBox="0 0 512 512">
                            <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                        </svg><span>Comodidad</span></li>
                </ul>
            </div>
            <div class="button-get-plan">
                <a href="{{route('citas.create')}}">
                  <svg
                  width="20px" height="26px" viewBox="0 0 253 260" enable-background="new 0 0 253 260" xml:space="preserve" style="filter:invert(100%); margin-right:0.5rem;">
                  <path d="M194.221,2c-5.959,0-10.814,4.855-10.814,10.814V46.8c0,5.959,4.855,10.814,10.814,10.814s10.814-4.855,10.814-10.814
                  V12.814C205.035,6.855,200.179,2,194.221,2 M250.938,33.338v57.159V258H2V90.276V33.338h33.766v13.683
                  c0,12.579,10.152,22.952,22.952,22.952C71.297,69.972,81.669,59.6,81.669,47.021V33.338h89.6v13.683
                  c0,12.579,10.372,22.952,22.952,22.952c12.579,0,22.952-10.372,22.952-22.952V33.338H250.938z M237.476,90.497H15.462v153.6h172.579
                  l49.434-48.772V90.497H237.476z M58.717,2c-5.958,0-10.814,4.855-10.814,10.814V46.8c0,5.959,4.855,10.814,10.814,10.814
                  c5.959,0,10.814-4.855,10.814-10.814V12.814C69.531,6.855,64.676,2,58.717,2 M194.221,2c-5.959,0-10.814,4.855-10.814,10.814V46.8
                  c0,5.959,4.855,10.814,10.814,10.814s10.814-4.855,10.814-10.814V12.814C205.035,6.855,200.179,2,194.221,2 M114.175,222.938
                  l-53.158-53.159l21.213-21.213l31.976,31.976l59.594-59.423l21.184,21.244L114.175,222.938z"/>
                </svg>
                    <span> Reservar Cita</span>
                </a>
            </div>
          </div>
    </article>

      <article class="service__article">
        <div class="plan-card">
            <h2>Limpieza<span>Oferta Limitada</span></h2>
            <div class="etiquet-price etiquet-price--special">
                <p>39.99</p>
                <div></div>
            </div>
            <div class="benefits-list">
                <ul>
                    <li><svg viewBox="0 0 512 512">
                            <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                        </svg><span>Analisis</span></li>
                    <li><svg viewBox="0 0 512 512">
                            <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                        </svg><span>Consulta</span></li>
                    <li><svg viewBox="0 0 512 512">
                            <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                        </svg><span>Comodidad</span></li>
                </ul>
            </div>
            <div class="button-get-plan">
                <a href="{{route('citas.create')}}">
                  <svg
                  width="20px" height="26px" viewBox="0 0 253 260" enable-background="new 0 0 253 260" xml:space="preserve" style="filter:invert(100%); margin-right:0.5rem;">
                  <path d="M194.221,2c-5.959,0-10.814,4.855-10.814,10.814V46.8c0,5.959,4.855,10.814,10.814,10.814s10.814-4.855,10.814-10.814
                  V12.814C205.035,6.855,200.179,2,194.221,2 M250.938,33.338v57.159V258H2V90.276V33.338h33.766v13.683
                  c0,12.579,10.152,22.952,22.952,22.952C71.297,69.972,81.669,59.6,81.669,47.021V33.338h89.6v13.683
                  c0,12.579,10.372,22.952,22.952,22.952c12.579,0,22.952-10.372,22.952-22.952V33.338H250.938z M237.476,90.497H15.462v153.6h172.579
                  l49.434-48.772V90.497H237.476z M58.717,2c-5.958,0-10.814,4.855-10.814,10.814V46.8c0,5.959,4.855,10.814,10.814,10.814
                  c5.959,0,10.814-4.855,10.814-10.814V12.814C69.531,6.855,64.676,2,58.717,2 M194.221,2c-5.959,0-10.814,4.855-10.814,10.814V46.8
                  c0,5.959,4.855,10.814,10.814,10.814s10.814-4.855,10.814-10.814V12.814C205.035,6.855,200.179,2,194.221,2 M114.175,222.938
                  l-53.158-53.159l21.213-21.213l31.976,31.976l59.594-59.423l21.184,21.244L114.175,222.938z"/>
                </svg>
                    <span> Reservar Cita</span>
                </a>
            </div>
          </div>
    </article>

      <article class="service__article">
        <div class="plan-card">
            <h2>Hospedaje<span>Oferta Limitada</span></h2>
            <div class="etiquet-price">
                <p>49.99</p>
                <div></div>
            </div>
            <div class="benefits-list">
                <ul>
                    <li><svg viewBox="0 0 512 512">
                            <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                        </svg><span>Analisis</span></li>
                    <li><svg viewBox="0 0 512 512">
                            <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                        </svg><span>Consulta</span></li>
                    <li><svg viewBox="0 0 512 512">
                            <path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                        </svg><span>Comodidad</span></li>
                </ul>
            </div>
            <div class="button-get-plan">
                <a href="{{route('citas.create')}}">
                  <svg
                  width="20px" height="26px" viewBox="0 0 253 260" enable-background="new 0 0 253 260" xml:space="preserve" style="filter:invert(100%); margin-right:0.5rem;">
                  <path d="M194.221,2c-5.959,0-10.814,4.855-10.814,10.814V46.8c0,5.959,4.855,10.814,10.814,10.814s10.814-4.855,10.814-10.814
                  V12.814C205.035,6.855,200.179,2,194.221,2 M250.938,33.338v57.159V258H2V90.276V33.338h33.766v13.683
                  c0,12.579,10.152,22.952,22.952,22.952C71.297,69.972,81.669,59.6,81.669,47.021V33.338h89.6v13.683
                  c0,12.579,10.372,22.952,22.952,22.952c12.579,0,22.952-10.372,22.952-22.952V33.338H250.938z M237.476,90.497H15.462v153.6h172.579
                  l49.434-48.772V90.497H237.476z M58.717,2c-5.958,0-10.814,4.855-10.814,10.814V46.8c0,5.959,4.855,10.814,10.814,10.814
                  c5.959,0,10.814-4.855,10.814-10.814V12.814C69.531,6.855,64.676,2,58.717,2 M194.221,2c-5.959,0-10.814,4.855-10.814,10.814V46.8
                  c0,5.959,4.855,10.814,10.814,10.814s10.814-4.855,10.814-10.814V12.814C205.035,6.855,200.179,2,194.221,2 M114.175,222.938
                  l-53.158-53.159l21.213-21.213l31.976,31.976l59.594-59.423l21.184,21.244L114.175,222.938z"/>
                </svg>
                    <span> Reservar Cita</span>
                </a>
            </div>
          </div>
    </article>   
</section >

<section class="customers" id="customers">
    <i class="fas fa-angle-right angle-inverse" id="arrowLeft"></i>

    <span class="customers__container">
        <article class="customer__container customer__container--activated" id="customers1">
            <div class="custommer__content">
                <h3 class="customer__name">Lorena Bustamante</h3>
                <p class="customer__comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa commodi recusandae quod nostrum blanditiis provident id veniam ipsum molestias ex esse, ipsa maxime explicabo atque error possimus similique reprehenderit doloremque.</p>
            </div>
            <figure class="customer__image"><img src="{{asset('img/customer1.jpg')}}" class="image"></figure>
        </article>
        <article class="customer__container" id="customers2">
            <div class="custommer__content">
                <h3 class="customer__name">Jimena Mendoza</h3>
                <p class="customer__comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa commodi recusandae quod nostrum blanditiis provident id veniam ipsum molestias ex esse, ipsa maxime explicabo atque error possimus similique reprehenderit doloremque.</p>
            </div>
            <figure class="customer__image"><img src="{{asset('img/customer2.jpg')}}" class="image"></figure>
        </article>
        <article class="customer__container" id="customers3">
            <div class="custommer__content">
                <h3 class="customer__name">Fernando Carvalho</h3>
                <p class="customer__comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa commodi recusandae quod nostrum blanditiis provident id veniam ipsum molestias ex esse, ipsa maxime explicabo atque error possimus similique reprehenderit doloremque.</p>
            </div>
            <figure class="customer__image"><img src="{{asset('img/customer3.jpg')}}" class="image"></figure>
        </article>
    </span>
    <i class="fas fa-angle-right" id="arrowRight"></i>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function () {

        const customerContainer = [...$('.customer__container').select()];
        let value = 0;

        $('#arrowRight').click(()=> { 
            (value===customerContainer.length-1) ? value=0 : value++;
            changeSlide(value);
        
        });

        $('#arrowLeft').click(()=> {    
            (value===0) ? value=customerContainer.length-1 : value--;
            changeSlide(value);
        
        });

        function changeSlide(value) {
            const currentContainer = $('.customer__container--activated').select();

            $(currentContainer).removeClass('customer__container--activated');
            $(customerContainer[value]).addClass('customer__container--activated');
        }
    });
    </script>    
@endsection