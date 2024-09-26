<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&family=Ubuntu:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/color-schemes/primary-nav/violet/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color-schemes/primary-nav/violet/nifty.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo-purpose/demo-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo-purpose/demo-settings.min.css') }}">
    @yield('styles')
</head>

<body>
    <div id="root" class="root front-container">
        <section id="content" class="content">
            <div class="content__boxed w-100 min-vh-100 d-flex flex-column align-items-center justify-content-center">
                <div class="content__wrap">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer class="mt-auto">
        <div class="content__boxed">
            <div class="content__wrap py-3 py-md-1 d-flex flex-column flex-md-row align-items-md-center">
                <div class="text-nowrap mb-4 mb-md-0">Unidad de Desarrollo 2021 - 2024 <a
                        href="https://www.zapopan.gob.mx/v3/" class="ms-1 btn-link fw-bold">Gobierno de
                        Zapopan</a></div>
                <nav class="nav flex-column gap-1 flex-md-row gap-md-3 ms-md-auto" style="row-gap: 0 !important;">
                </nav>
            </div>
        </div>
    </footer>

    @section('script')
    <script src="{{ asset('vendors/jquery/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/login/validation.js') }}"></script>
    <script src="{{ asset('vendors/toast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendors/popper.js/popper.min.js')}}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendors/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{ asset('vendors/jquery-scrollLock/jquery-scrollLock.min.js')}}"></script>
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/pages/op_auth_signin.min.js') }}"></script>

    @show
</body>

</html>
