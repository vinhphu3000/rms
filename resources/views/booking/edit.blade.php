<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" id="myModalLabel">{{$booking->employee->fullName()}}</h4>
</div>

<div class="modal-body">
    <form class="form-horizontal form-label-left input_mask" id="booking-add" action="{{ url('booking/edit') }}" method="post">
    <div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Project name</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                   <strong> {{$booking->project->name}} </strong>
                </div>
            </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="select2" style="width:300px" name="project_role_id">
                    <?php foreach($roles as $role) : ?>
                    <option <?php echo $booking->role->id == $role->id ? 'selected' : '' ?> value="<?php echo $role->id ?>"><?php echo $role->name ?></option>
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
                    <span>{{$booking->start_date->format('m/d/Y')}} - {{$booking->end_date->format('m/d/Y')}}</span> <b class="caret"></b>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Join</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="select2" style="width:300px" name="take_part_per">
                    <option value="100">Full-time</option>
                    <?php  foreach ([90,80,70,60,50,40,30,20,10] as $value) : ?>
                        <option <?php echo $booking->take_part_per == $value ? 'selected' : '' ?> value="{{$value}}">{{$value}}%</option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <input type="hidden" name="project_id" value="{{$booking->project->id}}">
        <input type="hidden" name="id" value="{{$booking->id}}">
        <input type="hidden" name="employee_id" value="{{$booking->employee->id}}">
        <input type="hidden" name="start_date">
        <input type="hidden" name="end_date">
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
</div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary btn-book-save">Update</button>
</div>
<div class="clearfix"></div>

<script >
    $(function () {
        'use strict';
        $('.btn-book-save').click( function() {
            $.ajax({
                url:'{{ url ('booking/edit') }}',
                data: $("#booking-add").serialize(),
                async:false,
                type:'post',
                success:function(response) {
                    location.reload();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    errorAlert('An error occurs during save data, please try again');

                }
            });
        });
        /**
         * Add role
         * @param role
         */
        function addRole(role)
        {
            if ($('.booking-list').find('#role' + role.id).length) {
                return ;
            }

            var html = '<li id="role' + role.id + '">' +
                '<p>' +
                    '<span class="month" style="font-weight: bold;">' + role.name + '</span>' +
                '</p>' +
                '<div class="col-md-12 col-xs-12 employee-list">' +
                '</div>' +
            '</li>';

            $('.booking-list').append(html);
        }

        $('.btn-book-save').click( function() {
            $('.btn-book-save').submit();
        });


        $(".select2").select2();

        var start = moment('{{$booking->start_date}}');
        var end = moment('{{$booking->end_date}}');

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
