@extends('layouts.app')

@section('content')

    <div class="container my-5">
    
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <button class="btn btn-primary text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">VER USUARIOS CON ROLES - DEMO</button>

                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Ver Usuarios con roles - DEMO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="mb-3">
                          <label for="user1" class="form-label">Veterinario</label>
                          <input type="text" class="form-control" name="" id="user1" aria-describedby="helpId" value="veterinario@vet.com">
                          <small id="helpId" class="form-text text-info">Usuario</small>
                          <input type="text" class="form-control" name="" id="user" aria-describedby="helpId" value="veterinario@vet.com">
                          <small id="helpId2" class="form-text text-info">Contraseña</small>
                        </div>
                        <div class="mb-3">
                            <label for="user2" class="form-label">Admin</label>
                            <input type="text" class="form-control" name="" id="user2" aria-describedby="helpId" value="admin@admin.com">
                            <small id="helpId" class="form-text text-info">Usuario</small>
                            <input type="text" class="form-control" name="" id="user12" aria-describedby="helpId" value="admin@admin.com">
                            <small id="helpId2" class="form-text text-info">Contraseña</small></div>
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-12">
                            <form method="POST" action="{{ route('login') }}"  class="col-8">
                                @csrf
    
                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
    
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
    
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
    
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
    
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            <div class="col-4 auth">
                                <section class="separator">
                                    <span>o</span>
                                </section>
                                <div class="auth-group">
                                    <a href="{{url('auth-google')}}" class="btn"><img src="{{asset('img/svg/icon-google.svg')}}" class="auth-icon"></a>
                                    <a href="{{url('auth-facebook')}}" class="btn"><i class="fab fa-facebook-f auth-icon auth-icon_primary"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
