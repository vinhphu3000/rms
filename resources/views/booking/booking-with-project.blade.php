@extends('layouts.booking-project')
@section('page_heading','Booking')
@section('section')
    <div class="">
        <div class="row">
            <div class="col-md-8">
                <div class="">
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h4 class="green" style="float: left"><i class="fa fa-paint-brush"></i> {{$project->name}}<small style="margin-left: 4px">Booking</small></h4>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a  class="btn btn-trans" href = "{{ url('project/details/' . $project->id) }}"  style="color: #5a738e;"><i class="glyphicon glyphicon-arrow-left" aria-hidden = true></i> Back to project detail</a>
                                            </li>

                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                    <form class="form-horizontal form-label-left" action="{{ url ('booking')}}" method="get" >
                                                        <div class="input-group">
                                                            <input class="form-control" style="height: 34px;" placeholder="Search for id, name, email, skill ..." value="{{$search_param['kw']}}" name="kw" type="text">
                                                            <input type="hidden" name="project_id" value="{{$project_id}}">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-primary" type="submit">Go!</button>
                                                            </span>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="clearfix"></div>
                                                <?php foreach ($employees as $item) : ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 profile_details" employee="{{$item->id}}">
                                                    <div class="well profile_view">
                                                        <div class="col-sm-12">
                                                            <div class="left col-sm-2 text-center">
                                                                <img  src="{{ asset(Config::get('constants.PATH_AVATAR') . empty($item->avatar) ? Config::get('constants.PATH_AVATAR') . Config::get('constants.DEFAULT_AVATAR') : $item->avatar) }}" alt="" class="img-circle img-responsive">
                                                            </div>
                                                            <div class="right col-xs-10">
                                                                <h4>{{$item->fullName()}}</h4>
                                                                <p><strong>Skill: </strong> {{$item->skills}} </p>
                                                                <p><?php echo $item->availableInfo();?></p>

                                                                {{--<ul class="list-unstyled">--}}
                                                                    {{--<li><i class="fa fa-envelope"></i> {{$item->email}} </li>--}}
                                                                    {{--<li><i class="fa fa-phone"></i>{{$item->phone}}</li>--}}
                                                                {{--</ul>--}}
                                                            </div>

                                                        </div>
                                                        <div class="col-xs-12 text-right">
                                                            {{--<button type="button" class="btn btn-info btn-xs reserve"> <i class="glyphicon glyphicon-pushpin"></i> Reserve</button>--}}
                                                            <button type="button" employee-id="{{$item->id}}" project-id="{{$request->project->id}}" url="{{url('booking/popup')}}" class="btn btn-primary btn-xs booking">  <i class="fa fa-plus-square"></i> Booking</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

              <div class="col-md-4">
                  <div >
                      <div class="x_content">
                          <div class="row">
                              <div class="col-md-12 col-xs-12 ">
                                  <div class="x_panel">
                                      <div class="x_title">
                                          <h2>{{$request->project->name}}<small>Booking resource</small></h2>

                                          <div class="clearfix"></div>
                                      </div>
                                      <div class="x_content">

                                          <div>
                                              </label>
                                              <ul class="list-inline widget_tally booking-list">
                                                  <?php $last = ''; ?>
                                                  <?php foreach ($bookings as $key => $item): ?>

                                                    <?php if ($last != $item->role->name) : ?>
                                                          <?php if ($last != '') : ?>
                                                            </div>
                                                            </li>

                                                          <?php endif; ?>

                                                      <li id = 'role{{$item->role->id}}'>
                                                          <p>
                                                              <span class="month" style="font-weight: bold;">{{$item->role->name}} </span>
                                                          </p>
                                                          <div class="col-md-12 col-xs-12 employee-list">
                                                      <?php endif; ?>
                                                        @include('widgets.booking-item',['booking' => $item])
                                                      <?php $last = $item->role->name; ?>
                                                      <?php endforeach; ?>

                                              </ul>
                                          </div>
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