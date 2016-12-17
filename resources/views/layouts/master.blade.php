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
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset("gentelella/vendors/iCheck/skins/flat/green.css") }}" />

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
<script src="{{ asset("gentelella/vendors/fastclick/lib/fastclick.js") }}"></script>
<!-- NProgress -->
<script src="{{ asset("gentelella/vendors/nprogress/nprogress.js") }}"></script>
<!-- iCheck -->
<script src="{{ asset("gentelella/vendors/iCheck/icheck.min.js") }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset("gentelella/build/js/custom.min.js") }}"></script>

<script src="{{ asset("js/upload/vendor/jquery.ui.widget.js") }}"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="{{ asset("js/upload/jquery.iframe-transport.js") }}"></script>
<!-- The basic File Upload plugin -->
<script src="{{ asset("js/upload/jquery.fileupload.js") }}"></script>
<script src="{{ asset("js/vendor/jalert/jAlert.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/vendor/jalert/jAlert-functions.js") }}" type="text/javascript"></script>


<script>
    /*jslint unparam: true */
    /*global window, $ */
    $(function () {
        'use strict';
        /*Add new catagory Event*/
        $(".uploadBtn").click(function(){
            $('.loader-msg').text('Uploading ... ');
            $.ajax({
                url:'{{ url ('employee/upload-excel') }}',
                data: new FormData($("#upload_form")[0]),
                dataType:'json',
                async:false,
                type:'post',
                processData: false,
                contentType: false,
                success:function(response){
                    $('.msg-upload').show();
                    $('.msg-upload').removeClass('label-info');
                    $('.msg-upload').addClass('label-success');
                    $('.msg-upload').text('Upload Completed!');
                    $('input[name=file_name]').val(response.filename);
                    $.each(response.header, function (i, header) {
                        $('.csv-header').append($('<option>', {
                            value: header,
                            text : header
                        }));
                    });
                    $('.csv-header').removeAttr('disabled');
                    $('.csv-header').each(function(){
                        var header_op =  $(this);
                        $(this).find('option').each(function () {
                            if ($(this).attr('value') == header_op.attr('name')) {
                                $(this).attr('selected',1)
                                return;
                            }
                        })

                    });
                    $('.btn-import').removeClass('disabled');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    if (xhr.status == 0) {
                        errorAlert('An error occurs during upload data, please try again!!');
                        return;
                    }
                    $('.msg-upload').show();
                    $('.msg-upload').removeClass('label-info');
                    $('.msg-upload').removeClass('label-success');
                    if (xhr.responseJSON.csvfile)
                        $('.msg-upload').html(xhr.responseJSON.csvfile);
                    else
                        $('.msg-upload').html('File csv is invalid!!');
                    $('.msg-upload').addClass('label-danger');

                }
            });
        });


        $(".btn-import").click(function(){
            $('.loader-msg').text('Importing ... ');
            var mColumn = [];
            $('.column-map tbody tr').each(function(){
                var column = $(this).find('.csv-header');
                if (!$(this).find("input:checkbox").is(':checked') && column.find(":selected").val() != '') {
                    var item = {};
                    item['db_column'] = column.attr('name');
                    item['csv_column'] = column.find(":selected").val();
                    item['default'] = '';
                    mColumn.push(item);
                }

            });
            $.ajax({
                url:'{{ url ('employee/import') }}',
                data: {map_column : JSON.stringify(mColumn), file_name : $('input[name=file_name]').val(), _token : $('input[name=_token]').val()},
                async:false,
                type:'post',
                success:function(response){
                    location.href = "{{ url ('employee') }}";
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    errorAlert('An error occurs during data import, please check your csv file');

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
