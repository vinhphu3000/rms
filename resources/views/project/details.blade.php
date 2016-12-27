@extends('layouts.project')
@section('page_heading','Project')
@section('section')
<div class="clearfix"></div>
<div>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h4 class="green" style="float: left"><i class="fa fa-paint-brush"></i> {{$project->name}}</h4>
                <ul class="nav navbar-right panel_toolbox">
                    <li><button type="button" class="btn btn-trans link-popup" url = "{{ url('request/add/' . $project->id) }}"><i class="glyphicon glyphicon-plus" aria-hidden = true></i> Create new request</button>
                    </li>

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
                            <span class="value text-success"> $ 2000 </span>
                        </li>
                        <li class="hidden-phone">
                            <span class="name"> Estimated project duration </span>
                            <span class="value text-success"> {{$project->estimate}}  {{empty(\App\Models\Project::$estimate_type[$project->estimate_type]) ? '-' : \App\Models\Project::$estimate_type[$project->estimate_type] }}</span>
                        </li>
                    </ul>
                    <br />

                    <div id="mainb">
                        <h4>Booking</h4>
                        <div class="gantt" data-url="{{ url('project/booking-data/' . $project->id) }}"></div>
                    </div>
                    <br/>
                    <div>

                        <h4>Recent Activity</h4>

                        <!-- end of user messages -->
                        <ul class="messages">
                            <?php  foreach ($activity as $ac) : ?>
                            <li>
                                <img  src="{{ asset(Config::get('constants.PATH_AVATAR') . empty($ac->user->avatar) ? Config::get('constants.PATH_AVATAR') . Config::get('constants.DEFAULT_AVATAR') : $ac->user->avatar) }}" class="avatar" alt="{{$ac->user->name}}">
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
                                        <a href="#"><i class="glyphicon glyphicon-refresh"></i> View request details </a>
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