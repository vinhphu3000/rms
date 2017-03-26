<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title" id="myModalLabel"><span class="fa fa-plus-circle"></span>  Add config</h4>
</div>

<div class="modal-body">
    <div>
        <form class="form-horizontal form-label-left input_mask add-project" action="{{ url('project/add') }}" method="post">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description<span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <textarea class="form-control" name="note" rows="3" cols="60"></textarea>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">All is net
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="is_send_request" class="flat send-request-resource">
                        </label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <input type="hidden" name="request_param">
            <input type="hidden" name="request_note">

        </form>
    </div>
    <div class="request-content" style="border-top: 0px;">
        <div class="ln_solid"></div>

        <table class="table request-content-table"  style="border-top: 0px;">
            <thead>
            <tr>
                <th>Event</th>
                <th>Condition</th>
                <th>Param</th>
                <th><a href="javascript:void(0);" class="condition-add" ><i class="fa fa-plus-square"></i></a></th>
            </tr>
            </thead>
            <tbody>
            <tr style="display: none;">
                <td >
                    <select class="form-control" name="event">
                        <?php foreach($event as $item) : ?>
                        <option value="<?php echo $item ?>"><?php echo $item ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td >
                    <select name="logic" class="form-control">
                        <?php foreach($default_condition_list['logicList'] as $item) : ?>
                        <option value="<?php echo $item['logic_func'] ?>"><?php echo $item['title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <?php if($default_condition_param) : ?>
                        <input name="param" style="width: 50px;" type="text"/>
                    <?php endif; ?>
                </td>
                <td><a href="javascript:void(0);" class="condition-remove" ><i class="fa fa-minus-square-o"></i></a></td>
            </tr>
            <tr>
                <td >
                    <select class="form-control" name="event">
                        <?php foreach($event as $item) : ?>
                        <option value="<?php echo $item ?>"><?php echo $item ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td >
                    <select name="logic" class="form-control">
                        <?php foreach($default_condition_list['logicList'] as $item) : ?>
                        <option value="<?php echo $item['logic_func'] ?>"><?php echo $item['title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <input name="param" style="{{!$default_condition_param ? 'display:none;' : ''}}" type="text"/>
                </td>

                <td><a href="javascript:void(0);" class="role-request-remove" ><i class="fa fa-minus-square-o"></i></a></td>
            </tr>
            </tbody>
        </table>
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

        $('select[name=event]').change( function () {
            var parent = $(this).parent().parent();
            $.ajax({
                url: "{{ url('/notification/condition?event=') }}" + $(this).val(),
                dataType: "json",
                success: function(reponse) {
                    showConditionOption(reponse);
                    showParam(parent);

                }
            });
        });

        $('select[name=logic]').change( function () {
            showParam($(this).parent().parent());
        });

        function showConditionOption(condition)
        {
            $('select[name=logic]').empty();

            $.each(condition.logicList, function(key, value) {
                $('select[name=logic]').append($("<option></option>")
                        .attr("value", value.logic_func).attr('param', value.param ? 1 : 0).text(value.title));
            });

        }

        function showParam(parent)
        {
            var param = parent.find('select[name=logic] option:selected').attr('param');
console.log(param);
            if (param == 1) {
                parent.find('input[name=param]').show();
            } else {
                parent.find('input[name=param]').hide();
            }
        }


        $('.condition-add').click(function () {
            var tr_ = $('.request-content-table tbody').find('tr:first');
            var new_tr = tr_.clone();
            new_tr.removeAttr('style');

            $('.request-content-table tbody').append(new_tr);



            $('.condition-remove').unbind();
            $('.condition-remove').click(function () {
                if ($(this).parent().parent().parent().find('tr').length > 1) {
                    $(this).parent().parent().remove();
                }
            });
        });

        $('.condition-remove').click(function () {
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

