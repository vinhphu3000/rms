<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RAT </title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset("gentelella/vendors/bootstrap/dist/css/bootstrap.css") }}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("gentelella/vendors/font-awesome/css/font-awesome.min.css") }}" />
    <!-- NProgress -->
    <link rel="stylesheet" href="{{ asset("gentelella/vendors/nprogress/nprogress.css") }}" />
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset("gentelella/vendors/iCheck/skins/flat/green.css") }}" />

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{ asset("gentelella/build/css/custom.min.css") }}" />
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><span>RMS</span></a>
                    <span>Resources Management System</span>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <!-- sidebar menu -->
                @include('widgets.profile')

                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                @include('widgets.menu')


            </div>
        </div>

        <!-- top navigation -->
            @include('widgets.navbar')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            @yield('section')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset("gentelella/vendors/jquery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap -->
<script src="{{ asset("gentelella/vendors/jquery/dist/bootstrap.min.js") }}"></script>
<!-- FastClick -->
<script src="{{ asset("gentelella/vendors/fastclick/lib/fastclick.js") }}"></script>
<!-- NProgress -->
<script src="{{ asset("gentelella/vendors/nprogress/nprogress.js") }}"></script>
<!-- iCheck -->
<script src="{{ asset("gentelella/vendors/iCheck/icheck.min.js") }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset("gentelella/build/js/custom.min.js") }}"></script>
</body>
</html>
