<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" id="myModalLabel">{{$booking->employee->fullName()}}</h4>
</div>

<div class="modal-body">
    <form class="form-horizontal form-label-left input_mask" id="booking-add" action="{{ url('booking/add') }}" method="post">
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
                <strong> {{$booking->role->name}} </strong>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">From
            </label>
            <div class="col-md-6">
                <strong> {{$booking->start_date->format('m/d/Y')}}</strong>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">To
            </label>
            <div class="col-md-6">
                <strong>{{$booking->end_date->format('m/d/Y')}}</strong>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <?php if($booking->book_type == 'Reserve'): ?>
                <select class="select2" style="width:300px" name="book_type">
                    <option <?php echo ($booking->book_type == 'Official') ? 'selected' : '' ?> value="Official">Official</option>
                    <option <?php echo ($booking->book_type == 'Reserve') ? 'selected' : '' ?> value="Reserve">Reserve</option>
                </select>
                <?php else: ?>
                    <strong> {{$booking->book_type}}</strong>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Join</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <strong> {{$booking->per()}}</strong>
            </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
</div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <?php if($booking->book_type == 'Reserve'): ?>
        <button type="button" class="btn btn-primary btn-book-update-type">Update</button>
    <?php endif; ?>
</div>
<div class="clearfix"></div>
<script>
    $(function () {
        'use strict';
        $(".select2").select2();
    });
</script>
