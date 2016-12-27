<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" id="myModalLabel"><span class="fa fa-plus-circle"></span>  Create new request</h4>
</div>

<div class="modal-body">
    <form class="form-horizontal form-label-left input_mask add-project" action="{{ url('request/add') }}" method="post">
    <div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Project name<span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                   <h4> {{$project->name}} </h4>
                </div>
            </div>

            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Request resource<span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="role">
                    <?php foreach($roles as $role) : ?>
                    <option value="<?php echo $role->id ?>"><?php echo $role->name ?></option>
                    <?php endforeach; ?>
                </select>
                <a href="javascript:void(0);" class="role-tab-add" ><i class="fa fa-plus-square"></i></a>
            </div>
        </div>
    </div>
    <div class="request-content">
        <div class="ln_solid"></div>

        <div class="col-xs-3">
            <!-- required for floating -->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-left">

            </ul>
        </div>

        <div class="col-xs-9">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane tab-pane-first" style="display: none">
                    <div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Number<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input name="number"  value="1" class="form-control" type="number"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Start time
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Skill<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
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
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Year of exp<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="year_of_exp" class="form-control" type="number"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Note
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="form-control" name="note" rows="3" cols="60"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token()}}">
    </div>
</form>
</div>
<div class="modal-footer">
    <input type="hidden" name="file_name" value="">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary btn-project-save">Save</button>
</div>
<div class="clearfix"></div>

<script >
    $(function () {
        'use strict';




        $(".select2_multiple").select2({
            maximumSelectionLength: 4,
            placeholder: "Select skill of request",
            allowClear: true
        });
        var index = 1;

        $('.role-tab-add').click(function () {

            var li = '<li role="' + $('select[name=role] option:selected').val() + '"><i style="cursor: pointer;position: absolute;margin-left: -14px; margin-top: 0px" class="fa fa-minus-square-o role-request-remove" remove-id="' + index + '"></i><a id="a' + index + '" href="#tab' + index + '" data-toggle="tab">' + $('select[name=role] option:selected').text() + ' (1)</a></li>';
            $('.nav-tabs').append(li);

            var pane = $('.tab-pane-first').clone();
            pane.removeAttr('style');
            pane.attr('id', 'tab' + index);

            pane.find('.select2_fisrt_multiple').addClass("select2_fisrt_multiple" + index);
            pane.find('input[name=number]').attr('tab-tile','#a' + index);
            pane.find('input[name=number]').addClass('number' + index);
            $('.tab-content').append(pane);
            var tab_current = $('#a' + index);
            tab_current.click();
            $('.number' + index).change( function() {
                var tab_title = $('select[name=role] option:selected').text() + ' (' + $(this).val() + ')';
                tab_current.html(tab_title);
            });
            $(".select2_fisrt_multiple" + index).select2({
                maximumSelectionLength: 4,
                placeholder: "Select skill of request",
                allowClear: true
            });

            $('#tab' + index).find('.date-picker').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4"
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });

            $('.role-request-remove').unbind();
            $('.role-request-remove').click(function () {
                var is_active = $(this).parent().hasClass('active');
                $(this).parent().remove();
                var content_tab_id =  '#tab' + $(this).attr('remove-id');
                $(content_tab_id).remove();
                if(is_active){
                    $('.nav-tabs li:first a').click();
                }
            });

            index++;

        });


        $('.btn-project-save').click( function () {
            var isValid = true;
            $('.required-input').each( function() {
                if ($(this).val() == '') {
                    isValid = false;
                    $(this).css('border', '1px solid red');
                }
            });
            if (isValid) {
                $('.add-project').submit();
            }
        });
    });
</script>
