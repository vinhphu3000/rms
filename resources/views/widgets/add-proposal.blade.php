<div id="add-proposal-content" >
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="add-proposal-popup-title"> </h4>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" id="booking-add" action="{{ url('booking/add') }}" method="post">
                    <div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Project name</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                   <strong class="project-name"></strong>
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
                        <input type="hidden" name="request_id">
                        <input type="hidden" name="employee_id">
                        <input type="hidden" name="start_date" value="{{$request->start_date}}">
                        <input type="hidden" name="end_date" value="{{$request->end_date}}">
                </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-book-save-ajax">OK</button>
                </div>
                <div class="clearfix"></div>
        </div>

