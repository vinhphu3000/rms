<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" id="myModalLabel">{{$employee->fullName()}}</h4>
</div>

<div class="modal-body">
    <form class="form-horizontal form-label-left input_mask" id="booking-add" action="{{ url('booking/add') }}" method="post">
    <div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Project name</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                   <strong> {{$request->project->name}} </strong>
                </div>
            </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="select2" style="width:300px" name="project_role_id">
                    <?php foreach($roles as $role) : ?>
                    <option value="<?php echo $role->id ?>"><?php echo $role->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">During date
            </label>
            <div class="col-md-6">
                <div id="during" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                    <span></span> <b class="caret"></b>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Join</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="select2" style="width:300px" name="take_part_per">
                    <option value="100">Full-time</option>
                    <option value="90">90%</option>
                    <option value="80">80%</option>
                    <option value="70">70%</option>
                    <option value="70">60%</option>
                    <option value="50">50%</option>
                    <option value="40">40%</option>
                    <option value="30">30%</option>
                    <option value="20">20%</option>
                    <option value="10">10%</option>
                </select>
            </div>
        </div>
        <input type="hidden" name="request_id" value="{{$request->id}}">
        <input type="hidden" name="employee_id" value="{{$employee->id}}">
        <input type="hidden" name="employee_name" value="{{$employee->fullName()}}">
        <input type="hidden" name="start_date">
        <input type="hidden" name="end_date">
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
</div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="button" class="btn btn-primary btn-ok-save-ajax">OK</button>
</div>
<div class="clearfix"></div>

<script >
    $(function () {
        'use strict';
        $('.btn-ok-save-ajax').click( function() {
            var employee_name = $('input[name=employee_name]').val();
            var employee_id = $('input[name=employee_id]').val();
            var role_name = $('select[name=project_role_id] option:selected').text();
            var role_id = $('select[name=project_role_id] option:selected').val();
            var per = $('select[name=take_part_per] option:selected').text();
            var per_val = $('select[name=take_part_per] option:selected').val();
            var start_date = $('input[name=start_date]').val();
            var end_date = $('input[name=end_date]').val();
            var request_id = $('input[name=request_id]').val();
            var token = $('input[name=_token]').val();

            var html = '<li>Name: <b>' + employee_name + '</b> / Role: <b>' + role_name + '(' + per + ')</b> / <b>From ' + start_date + ' to ' + end_date +  '</b>   </li> ';

            if ($('.have-no-proposal').length) {
                $('.have-no-proposal').remove();
            }
            $("#myModal .close").click();

            $('.proposal-new').show();
            $('.proposal-new').find('.item').append(html);
            $('div[employee=' + employee_id + ']').remove();

            var data = {
                            employee_name : employee_name,
                            employee_id : employee_id,
                            role_name: role_name,
                            role_id: role_id,
                            take_part_per: per_val,
                            take_part_per_text: per,
                            start_date: start_date,
                            request_id: request_id,
                            end_date: end_date,
                            _token : token
            };
            $.ajax({
                url:'{{ url ('proposal/update') }}',
                data: data,
                async:false,
                type:'post',
                success:function(response) {

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    errorAlert('An error occurs, please try again');

                }
            });

        });


        $('.btn-book-save').click( function() {
            $('.btn-book-save').submit();
        });


        $(".select2").select2();

        var start = moment('{{$request->start_date}}');
        var end = moment('{{$request->end_date}}');

        function cb(start, end) {
            $('input[name=start_date]').val(start.format('YYYY-MM-D'));
            $('input[name=end_date]').val(end.format('YYYY-MM-D'));
            $('#during span').html(start.format('MM/D/YYYY') + ' - ' + end.format('MM/D/YYYY'));
        }

        $('#during').daterangepicker({
            startDate: start,
            endDate: end,
            minDate: "{{date('m/d/Y')}}",
            ranges: {
                '7 days from now': [moment(), moment().add(7, 'days')],
                '1 month from now': [moment(), moment().add(1, 'months')],
                '6 month from now': [moment(), moment().add(6, 'months')],
                '1 year from now': [moment(), moment().add(1, 'years')],
            }
        }, cb);

        cb(start, end);

    });
</script>
