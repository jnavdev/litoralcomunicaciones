<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('assets/admin/img/icons/icon-48x48.png') }}" />
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link href="{{ asset('assets/admin/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    @rappasoftTableStyles
    @yield('css')
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">Litoral Comunicaciones</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Menú
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('users.index') }}">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Usuarios</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('categories.index') }}">
                            <i class="align-middle" data-feather="align-justify"></i> <span
                                class="align-middle">Categorías</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('articles.*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('articles.index') }}">
                            <i class="align-middle" data-feather="check-square"></i> <span
                                class="align-middle">Contenido</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('clients.*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('clients.index') }}">
                            <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Clientes</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img src="{{ asset('assets/admin/img/avatar.jpg') }}"
                                    class="avatar img-fluid rounded me-1" alt="{{ auth()->user()->name }}" /> <span
                                    class="text-dark">{{ auth()->user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('admin.profile.personal_information') }}"><i
                                        class="align-middle me-1" data-feather="user"></i> Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" ref="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3"><strong>@yield('title')</strong></h1>

                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                Litoral Comunicaciones &copy; {{ Carbon\Carbon::now()->year }}
                            </p>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
    @rappasoftTableScripts
    @yield('js')
</body>

</html>
