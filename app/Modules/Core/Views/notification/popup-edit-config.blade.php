<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title" id="myModalLabel"><span class="fa fa-plus-circle"></span>  Update config</h4>
</div>

<div class="modal-body">
    <div>
        <form class="form-horizontal form-label-left input_mask add-config-notify" action="{{ url('notification/config/add') }}" method="post">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description<span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <textarea class="form-control required-input" name="description" rows="3" cols="60"><?php echo $config->description ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">All is net
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" <?php echo $config->all_is_net ? 'checked value="1"' : 'value = "0" ' ?> onclick="if(this.checked) this.value=1;else this.value=0" name="all_is_net" class="flat send-request-resource">
                        </label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <input type="hidden" name="id" value="{{ $config->id }}">
            <input type="hidden" name="condition_param">
            <input type="hidden" name="action_param">

        </form>
    </div>
    <div class="request-content" style="border-top: 0px;">
        <div class="ln_solid"></div>

        <table class="table condition-content-table"  style="border-top: 0px;">
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
                        <?php foreach($event as $key => $item) : ?>
                        <option value="<?php echo $key ?>"><?php echo $item ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td >
                    <select name="logic" class="form-control">
                        <?php foreach($default_condition_list['logicList'] as $key => $item) : ?>
                        <option param="<?php echo $item['param'] ?>" value="<?php echo $key ?>"><?php echo $item['title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <input name="param" style="{{!$default_condition_param ? 'display:none;' : ''}}" type="text"/>
                </td>
                <td><a href="javascript:void(0);" class="condition-remove" ><i class="fa fa-minus-square-o"></i></a></td>
            </tr>
            <?php foreach ($conditions as $condition) : ?>
            <tr>
                <td >
                    <select class="event form-control" name="event">
                        <?php foreach($event as $key => $item) : ?>
                        <option <?php echo $condition->event == $key ? 'selected' : '' ?> value="<?php echo $key ?>"><?php echo $item ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td >
                    <select name="logic" class="logic form-control">
                        <?php foreach($condition->getLogicList()['logicList'] as $key => $item) : ?>
                        <option <?php echo $condition->logic == $key ? 'selected' : '' ?>  param="<?php echo $item['param'] ?>" value="<?php echo $key ?>"><?php echo $item['title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <input name="param" value="<?php echo $condition->param ?>" style="{{!$condition->getLogicList()['logicList'][$condition->logic]['param'] ? 'display:none;' : ''}}" type="text"/>
                </td>

                <td><a href="javascript:void(0);" class="condition-remove" ><i class="fa fa-minus-square-o"></i></a></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Action
            </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="action">
                    <?php foreach($action as $key => $item) : ?>
                    <option <?php echo $config->action == $key ? 'selected' : '' ?>  value="<?php echo $key ?>"><?php echo $item['title'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary btn-config-save">Save</button>
</div>
<div class="clearfix"></div>

<script >
    $(function () {
        'use strict';

        $('.event').change( function () {
            var parent = $(this).parent().parent();
            loadCondition(parent, $(this).val());
        });


        $('.logic').change( function () {
            showParam($(this).parent().parent());
        });
        function loadCondition(parent, val)
        {
            $.ajax({
                url: "{{ url('/notification/condition?event=') }}" + val,
                dataType: "json",
                success: function(reponse) {
                    showConditionOption(reponse, parent);
                    showParam(parent);

                }
            });
        }

        function showConditionOption(condition, parent)
        {
            var this_logic = parent.find('select[name=logic]');
            this_logic.empty();
            $.each(condition.logicList, function(key, value) {
                this_logic.append($("<option></option>")
                        .attr("value", key).attr('param', value.param ? 1 : 0).text(value.title));
            });

        }

        function showParam(parent)
        {
            var param = parent.find('select[name=logic] option:selected').attr('param');

            if (param == 1) {
                parent.find('input[name=param]').show();
            } else {
                parent.find('input[name=param]').hide();
            }
        }


        $('.condition-add').click(function () {
            var tr_ = $('.condition-content-table tbody').find('tr:first');
            var new_tr = tr_.clone();
            new_tr.removeAttr('style');
            new_tr.find('select[name=event]').addClass('event');
            new_tr.find('select[name=logic]').addClass('logic');

            $('.condition-content-table tbody').append(new_tr);
            $('.event').unbind('change');
            $('.logic').unbind('change');
            $('.condition-remove').unbind('click');

            $('.event').change( function () {
                var parent = $(this).parent().parent();
                loadCondition(parent, $(this).val());
            });
            $('.logic').change( function () {
                showParam($(this).parent().parent());
            });

            $('.condition-remove').click( function () {
                if ($(this).parent().parent().parent().find('tr').length > 1) {
                    $(this).parent().parent().remove();
                }
            });

        });

        $('.condition-remove').click( function () {
            if ($(this).parent().parent().parent().find('tr').length > 1) {
                $(this).parent().parent().remove();
            }
        });

        $('.btn-config-save').click( function () {
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

            var action = $('select[name=action] option:selected').val();
            $('input[name=action_param]').val(action);

            var condition_param = [];

            $('.condition-content-table tbody tr').each( function (index, value) {
                var event = $(this).find('select[name=event] option:selected').val();
                var logic = $(this).find('select[name=logic] option:selected').val();
                var param = $(this).find('input[name=param]').val();


                var year_of_exp = $(this).find('input[name=year_of_exp]').val();

                if (event && logic && index > 0) {
                    condition_param.push({
                        event: event,
                        logic: logic,
                        param: param
                    });
                }

            });
            if (condition_param.length) {
                $('input[name=condition_param]').val(JSON.stringify(condition_param));
            }

            $('.add-config-notify').submit();
        });


    });
</script>

