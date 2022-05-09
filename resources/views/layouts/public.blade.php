<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body>
    <div class="bg-dark d-flex justify-content-end">
        @if (Route::has('login'))
            <div class="d-flex justify-content-end">
                @auth
                    <a href="{{ url('/') }}" class="link-light me-3 nav-link">Home</a>
                    
                    <a href="{{ route('profile') }}" class="link-light me-3 nav-link" >
                        {{ Auth::user()->name }}
                    </a>
                @else
                    <a href="{{ route('login') }}" class="link-light me-3 nav-link">Log in</a>

                    {{-- @if (Route::has('register')) --}}
                        <a href="{{ route('register') }}" class="link-light me-3 nav-link">Register</a>
                    {{-- @endif --}}
                @endauth
            </div>
        @endif
        
    </div>
    @yield('content')
</body>
</html>