<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @yield('css')

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'UTM') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--Inicia Menu -->
                @guest
                @else
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        {{-- Inicia menu Izquierdo --}}
                        <ul class="navbar-nav me-auto">
                            @can('viewAny', App\Models\Admin::class)
                                <li class="nav-item dropdown">
                                    <a class="nav-link {{ (request()->is('alumnos') or request()->is('asignar')) ? 'active' : '' }} dropdown-toggle"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Alumnos
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('alumnos.index') }}">Alumnos</a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.asignar') }}">Asignar Director de
                                                Tesis</a></li>
                                    </ul>
                                </li>



                                <li class="nav-item dropdown">
                                    <a class="nav-link {{ (request()->is('empresa') or request()->is('asesorempresas')) ? 'active' : '' }} dropdown-toggle"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Empresa
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('empresas') ? 'active' : '' }}"
                                                href="{{ route('empresas.index') }}">Empresas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('asesorempresas') ? 'active' : '' }}"
                                                href="{{ route('asesorempresas.index') }}">Asesor Empresarial</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('carreras') ? 'active' : '' }}"
                                        href="{{ route('carreras.index') }}">Carreras</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('subdirectors') ? 'active' : '' }}"
                                        href="{{ route('subdirectors.index') }}">Subdirectores</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('lineas') ? 'active' : '' }}"
                                        href="{{ route('lineas.index') }}">Líneas de Investigación</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->is('directortesis') or request()->is('asignados')) ? 'active' : '' }}"
                                        href="{{ route('directortesis.index') }}">Director de Tesis</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('programas') ? 'active' : '' }}"
                                        href="{{ route('programas.index') }}">Programa Educativo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('documentos') ? 'active' : '' }}"
                                        href="{{ route('documentos.index') }}">Tesis/Tesinas</a>
                                </li>
                            @endcan

                        </ul>


                        {{-- Fin menu izquierdo --}}

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                {{--
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                            --}}
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                @endguest
                <!-- Finaliza Menu-->
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    @yield('js')
</body>

</html>
