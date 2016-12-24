<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" id="myModalLabel"><span class="fa fa-plus-circle"></span>  Add new project</h4>
</div>

<div class="modal-body">
    <div>
        <form class="form-horizontal form-label-left" enctype="multipart/form-data" id="upload_form" role="form"  action="{{ url ('employee/upload-cv') }}" >
            <div class="right col-xs-2 text-center">
                <img src="{{ asset(Config::get('constants.PATH_AVATAR') . Config::get('constants.DEFAULT_AVATAR')) }}" alt="" class="img-circle img-responsive">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-16 profile_details">

            </div>
        </form>
    </div>
    <h4>Skill matrix</h4>
    <table class="table"  style="border-top: 0px">
        <thead>
        <tr>
            <th style="width: 200px;">Name</th>
            <th>Experience</th>
            <th>Level</th>
            <th><a href="javascript:void(0);" class="experience-add" ><i class="fa fa-plus-square"></i></a></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div  style="height: 290px; overflow-y: scroll;overflow-x: hidden;">

    </div>

</div>
<div class="modal-footer">
    <input type="hidden" name="file_name" value="">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary btn-experience-save">Save</button>
</div>
<div class="clearfix"></div>
<script >
    $(function () {
        'use strict';


    });

</script>
