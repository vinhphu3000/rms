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

                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <!-- Large modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

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

                                                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-3"></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <button type="button" class="uploadBtn"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> Upload</button>
                                                    </div>
                                                </div>



                                            </form>
                                        </div>
                                        <div class="x_content"  style="height: 290px; overflow-y: scroll;overflow-x: hidden;">
                                        <table class="table"  style="border-top: 0px">
                                            <thead>
                                            <tr>
                                                <th>CSV header</th>
                                                <th><i class="fa fa-arrow-right"></i></th>
                                                <th>Table column</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($db_column as $item): ?>
                                            <tr>
                                                <td>
                                                    <select table-column="{{$item}}" disabled class="form-control csv-header" >
                                                        <option>Choose CSV header</option>
                                                    </select>

                                                </td>
                                                <td><i class="fa fa-arrow-right"></i></td>
                                                <td>{{$item}}</td>
                                            </tr>
                                            <?php endforeach; ?>

                                            </tbody>
                                        </table></div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary btn-import">Import</button>
                                    </div>

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
                                        <td>{{$item->position->name}}</td>
                                        <td>{{$item->office->name}}</td>
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
