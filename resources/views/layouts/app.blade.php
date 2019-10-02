<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Estadias') }}</title>


    @yield('estilo')

    <!-- Scripts -->

    <!--<script src="http://sslab.isc.ittg.mx/js/app.js" defer></script>-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->

    <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/stackable@1.4.6/dist/stackable-browsify.min.js"></script>-->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="css/app.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
  
    
     <!-- Style -->
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/3.5.0/octicons.min.css">
    <!-- Full Calendar Styles -->
    <link href="{{ asset('librerias/fullcalendar-4.2.0/packages/core/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('librerias/fullcalendar-4.2.0/packages/daygrid/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('librerias/fullcalendar-4.2.0/packages/timegrid/main.css') }}" rel="stylesheet" />

    <!-- 
    <link rel="stylesheet" type="text/css" href="/librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="/librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="/librerias/select2/css/select2.css">

    -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    ESTADIAS
                </a>
                @auth

                @if ( Auth::user()->tipo_usuario == 'Jefe' )

                    <div class="navbar-nav mr-auto">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <!-- Authentication Links -->
                                <li class="nav-item active">    
                                    <a href="{{     route('homej')        }}" class="nav-link">Inicio</a>
                                </li>
                        </ul>
                    </div>
                @elseif (Auth::user()->tipo_usuario == 'Responsable')

                    <div class="navbar-nav mr-auto">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <!-- Authentication Links -->
                                <li class="nav-item active">    
                                    <a href="{{     route('homej')        }}" class="nav-link">Inicio</a>
                                </li>
                        </ul>
                    </div>
                
                @endif
                        
@endauth                    


                    <div class="navbar-nav justify-content-end">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>

                            </li>
                            @if (Route::has('register'))
                            <!--   
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> 
                            -->
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    </div>

            </div>
        </nav>

            @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js" integrity="sha256-fTuUgtT7O2rqoImwjrhDgbXTKUwyxxujIMRIK7TbuNU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltip.js/1.3.2/umd/tooltip.min.js" integrity="sha256-VvF1eJMngdIOoGjesEiM88JrflLgdbJWXH7WJr8juDI=" crossorigin="anonymous"></script>
    
    <!-- Full Calendar Scripts -->
    <script src="{{ asset('librerias/fullcalendar-4.2.0/packages/core/main.js') }}"></script>
    <script src="{{ asset('librerias/fullcalendar-4.2.0/packages/daygrid/main.js') }}"></script>
    <script src="{{ asset('librerias/fullcalendar-4.2.0/packages/timegrid/main.js') }}"></script>
    <script src="{{ asset('librerias/fullcalendar-4.2.0/packages/core/locales/es.js') }}"></script>
    <script src="{{ asset('librerias/fullcalendar-4.2.0/packages/core/locales/es.js') }}"></script>
        @yield('scripts')
</body>
</html>
