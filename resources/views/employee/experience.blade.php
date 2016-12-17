<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-certificate"></span>  Experience update</h4>
</div>

<div class="modal-header employee_name_title">
    <h4>Le Quang Thieu</h4>
</div>
<div class="modal-body">
    <div>
        <form class="form-horizontal form-label-left" enctype="multipart/form-data" id="upload_form" role="form"  action="{{ url ('employee/upload-excel') }}" >
            <div class="right col-xs-2 text-center">
                <img src="{{ asset(Config::get('constants.PATH_AVATAR') . Config::get('constants.DEFAULT_AVATAR')) }}" alt="" class="img-circle img-responsive">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-16 profile_details">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">CV</label>
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

            </div>

        </form>
    </div>
    <table class="table"  style="border-top: 0px">
        <thead>
        <tr>
            <th style="width: 200px;">Name</th>
            <th>Experience</th>
            <th>Level</th>
            <th><a href="javascript:void(0);" class="experience-add" ><i class="fa fa-plus-square"></i></a></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div  style="height: 290px; overflow-y: scroll;overflow-x: hidden;">

        <table class="table table-experience"  style="border-top: 0px;width:100%">
            <tr style="display: none;">
                <td>
                    <select class="rms-select2">
                        <?php foreach ($employee_exp as $option) : ?>
                        <option value="{{$option->id}}">{{$option->name}}</option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td><input type="number"> month</td>
                <td>
                    <select class="rms-select2" >
                        <option value="1">Novice</option>
                        <option value="2">Advanced Beginer</option>
                        <option value="3">Competent</option>
                        <option value="4">Proficient</option>
                        <option value="5">Expert</option>
                    </select>
                </td>
                <td><a href="javascript:void(0);" class="experience-remove" ><i class="fa fa-minus-square-o"></i></a></td>
            </tr>
            <tr>
                <td>
                    <select class="rms-select2">
                        <?php foreach ($employee_exp as $option) : ?>
                        <option value="{{$option->id}}">{{$option->name}}</option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td><input type="number"> month</td>
                <td>
                    <select class="rms-select2" >
                        <option value="1">Novice</option>
                        <option value="2">Advanced Beginer</option>
                        <option value="3">Competent</option>
                        <option value="4">Proficient</option>
                        <option value="5">Expert</option>
                    </select>
                </td>
                <td><a href="javascript:void(0);" class="experience-remove" ><i class="fa fa-minus-square-o"></i></a></td>
            </tr>
        </table>
    </div>

</div>
<div class="modal-footer">
    <input type="hidden" name="file_name" value="">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary btn-import disabled">Save</button>
</div>
<div class="clearfix"></div>
<script >
    $(function () {
        'use strict';
        $('.experience-add').click(function () {
            var tr_ = $('.table-experience').find('tr:first');
            var new_tr = tr_.clone();
            new_tr.removeAttr('style');
            $('.table-experience').append(new_tr);
            $('.experience-remove').unbind();
            $('.experience-remove').click(function () {
                if ($(this).parent().parent().parent().find('tr').length > 1) {
                    $(this).parent().parent().remove();
                }

            });
        });

        $('.experience-remove').click(function () {
            if ($(this).parent().parent().parent().find('tr').length > 1) {
                $(this).parent().parent().remove();
            }

        });
    });

</script>
