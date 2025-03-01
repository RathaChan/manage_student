<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/dashboard/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('/dashboard/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/dashboard/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/dashboard/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('/dashboard/plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- custom yourself -->
{{--    <link rel="stylesheet" href="{{asset('/template/css/style.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('/template/css/main-color.css')}}" id="colors">--}}
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('dashboard.header')
@include('dashboard.sidebar')
    <div class="content-wrapper">
        <section class="content">
            @yield('content')

            <div class="container-fluid">
            </div>

        </section>
    </div>
@include('dashboard.footer')

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
{{--<script src="https://code.jquery.com/jquery-3.4.1.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/dashboard/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('/dashboard/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('/dashboard/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('/dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/dashboard/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('/dashboard/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('/dashboard/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('/dashboard/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/dashboard/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/dashboard/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/dashboard/dist/js/demo.js')}}"></script>

<!-- Scripts from lafourchette
================================================== -->
{{--<script type="text/javascript" src="{{asset('/template/scripts/jquery-2.2.0.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('/template/scripts/mmenu.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('/template/scripts/chosen.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('/template/scripts/slick.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('/template/scripts/rangeslider.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('/template/scripts/magnific-popup.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('/template/scripts/waypoints.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('/template/scripts/counterup.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('/template/scripts/jquery-ui.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('/template/scripts/tooltips.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('/template/scripts/custom.js')}}"></script>--}}
@yield('pagescript')
</body>
</html>


