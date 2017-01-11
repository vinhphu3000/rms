<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RMS - Resource Allocate Management System </title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset("gentelella/vendors/bootstrap/dist/css/bootstrap.css") }}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("gentelella/vendors/font-awesome/css/font-awesome.min.css") }}" />
    <!-- NProgress -->
    <link rel="stylesheet" href="{{ asset("gentelella/vendors/nprogress/nprogress.css") }}" />

    <link rel="stylesheet" href="{{ asset("gentelella/vendors/select2/dist/css/select2.css") }}" />
    <!-- Icheck-->
    <link href="{{ asset("gentelella/vendors/iCheck/skins/flat/green.css") }}" rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset("gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css") }}" rel="stylesheet">



    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{ asset("gentelella/build/css/custom.css") }}" />
    <link href="{{ asset("js/vendor/jalert/jAlert.css") }}" rel="stylesheet" type="text/css" media="screen" />


</head>

<body class="nav-md">
<div class="container body ">
    <!-- top navigation -->
        @include('widgets.navbar-project')
    <!-- /top navigation -->
    <div class="main_container ">
        <div class="col-md-3 left_col menu_fixed">
            <div class="left_col scroll-view">

                @include('widgets.list-request')

            </div>
        </div>



        <!-- page content -->
        <div class="right_col" role="main" style="max-height: 450px;
    overflow-x: hidden;
    overflow-y: auto;">
            @yield('section')
        </div>
        <!-- /page content -->


    </div>
    <!-- footer content -->
    <footer>
        <div class="pull-right">
           RMS
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

</div>
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">

        </div>
    </div>
</div>
<!-- jQuery -->
<script src="{{ asset("gentelella/vendors/jquery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap -->
<script src="{{ asset("gentelella/vendors/bootstrap/dist/js/bootstrap.min.js") }}"></script>


<!-- FastClick -->
<script src="{{ asset("gentelella/vendors/select2/dist/js/select2.full.js") }}"></script>
<!-- NProgress -->
<script src="{{ asset("gentelella/vendors/nprogress/nprogress.js") }}"></script>
<!-- icheck -->
<script src="{{ asset("gentelella/vendors/iCheck/icheck.min.js") }}"></script>

<!--date picker-->
<script src="{{ asset("gentelella/vendors/moment/min/moment.min.js") }}"></script>
<script src="{{ asset("gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js") }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset("gentelella/build/js/custom.js") }}"></script>

<script src="{{ asset("js/vendor/jalert/jAlert.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/vendor/jalert/jAlert-functions.js") }}" type="text/javascript"></script>



<script>
    /*jslint unparam: true */
    /*global window, $ */
    $(function () {
        'use strict';
        $(".select2").select2();
        /*Add new catagory Event*/
        /**
         * event to click select all check box
         */
        $('.check-all').click(function (){
            $('.employee-id').not(this).prop('checked', this.checked);
        });

        $('.link-popup').click(function (e) {
            openPopup($(this).attr('url'), []);
        });


        $('.booking').click(function() {
            var data = {employee_id: $(this).attr('employee-id'), project_id: $(this).attr('project-id') };

            openPopup($(this).attr('url'), data)
        });


        $('.book-edit').click(function() {
            var data = {id: $(this).attr('id')};

            openPopup($(this).attr('url'), data)
        });

        function openPopup(url, data) {
            $.ajax({
                url: url,
                data:data,
                dataType: "html",
                success: function(reponse) {
                    $('.modal-content').html(reponse);
                    $('#myModal').modal({show:true});
                }
            });
        }

        $('.project-item').click(function () {
            $.ajax({
                url: $(this).attr('url'),
                dataType: "html",
                success: function (reponse) {
                    $('.right_col').html(reponse);
                    $(this).parent().addClass('active');
                }
            });
        });




    });
    $(document).on({
        ajaxStart: function() { $("body").addClass("loading"); },
        ajaxStop: function() { $("body").removeClass("loading"); $('.loader-msg').text('Loading... '); }
    });


</script>
<div class="animationload">
<div class="loader">
    <p class="loader-msg">Loading...</p>
    <div class="loader-inner"></div>
    <div class="loader-inner"></div>
    <div class="loader-inner"></div>
</div>
    </div>


</body>
</html>
