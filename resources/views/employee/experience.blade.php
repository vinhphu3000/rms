<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-certificate"></span>  Experience update</h4>
</div>

<div class="modal-header employee_name_title">
    <h4>
        <?php if (count($next_employee_ids) > 1) : ?>
            <button type="button" class="btn btn-trans prev-employee" ><i class="glyphicon glyphicon-fast-backward" ></i></button>
        <?php endif; ?>
            {{$employee->first_name}} {{$employee->last_name}}
        <?php if (count($next_employee_ids) > 1) : ?>
            <button type="button" class="btn btn-trans next-employee" id="121" ><i class="glyphicon glyphicon-fast-forward" ></i></button>
        <?php endif; ?>
    </h4>

</div>
<div class="modal-body">
    <div>
        <form class="form-horizontal form-label-left" enctype="multipart/form-data" id="upload_form" role="form"  action="{{ url ('employee/upload-cv') }}" >
            <div class="right col-xs-2 text-center">
                <img src="{{ asset(Config::get('constants.PATH_AVATAR') . Config::get('constants.DEFAULT_AVATAR')) }}" alt="" class="img-circle img-responsive">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-16 profile_details">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">CV</label>
                    <?php if (!empty($cv_file['display_name'])) : ?>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <span><a href="{{url('employee/download-cv/' . $cv_file['md5_name'])}}"> {{$cv_file['display_name']}}</a></span>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <input type="file" class="file" name="cvfile">(.docx, .doc, .pdf)
                        <input type="hidden"  name="employee_id" value="{{$employee->id}}">
                        <span style="color: white;display: none"  class="msg-upload label-info">Uploading ... </span>
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3"></label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <button type="button" class="btn uploadCVBtn"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> Upload</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <h4>Skill matrix</h4>
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
                    <select class="rms-select2" name="exp_id">
                        <option value="">-- Select --</option>
                        <?php $last_type = ''; ?>
                        <?php foreach ($employee_exp as $option) : ?>
                            <?php if ($option->type != $last_type) :  ?>
                                    <?php if ($last_type != '') : ?>
                                        </optgroup>
                                    <?php endif; ?>
                                    <optgroup label="{{$option->type}}">
                            <?php endif;?>
                                <option value="{{$option->id}}">{{$option->name}}</option>
                                <?php $last_type = $option->type; ?>
                        <?php endforeach; ?>
                                    </optgroup>
                    </select>
                </td>
                <td><input type="number" name="month"> month
                    <input type="hidden" name="id" value=""></td>
                <td>
                    <select class="rms-select2" name="level" >
                        <option value="">-- Select --</option>
                        <option value="1">Novice</option>
                        <option value="2">Advanced Beginer</option>
                        <option value="3">Competent</option>
                        <option value="4">Proficient</option>
                        <option value="5">Expert</option>
                    </select>
                </td>
                <td><a href="javascript:void(0);" class="experience-remove" ><i class="fa fa-minus-square-o"></i></a></td>
            </tr>
            <?php foreach ($experience as $item) : ?>
            <tr>
                <td>
                    <select class="rms-select2" name="exp_id">
                        <option value="">-- Select --</option>
                        <?php $last_type = ''; ?>
                        <?php foreach ($employee_exp as $key => $option) : ?>
                        <?php if ($option->type != $last_type) :  ?>
                        <?php if ($last_type != '') : ?>
                            </optgroup>
                        <?php endif; ?>
                            <optgroup label="{{$option->type}}">
                        <?php endif;?>
                            <option {{$item->exp_id == $option->id ? 'selected' : ''}} value="{{$option->id}}">{{$option->name}}</option>
                            <?php $last_type = $option->type; ?>
                        <?php endforeach; ?>
                            </optgroup>

                    </select>
                </td>
                <td><input type="number" name="month" value="{{$item->month}}"> month
                    <input type="hidden" name="id" value="{{$item->id}}">
                </td>
                <td>
                    <select class="rms-select2" name="level" >
                        <option value="">-- Select --</option>
                        <option {{$item->level == 1 ? 'selected' : ''}} value="1">Novice</option>
                        <option {{$item->level == 2 ? 'selected' : ''}} value="2">Advanced Beginer</option>
                        <option {{$item->level == 3 ? 'selected' : ''}} value="3">Competent</option>
                        <option {{$item->level == 4 ? 'selected' : ''}} value="4">Proficient</option>
                        <option {{$item->level == 5 ? 'selected' : ''}} value="5">Expert</option>
                    </select>
                </td>
                <td><a href="javascript:void(0);" class="experience-remove" ><i class="fa fa-minus-square-o"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div>
<div class="modal-footer">
    <input type="hidden" name="file_name" value="">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary btn-experience-save">Save</button>
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

        $(".btn-experience-save").click(function(){
            $('.loader-msg').text('Saving ... ');
            var experience_data = [];
            $('.table-experience tbody tr').each( function () {

                var exp_id = $(this).find('select[name=exp_id]').find('option:selected').val();
                var month = $(this).find('input[name=month]').val();
                var id = $(this).find('input[name=id]').val();
                var level = $(this).find('select[name=level]').find('option:selected').val();
                if (exp_id) {
                    experience_data.push({
                        id: id,
                        exp_id: exp_id,
                        month: month,
                        level: level,
                    });
                }

            });
            $.ajax({
                url:'{{ url ('employee/experience-save') }}',
                data: {experience_data : JSON.stringify(experience_data), employee_id : $('input[name=employee_id]').val(), _token : $('input[name=_token]').val()},
                async:false,
                type:'post',
                success:function(response){
                    successAlert('Save experience successful!');
                    //location.href = "{{ url ('employee') }}";
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    errorAlert('An error occurs during save data, please try again');

                }
            });
        });

        $(".uploadCVBtn").click(function() {
            $('.loader-msg').text('Uploading ... ');
            $.ajax({
                url:'{{ url ('employee/upload-cv') }}',
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
                    $('.msg-upload').html('Completed!<br/>' + response.display_file_name);
                    $('input[name=file_name]').val(response.display_file_name);

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    if (xhr.status == 0) {
                        errorAlert('An error occurs during upload data, please try again!!');
                        return;
                    }
                    $('.msg-upload').show();
                    $('.msg-upload').removeClass('label-info');
                    $('.msg-upload').removeClass('label-success');
                    if (xhr.responseJSON.cvfile)
                        $('.msg-upload').html(xhr.responseJSON.cvfile);
                    else
                        $('.msg-upload').html('File cv is invalid!!');

                    $('.msg-upload').addClass('label-danger');

                }
            });
        });

        $('.next-employee').click (function () {
                $.ajax({
                    url: '{{ url('experience-popup') }}',
                    data:{employee_ids: [{{implode(',', $next_employee_ids)}}] },
                    dataType: "html",
                    success: function(reponse) {
                        $('.modal-content').html(reponse);
                    }
                });
        });

        $('.prev-employee').click (function () {
            $.ajax({
                url: '{{ url('experience-popup') }}',
                data:{employee_ids: [{{implode(',', $prev_employee_ids)}}] },
                dataType: "html",
                success: function(reponse) {
                    $('.modal-content').html(reponse);
                }
            });
        });

    });

</script>
