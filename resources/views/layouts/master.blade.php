<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/195/195812.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('titulo')</title>
</head>
<body>  
      <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container">
          @if (Auth::check())
            <a class="navbar-brand" href="{{ route('index') }}">Institut Under Field</a>
          @else
            <a class="navbar-brand" href="{{ url('/') }}">Institut Under Field</a>
          @endif
            <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
              <ul class="navbar-nav ms-auto">
                @if(Auth::check() && Auth::user()->email == 'admin@admin.cat')
                  <div class="navbar-nav">
                    <a class="nav-link" href="{{route('createCicle')}}">Crear un cicle</a>
                  </div>
                @endif
                @if(Auth::check() && Auth::user()->email != 'admin@admin.cat')
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('show', [Auth::user()->student->id, 'id'])}}">
                      {{ Auth::user()->name }}
                    </a>
                  </li>
                @endif
                @if(Auth::check() && Auth::user()->email == 'admin@admin.cat')
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      {{ Auth::user()->name }}
                    </a>
                  </li>
                @endif
                @auth    
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}">Tancar Sessió</a>
                </li>
                @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
    <div class="container-sm">
        @yield('contenido')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>