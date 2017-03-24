@extends('layouts.master')
@section('page_heading','Employee Listing')
@section('section')
        <div class="">

            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User notification <small>Config</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><button type="button" class="btn btn-trans link-popup" url="{{ url('config/notification/add-popup') }}"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> New config</button>
                            </li>


                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="table-responsive">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Updated at
                                    </th>


                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($result as $key => $item) :?>
                                    <tr>
                                        <td>{{$item->description}}</td>
                                        <td>{{\Carbon\Carbon::parse($item->updated_at)->diffForHumans()}}</td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    </div>
                </div>
            </div>

@stop
