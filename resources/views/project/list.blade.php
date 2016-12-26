@extends('layouts.project')
@section('page_heading','Project')
@section('section')
    <div class="">

        <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Projects</h2>
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

                        <p>Simple table with project listing with progress and editing options</p>

                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 20%">Project Name</th>
                                <th>Team Members</th>
                                <th>Estimate</th>
                                <th>Status</th>
                                <th style="width: 20%">#Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($result as $item): ?>
                            <tr>
                                <td>#</td>
                                <td>
                                    <a class="project-item" href="javascript:void(0);" url="{{ url ('project/details/' . $item->id) }}">{{$item->name}}</a>
                                    <br />
                                    <small>Created {{$item->created_at}}</small>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <?php foreach ($item->memeber() as $member) : ?>
                                            <li>
                                                <img title='{{$member->employee->first_name . ' ' . $member->employee->last_name}}' alt='{{$member->employee->first_name . ' ' . $member->employee->last_name}}' src="{{ asset(Config::get('constants.PATH_AVATAR') . empty($member->employee->avatar) ? Config::get('constants.PATH_AVATAR') . Config::get('constants.DEFAULT_AVATAR') : $member->employee->avatar) }}" class="avatar" alt="Avatar">
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                                <td>
                                    {{$item->estimate}} <small>{{$item->estimate_type}}</small>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-{{\App\Models\Project::$project_status[$item->status]['class']}} btn-xs">{{\App\Models\Project::$project_status[$item->status]['lable']}}</button>
                                </td>
                                <td>
                                    <a class="project-item" href="javascript:void(0);" url="{{ url ('project/details/' . $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                    <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- end project list -->

                    </div>
                </div>
            </div>
        </div>
@stop
