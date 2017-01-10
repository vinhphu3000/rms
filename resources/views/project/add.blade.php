<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" id="myModalLabel"><span class="fa fa-plus-circle"></span>  Add new project</h4>
</div>

<div class="modal-body">
    <div>
        <form class="form-horizontal form-label-left input_mask add-project" action="{{ url('project/add') }}" method="post">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name<span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control required-input"  name="name" placeholder="Project name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Client <span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control required-input" name="client" placeholder="Client company">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="status">
                        <?php foreach(\App\Models\Project::$project_status  as $k => $status): ?>
                            <option value="{{$k}}">{{$status['lable']}}</option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Estimate </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="number" name="estimate" class="form-control">
                    <select name="estimate_type" class="form-control">
                        <?php foreach (\App\Models\Project::$estimate_type as $key => $estimate_type):  ?>
                        <option value="{{$key}}">{{$estimate_type}}</option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            {{--<div class="form-group">--}}
                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Send request resource--}}
                {{--</label>--}}
                {{--<div class="col-md-9 col-sm-9 col-xs-12">--}}
                    {{--<div class="checkbox">--}}
                        {{--<label>--}}
                            {{--<input type="checkbox" name="is_send_request" class="flat send-request-resource">--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <input type="hidden" name="request_param">
            <input type="hidden" name="request_note">

        </form>
    </div>
    <div class="request-content" style="border-top: 0px;display:none;">
    <div class="ln_solid"></div>

    <table class="table request-content-table"  style="border-top: 0px;">
        <thead>
        <tr>
            <th>Role</th>
            <th>Number</th>
            <th>Skill</th>
            <th>Year of exp</th>
            <th><a href="javascript:void(0);" class="role-request-add" ><i class="fa fa-plus-square"></i></a></th>
        </tr>
        </thead>
        <tbody>
        <tr style="display: none;">
            <td >
                <select name="role" style="width: 100px;">
                    <?php foreach($roles as $role) : ?>
                    <option value="<?php echo $role->id ?>"><?php echo $role->name ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td ><input name="number" style="width: 50px;" type="number"/></td>
            <td >
                <select name="skill" class="select2_fisrt_multiple form-control" style="width: 200px;" multiple="multiple">
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
            <td><input name="year_of_exp" style="width: 50px;" type="number"/></td>
            <td><a href="javascript:void(0);" class="role-request-remove" ><i class="fa fa-minus-square-o"></i></a></td>
        </tr>
        <tr>
            <td >
                <select name="role" style="width: 100px;">
                    <?php foreach($roles as $role) : ?>
                        <option value="<?php echo $role->id ?>"><?php echo $role->name ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td ><input name="number" style="width: 50px;" type="number"/></td>
            <td >
                <select name="skill" class="select2_multiple form-control" style="width: 200px;" multiple="multiple">
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
            <td><input name="year_of_exp" style="width: 50px;" type="number"/></td>
            <td><a href="javascript:void(0);" class="role-request-remove" ><i class="fa fa-minus-square-o"></i></a></td>
        </tr>
        </tbody>
    </table>
        <div class="row">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Note
            </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="checkbox">
                    <label>
                        <textarea class="form-control" name="note" rows="3" cols="60"></textarea>
                    </label>
                </div>
            </div>
        </div>
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary btn-project-save">Save</button>
</div>
<div class="clearfix"></div>

<script >
    $(function () {
        'use strict';
        $('input.flat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        $( ".iCheck-helper" ).click(function() {
            $( ".request-content" ).toggle();
        });

        $(".select2_multiple").select2({
            maximumSelectionLength: 4,
            placeholder: "Select skill of request",
            allowClear: true
        });
        var index = 1;
        $('.role-request-add').click(function () {
            var tr_ = $('.request-content-table tbody').find('tr:first');
            var new_tr = tr_.clone();
            new_tr.removeAttr('style');


            new_tr.find('.select2_fisrt_multiple').addClass("select2_fisrt_multiple" + index);
            $('.request-content-table tbody').append(new_tr);

            $(".select2_fisrt_multiple" + index).select2({
                maximumSelectionLength: 4,
                placeholder: "Select skill of request",
                allowClear: true
            });


            $('.role-request-remove').unbind();
            $('.role-request-remove').click(function () {
                if ($(this).parent().parent().parent().find('tr').length > 1) {
                    $(this).parent().parent().remove();
                }
            });
        });

        $('.role-request-remove').click(function () {
            if ($(this).parent().parent().parent().find('tr').length > 1) {
                $(this).parent().parent().remove();
            }
        });

        $('.btn-project-save').click( function () {
            var isValid = true;
            $('.required-input').each( function() {
                if ($(this).val() == '') {
                    isValid = false;
                    $(this).css('border', '1px solid red');
                }
            });

            if (!isValid) {
                return;
            }

            var request_param = [];

            $('.request-content-table tbody tr').each( function () {
                var role = $(this).find('select[name=role]').find('option:selected').val();
                var number = $(this).find('input[name=number]').val();
                var skill = [];

                $(this).find('select[name=skill] option:selected').each (function () {
                    skill.push($(this).val());
                });

                var year_of_exp = $(this).find('input[name=year_of_exp]').val();

                if (role && number) {
                    request_param.push({
                        role: role,
                        number: number,
                        skill: skill,
                        year_of_exp: year_of_exp,
                    });
                }

            });
            if (request_param.length) {
                $('input[name=request_param]').val(JSON.stringify(request_param));
                $('input[name=request_note]').val($('textarea[name=note]').val());
            }


            $('.add-project').submit();
        });


    });
</script>
