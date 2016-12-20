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
    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{ asset("gentelella/build/css/custom.css") }}" />
    <link href="{{ asset("js/vendor/jalert/jAlert.css") }}" rel="stylesheet" type="text/css" media="screen" />
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title">
                    <a href="index.html"><h3 style="text-align: center; color:#ecf0f1">RMS</h3></a>
                    <div style="width: 100%; text-align: center; color:#ecf0f1" >Resource Allocation Management
                    </div>

                </div>
                <div class="clearfix"></div>
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
                RMS
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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

<!-- Custom Theme Scripts -->
<script src="{{ asset("gentelella/build/js/custom.min.js") }}"></script>

<script src="{{ asset("js/vendor/jalert/jAlert.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/vendor/jalert/jAlert-functions.js") }}" type="text/javascript"></script>


<script>
    /*jslint unparam: true */
    /*global window, $ */
    $(function () {
        'use strict';
        /*Add new catagory Event*/
        /**
         * event to click select all check box
         */
        $('.check-all').click(function (){
            $('.employee-id').not(this).prop('checked', this.checked);
        });

        $('.link-popup').click(function (e) {
            openPopup($(this).attr('url'), []);
            e.preventDefault();
        });

        $('.experience').click(function() {
            var data = {employee_ids: [] };
            $('input:checkbox[name=employee_ids]:checked').each(function()
            {
                data.employee_ids.push($(this).val());
            });
            if (data.employee_ids.length <= 0) {
                warningAlert('Missing', 'Please choose employee first!');
                return ;
            }
            openPopup($(this).attr('url'), data)
        });

        $('.view-matrix').click(function() {
            var data = {employee_ids: [$(this).attr('id')] };

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
