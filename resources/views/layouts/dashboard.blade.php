<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <meta name="description" content="Dashboard page with mini navigation to save space for displaying more content.">
    <title>Dashboard</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&family=Ubuntu:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/color-schemes/primary-nav/violet/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color-schemes/primary-nav/violet/nifty.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo-purpose/demo-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo-purpose/demo-settings.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css') }}">
    @yield('styles')
</head>


<body class="jumping" style="">
    <div id="root" class="root mn--min mn--sticky hd--sticky hd--fair">
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- SIDE BAR-->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <header class="header">
            <div class="header__inner">
                <div class="header__brand">
                </div>
                <div class="header__content">
                    <div class="header__content-start">
                        <!-- Navigation button -->
                        <button type="button" class="nav-toggler header__btn btn btn-icon btn-sm"
                            aria-label="Nav Toggler">
                            <i class="demo-psi-view-list"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- END - SIDE BAR -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!-- MAIN NAVIGATION -->
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <nav id="mainnav-container" class="mainnav">
            <div class="mainnav__inner">
                <div class="mainnav__top-content scrollable-content pb-5">
                    <div class="mainnav__profile mt-3 d-flex3">
                        <div class="mt-2 d-mn-max"></div>

                        <!-- Profile picture  -->
                        <div class="mininav-toggle text-center py-2">
                            <img class="mainnav__avatar img-md rounded-circle border" src="media/1.png"
                                alt="Profile Picture">
                        </div>
                        <div class="mininav-content collapse d-mn-max">
                            <div class="d-grid">
                                <!-- User name and position -->
                                <button class="d-block btn shadow-none p-2" data-bs-toggle="collapse"
                                    data-bs-target="#usernav" aria-expanded="false" aria-controls="usernav">
                                    <span class="dropdown-toggle d-flex justify-content-center align-items-center">
                                        <h6 class="mb-0 me-3">Jorel Alejandro Meza Hernández</h6>
                                    </span>
                                    <small class="text-muted">Administrador</small>
                                </button>
                                <div id="usernav" class="nav flex-column collapse">
                                    <a href="{{ route('user.profile') }}" class="nav-link">
                                        <i class="demo-pli-male fs-5 me-2"></i>
                                        <span class="ms-1">Perfil</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Navigation menu -->
                    <div class="mainnav__categoriy py-3">
                        <h6 class="mainnav__caption mt-0 px-3 fw-bold">Navegación</h6>
                        <ul class="mainnav__menu nav flex-column">
                            <li class="nav-item has-sub">
                                <a href="{{ route('menu') }}" class="mininav-toggle nav-link active"><i
                                        class="demo-pli-home fs-5 me-2"></i>
                                    <span class="nav-label ms-1">Menú</span>
                                </a>
                                <ul class="mininav-content nav collapse">
                                    <li class="nav-item">
                                        <a href="{{ route('newrecord') }}" class="nav-link">Crear reporte</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('recordlist') }}" class="nav-link">Registros</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('user.newuser') }}" class="nav-link">Nuevo usuario</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('user.adminuser') }}" class="nav-link">Administrar usuarios</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- EXIT Button -->
                <div class="mainnav__bottom-content border-top pb-2">
                    <ul id="mainnav" class="mainnav__menu nav flex-column">
                        <li class="nav-item has-sub">
                            <a href="{{ route('logout') }}" class="nav-link mininav-toggle collapsed" aria-expanded="false">
                                <i class="demo-pli-unlock fs-5 me-2"></i>
                                <span class="nav-label ms-1">Salir</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>


    @section('script')
        <script src="{{ asset('vendors/popperjs/popper.min.js') }}" defer></script>

        <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}" defer></script>

        <script src="{{ asset('js/nifty.js') }}" defer></script>

        <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}" defer></script>

        <script src="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}" defer></script>
    @show
</body>

</html>
