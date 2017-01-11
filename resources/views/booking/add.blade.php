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
                   <strong> {{$project->name}} </strong>
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
        <input type="hidden" name="project_id" value="{{$project->id}}">
        <input type="hidden" name="employee_id" value="{{$employee->id}}">
        <input type="hidden" name="start_date">
        <input type="hidden" name="end_date">
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
</div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary btn-book-save-ajax">Booking</button>
</div>
<div class="clearfix"></div>

<script >
    $(function () {
        'use strict';
        $('.btn-book-save-ajax').click( function() {
            $.ajax({
                url:'{{ url ('booking/add') }}',
                data: $("#booking-add").serialize(),
                async:false,
                type:'post',
                success:function(response) {
                    var role = {id: $('select[name=project_role_id] option:selected').val(), name: $('select[name=project_role_id] option:selected').text()};
                    $('div[employee=' + $('input[name=employee_id]').val() + ']').remove();
                    $("#myModal .close").click();
                    addRole(role);
                    $('.booking-list').find('#role' + role.id + ' .employee-list').append(response);
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

        var start = moment();
        var end = moment().add(1, 'months');

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
