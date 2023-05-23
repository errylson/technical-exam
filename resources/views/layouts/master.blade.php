<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ config('app.name') }} | @yield('page_name')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/vendor/AdminLTE3/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/vendor/AdminLTE3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/vendor/AdminLTE3/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/vendor/AdminLTE3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/vendor/AdminLTE3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/vendor/AdminLTE3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="/vendor/AdminLTE3/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/vendor/AdminLTE3/dist/css/adminlte.min.css">

    @yield('page_css')

</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm" id="body">
    <!-- Site wrapper -->
    <div class="wrapper">

      @include('layouts.header')
      @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>
                                @yield('page_title')
                                &nbsp;<small style="font-size: 12pt;">@yield('subtitle')</small>
                            </h1>
                            
                        </div>
                        @include('layouts.crumb')
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <!-- jQuery -->
    <script src="/vendor/AdminLTE3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/vendor/AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="/vendor/AdminLTE3/plugins/select2/js/select2.full.min.js"></script>
    
    <script src="/vendor/AdminLTE3/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/AdminLTE3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/vendor/AdminLTE3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/vendor/AdminLTE3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/vendor/AdminLTE3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- Toastr -->
    <script src="/vendor/AdminLTE3/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/vendor/AdminLTE3/dist/js/adminlte.min.js"></script>
    
    @yield('page_script')

</body>

</html>
