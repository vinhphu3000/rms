<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" id="myModalLabel"><span class="fa fa-plus-circle"></span>  Request detail</h4>
</div>

<div class="modal-body">
    <form class="form-horizontal form-label-left input_mask new-request" action="{{ url('request/add') }}" method="post">
    <div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Project name</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                   <h4> {{$project->name}} </h4>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Request content
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    {{$request->note}}
                </div>
            </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Created by
            </label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                {{$request->user->fullName()}}
            </div>
        </div>

    </div>

    <div class="request-content">
        <div class="ln_solid"></div>

        <div class="col-xs-3">
            <!-- required for floating -->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-left">
                <?php foreach ($request->params() as $key => $param): ?>
                <li <?php echo $key == 0 ? 'class="active"' : '' ?> ><a href="#tab{{$key}}" data-toggle="tab" aria-expanded="true">{{$param->role}} ({{$param->number}})</a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="col-xs-9">
            <!-- Tab panes -->
            <div class="tab-content">
                <?php foreach ($request->params() as $key => $param): ?>
                <div id="tab{{$key}}" class="tab-pane <?php echo $key == 0 ? 'active' : '' ?>">
                    <div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Number</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                {{$param->number??'-'}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Start time
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{$param->start_time??'-'}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Skill</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php if(is_array($param->skill)) : ?>
                                <?php echo implode(', ', $param->skill); ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Year of exp<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{$param->year_of_exp??'-'}} year
                            </div>
                        </div>

                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>


    </div>
    </form>
</div>
<div class="clearfix"></div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
<div class="clearfix"></div>

