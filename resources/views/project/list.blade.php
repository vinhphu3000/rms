@extends('layouts.project')
@section('page_heading','Project')
@section('section')
    <div class="">

        <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Projects</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 20%">Project Name</th>
                                <th>Team Members</th>
                                <th>Estimate</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($result as $item): ?>
                            <tr>
                                <td>#</td>
                                <td>
                                    <a href="{{ url ('project/details/' . $item->id) }}">{{$item->name}}</a>
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
                                    {{$item->estimate}} <small>{{empty(\App\Models\Project::$estimate_type[$item->estimate_type]) ? '-' : \App\Models\Project::$estimate_type[$item->estimate_type] }}</small>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-{{\App\Models\Project::$project_status[$item->status]['class']}} btn-xs">{{\App\Models\Project::$project_status[$item->status]['lable']}}</button>
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
