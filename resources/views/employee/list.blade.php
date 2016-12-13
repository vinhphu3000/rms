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

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>

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
                                        <td>{{$item->sex}}</td>
                                        <td>{{$item->position->name}}</td>
                                        <td>{{$item->office_id}}</td>
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
