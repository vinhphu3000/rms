@extends('layouts.master')
@section('page_heading','Employee Listing')
@section('section')
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Employee <small>Management</small></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Listing</h2>
                        <ul class="nav navbar-right panel_toolbox">

                            <li><button type="button" class="btn" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus-circle"></i> Import CSV</button>
                            </li>
                            <li><button type="button" class="btn" href="http://rms.local/employee"  data-toggle="modal" data-target=".bs-example-modal-lg" ><i class="glyphicon glyphicon-open"></i> Upload CV</button>
                            </li>

                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <!-- Large modal -->


                        <div class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-m">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Import data</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="x_content">
                                            <br />
                                            <form class="form-horizontal form-label-left" enctype="multipart/form-data" id="upload_form" role="form"  action="{{ url ('employee/upload-excel') }}" >

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3">File</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="file" class="file" name="csvfile" placeholder="please chooise excel file">
                                                        <span style="color: white;display: none"  class="msg-upload label-info">Uploading ... </span>
                                                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3"></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <button type="button" class="btn uploadBtn"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> Upload</button>
                                                    </div>
                                                </div>



                                            </form>
                                        </div>
                                        <div class="x_content"  style="height: 290px; overflow-y: scroll;overflow-x: hidden;">
                                        <table class="table column-map"  style="border-top: 0px">
                                            <thead>
                                            <tr>
                                                <th>CSV header</th>
                                                <th><i class="fa fa-arrow-right"></i></th>
                                                <th>Table column</th>
                                                <th>Skip</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($db_column as $item): ?>
                                            <?php if ($item == 'id') {continue;} ?>
                                            <tr>
                                                <td>
                                                    <select name ="{{$item}}" disabled class="form-control csv-header" >
                                                        <option value="">Choose CSV header</option>
                                                    </select>

                                                </td>
                                                <td><i class="fa fa-arrow-right"></i></td>
                                                <td>{{$item}}</td>
                                                <td><input type="checkbox" value="1"></td>
                                            </tr>
                                            <?php endforeach; ?>

                                            </tbody>
                                        </table></div>

                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="file_name" value="">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary btn-import disabled">Import</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>


                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Full name</th>
                                    <th>Sex</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Start date</th>
                                    <th>E-mail</th>
                                    <th>Skills</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($result as $key => $item) :?>
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$item->code}}</td>
                                        <td>{{$item->first_name}} {{$item->last_name}}</td>
                                        <td>{{$item->sex == 1 ? trans('employee.male') : trans('employee.female')}}</td>
                                        <td>{{isset($item->position->name) ? $item->position->name : '-'}}</td>
                                        <td>{{isset($item->office->name) ? $item->office->name : '-'}}</td>
                                        <td>{{$item->join_date}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->skills}}</td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
@stop
