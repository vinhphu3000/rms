<form class="form-horizontal form-label-left input_mask" action="{{ url('/proposal/employee/reject/confirm') }}" method="post">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
  </button>
  <h4 class="modal-title" id="myModalLabel">Please give a reason reject !</h4>
</div>

<div class="modal-body">

    <div>
      <div class="form-group">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <label class="control-label col-md-3">
            <input type="radio" name="reason" value='Reason 1' > Reason 1
          </label>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <label class="control-label col-md-3">
            <input type="radio" name="reason" value='Reason 1'> Reason 2
          </label>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <label class="control-label col-md-3">
            <input type="radio" name="reason" value='Reason 1'> Reason 3
          </label>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <label class="control-label col-md-3">
            <input type="radio" name="reason" value='Reason 1'> Reason 4
          </label>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3">
          <input type="radio" name="reason" value='Other'> Other
        </label>
        <div class="col-md-6">
          <textarea name="other_reason" col="4" row="4"></textarea>
        </div>
      </div>

      <input type="hidden" name="project_id" value="{{$project_id}}">
      <input type="hidden" name="id" value="{{$id}}">
      <input type="hidden" name="_token" value="{{ csrf_token()}}">
    </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  <button type="submit" class="btn btn-primary">OK</button>
</div>
<div class="clearfix"></div>
</form>