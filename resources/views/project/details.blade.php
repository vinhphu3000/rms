@extends('layouts.project')
@section('page_heading','Project')
@section('section')
<div class="clearfix"></div>
<div>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h4 class="green" style="float: left"><i class="fa fa-paint-brush"></i> {{$project->name}}<span class="label label-{{\App\Models\Project::$project_status[$project->status]['class']}}" style="margin-left: 10px;font-size: 55%;color: #ffffff;">{{\App\Models\Project::$project_status[$project->status]['lable'] ?? ''}}</span></h4>
                <ul class="nav navbar-right panel_toolbox">
                    <?php if($my->type == 'member') :  ?>
                    <li><button type="button" class="btn btn-trans link-popup" url = "{{ url('request/add/' . $project->id) }}"><i class="glyphicon glyphicon-plus" aria-hidden = true></i> Create new request</button>
                    </li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#"  style="color: #5a738e;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-align-justify"></i>  Booking</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href = "{{ url('booking?project_id=' . $project->id) }}">New booking</a>
                                </li>
                                <li><a  href = "{{ url('request/booking?project_id=' . $project->id) }}">Booking with request</a>
                                </li>
                            </ul>
                        </li>


                    <?php endif; ?>

                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="col-md-12 col-sm-12 col-xs-12">

                    <ul class="stats-overview">
                        <li>
                            <span class="name"> Client company </span>
                            <span class="value text-success"> {{$project->client}} </span>
                        </li>
                        <li>
                            <span class="name"> Total amount spent </span>
                            <span class="value text-success"> - </span>
                        </li>
                        <li class="hidden-phone">
                            <span class="name"> Estimated project duration </span>
                            <span class="value text-success"> {{$project->estimate}}  {{empty(\App\Models\Project::$estimate_type[$project->estimate_type]) ? '-' : \App\Models\Project::$estimate_type[$project->estimate_type] }}</span>
                        </li>
                    </ul>
                    <br />

                    <div id="mainb">
                        <h4>Member booking</h4>
                        <div class="col-xs-12 bg-white progress_summary">
                            <?php foreach($booking as $item) : ?>
                            <div class="col-xs-3" style="margin-right:50px;">
                                <div class="row employee_prs">
                                    <div class="progress_title">
                                        <span class="left">{{$item->employee->fullName()}}</span>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="progress progress_sm {{$item->book_type == 'Reserve' ? 'reserve' : ''}}" >
                                            <?php if ($item->book_type == 'Official' && $item->getPerOfSpentDay() > 0) : ?>
                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{$item->getPerOfSpentDay()}}" style="width: {{$item->getPerOfSpentDay()}}%;" aria-valuenow="{{$item->getPerOfSpentDay()}}"></div>
                                            <?php endif; ?>
                                        </div>
                                        <span class="left progress_lb_start">{{$item->start_date->format('Y/m/d')}}</span>
                                        <span class="right progress_lb_end">{{$item->end_date->format('Y/m/d')}}</span>
                                    </div>

                                </div>
                            </div>
                                <?php endforeach; ?>
                        </div>
                        <br/>
                        <br/><br/>
                        <br/>
                        <h4>Grantt chart</h4>
                        <div class="gantt" data-url="{{ url('project/booking-data/' . $project->id) }}"></div>
                    </div>
                    <br/>
                    <div>

                        <h4>Recent Activity</h4>

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


                </div>


            </div>
        </div>
    </div>
</div>
@stop