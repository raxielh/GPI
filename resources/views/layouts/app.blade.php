<!DOCTYPE html>
<html lang="es">
<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ env('APP_URL') }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('./plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('./plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('./plugins/node-waves/waves.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('./plugins/animate-css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('./css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('./css/themes/all-themes.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('./css/responsive.bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('./css/sweetalert2.css') }}" rel="stylesheet" />
    <script src="{{ URL::asset('./plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('./plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('./plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{ URL::asset('./plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ URL::asset('./plugins/node-waves/waves.js') }}"></script>
    <script src="{{ URL::asset('./plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ URL::asset('./plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('./plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ URL::asset('./plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('./plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ URL::asset('./plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('./plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('./plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('./plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('./plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>    <script src="{{ URL::asset('./js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ URL::asset('./js/twbsPagination.js') }}"></script>
    <script src="{{ URL::asset('./js/bootstrap-notify.js') }}"></script>
    <script src="{{ URL::asset('./js/dataTables.responsive.js') }}"></script>
    <script src="{{ URL::asset('./js/notificacion.js') }}"></script>
    <script src="{{ URL::asset('./js/sweetalert2.js') }}"></script>
    <script src="{{ URL::asset('./js/jquery.nestable.js') }}"></script>
    <script src="{{ URL::asset('../js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL::asset('../js/jquery-qrcode-0.14.0.js') }}"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat');
        #cargando{
            display:none;
            z-index: 99999999999;
        }
        .alert-danger{
            z-index:999999999999999999999999 !important;
        }
        .alert-success{
            z-index:999999999999999999999999 !important;
        }
        .alert-warning{
            z-index:999999999999999999999999 !important;
        }
        .pagination li.active a {
            background-color: #333 !important;
            color:#fff;
            border-radius: 25px;
        }
        .swal2-popup .swal2-styled.swal2-confirm {
            font-size: 1.5em;
        }
        .swal2-popup .swal2-styled.swal2-cancel {
            font-size: 1.5em;
        }


    </style>
</head>

<body class="theme-{{ Theme_Color() }}">

    <div class="page-loader-wrapper" style="background: #191919b3;" id="cargando">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-{{ Theme_Color() }}">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p style="color:#fff">Cargando...</p>
        </div>
    </div>

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-{{ Theme_Color() }}">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Cargando...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    @include('layouts.search_form')
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="#" style="font-family: 'Montserrat', sans-serif;font-size: 25px;font-weight: bold;">{{ env('APP_NAME') }}</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    @include('layouts.notificaciones')
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    @include('layouts.actividades')
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }}</div>
                    <div class="email">{{ Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Perfil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Salir</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    @include('layouts.menu')
                    <!-- #Menu -->
                </ul>
            </div>

            <!-- Footer -->
            @include('layouts.footer')
            <!-- #Footer -->

        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        @include('layouts.select_themes')
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
    <script src="{{ URL::asset('./js/admin.js') }}"></script>
    <script src="{{ URL::asset('./js/demo.js') }}"></script>
    <script src="{{ URL::asset('./js/app.js') }}"></script>
</body>

</html>


