@extends('layouts.employee')
@section('page_heading','Profile')
@section('section')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Employee - Activity report</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="{{ asset($employee->avatarPath()) }}" alt="{{$employee->fullName()}}" title="{{$employee->fullName()}}">
                                </div>
                            </div>
                            <h3>{{$employee->fullName()}}</h3>

                            <ul class="list-unstyled user_data">

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> {{$employee->role->name}}
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-github"></i>
                                    <a href="{{$employee->github}}" target="_blank">{{$employee->github}}</a>
                                </li>
                            </ul>

                            <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                            <br />

                            <!-- start skills -->
                            <h4>Skills</h4>
                            <ul class="list-unstyled user_data">
                                <?php foreach($skill as $item) : ?>
                                <li>
                                    <p>{{$item->exp->name}} - {{$item->month}} month of exp</p>
                                    <div class="progress progress_sm" >
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{($item->level/5) * 100}}" style="width: {{($item->level/5) * 100}}%;" aria-valuenow="{{($item->level/5) * 100}}"></div>

                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <!-- end of skills -->

                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <div class="profile_title">
                                <div class="col-md-6">
                                    <h2>Timeline</h2>
                                </div>
                                <div class="col-md-6">
                                    <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                                    </div>
                                </div>

                            </div>
                            <!-- Timeline -->
                            <div class="row" style="margin-top: 20px;padding-left: 30px;" >
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div id="content-wrapper">
                                        <div id="timeline" class="timeCube" data-url="{{ url('employee/timeline-data/' . $employee->id) }}"></div>
                                    </div>
                                    <a href="#" onclick="return false;" id="next-link"></a> <a href="#" onclick="return false;" id="prev-link" class="disabled"></a>
                                    <div class="clearfix"></div>
                                </div>

                            </div>


                            <!-- end of user-activity-graph -->
                            <div class="row" style="margin-top: 220px;">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                                    </li>

                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                        <!-- end of user messages -->
                                        <ul class="messages">
                                            <?php  foreach ($activity as $ac) : ?>
                                            <li>
                                                <img  src="{{ asset($my->avatarPath()) }}" class="avatar" alt="{{$ac->user->name}}">
                                                <div class="message_date">
                                                    <h3 class="date text-info">{{$ac->created_at->diffForHumans()}}</h3>
                                                </div>
                                                <div class="message_wrapper">
                                                    <h4 class="heading">{{$ac->user->name}}</h4>
                                                    <blockquote class="message">{{$ac->content}}</blockquote>
                                                    <br />
                                                    <?php if(!empty($ac->request_id)): ?>
                                                    <p class="url">
                                                        <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                        <a href="javascript:void(0)" class="link-popup" url = "{{ url('request/details/' . $ac->request_id) }}"><i class="glyphicon glyphicon-refresh"></i> View request details </a>
                                                    </p>
                                                    <?php endif; ?>
                                                </div>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <!-- end of user messages -->

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project Name</th>
                                                <th>Client Company</th>
                                                <th class="hidden-phone">Hours Spent</th>
                                                <th>Contribution</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($projects_booking as $key => $booking) : ?>
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$booking->project->name}}</td>
                                                <td>{{$booking->project->client}}</td>
                                                <td class="hidden-phone">18</td>
                                                <td class="vertical-align-mid">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <!-- end user projects -->

                                    </div>

                                </div>
                            </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
