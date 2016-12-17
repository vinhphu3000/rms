<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-import"></span>  Import data</h4>
</div>
<div class="modal-body">
    <div>
        <form class="form-horizontal form-label-left" enctype="multipart/form-data" id="upload_form" role="form"  action="{{ url ('employee/upload-excel') }}" >
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-3">Import type</label>
                <div class="col-md-9 col-sm-9 col-xs-9">
                    <div style="-moz-user-select: none;
    background-color: #fff;
    display: inline-block;
    font-size: 16px;
    font-weight: normal;
    line-height: 0.6;
    margin-bottom: 0;
    padding: 6px 12px;
    text-align: center;
    vertical-align: middle;
    color: #333;
     border-bottom: 5px solid #2a3f54;
     border-left: 1px solid #ccc;
     border-top: 1px solid #ccc;
     border-right: 1px solid #ccc;
    white-space: nowrap;">CSV</div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-3">File</label>
                <div class="col-md-9 col-sm-9 col-xs-9">
                    <input type="file" class="file" name="csvfile" placeholder="please chooise excel file">
                    <span style="color: white;display: none"  class="msg-upload label-info">Uploading ... </span>
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-3"></label>
                <div class="col-md-9 col-sm-9 col-xs-9">
                    <button type="button" class="btn uploadBtn"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> Upload</button>
                </div>
            </div>
        </form>
    </div>
    <table class="table column-map"  style="border-top: 0px">
        <thead>
        <tr>
            <th width="274px">CSV header</th>
            <th><i class="fa fa-arrow-right"></i></th>
            <th>Table column</th>
            <th>Skip</th>
        </tr>
        </thead></table>
    <div style="height: 290px; overflow-y: scroll;overflow-x: hidden;">
        <table class="table column-map"  style="border-top: 0px">

            <tbody>
            <?php foreach ($db_column as $item): ?>
            <tr>
                <td>
                    <select name ="{{$item}}" disabled  class="csv-header">
                        <option value="">Choose CSV header</option>
                    </select>
                </td>
                <td><i class="fa fa-arrow-right"></i></td>
                <td>{{$item}} <span style="color:#1f648b;">{{$item == 'id' ? '(primary)' : ''}}</span></td>
                <td><input type="checkbox" value="1"></td>
            </tr>
            <?php endforeach; ?>

            </tbody>
        </table></div>

</div>
<div class="modal-footer">
    <input type="hidden" name="file_name" value="">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary btn-import disabled">Import</button>
</div>
<div class="clearfix"></div>

<script >
    $(function () {
        'use strict';
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

</script>