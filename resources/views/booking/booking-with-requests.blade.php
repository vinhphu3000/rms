@extends('layouts.booking')
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
                                        <h2>{{$project->name}}<small>Booking resource</small></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                    <form class="form-horizontal form-label-left" action="http://rms.local/employee" method="get">

                                                        <div class="input-group">
                                                            <input class="form-control" placeholder="Search for..." value="" name="kw" type="text">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-default" type="submit">Go!</button>
                                                            </span>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="clearfix"></div>
                                                <?php foreach ($employees as $item) : ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 profile_details">
                                                    <div class="well profile_view">
                                                        <div class="col-sm-12">
                                                            <div class="left col-sm-2 text-center">
                                                                <img  src="{{ asset(Config::get('constants.PATH_AVATAR') . empty($item->avatar) ? Config::get('constants.PATH_AVATAR') . Config::get('constants.DEFAULT_AVATAR') : $item->avatar) }}" alt="" class="img-circle img-responsive">
                                                            </div>
                                                            <div class="right col-xs-10">
                                                                <h4>{{$item->fullName()}}</h4>
                                                                <p><strong>Skill: </strong> {{$item->skills}} </p>
                                                                <ul class="list-unstyled">
                                                                    <li><i class="fa fa-envelope"></i> {{$item->email}} </li>
                                                                    <li><i class="fa fa-phone"></i>{{$item->phone}}</li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <div class="col-xs-12 text-right">
                                                            <button type="button" class="btn btn-info btn-xs"> <i class="glyphicon glyphicon-pushpin"></i> Reserve</button>
                                                            <button type="button" class="btn btn-primary btn-xs">  <i class="fa fa-plus-square"></i> Booking</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>

                                                <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                                                    <div class="well profile_view">
                                                        <div class="col-sm-12">
                                                            <div class="left col-xs-7">
                                                                <h2>Nicole Pearson</h2>
                                                                <p><strong>About: </strong> Web Designer / UI. </p>
                                                                <ul class="list-unstyled">
                                                                    <li><i class="fa fa-building"></i> Address: </li>
                                                                    <li><i class="fa fa-phone"></i> Phone #: </li>
                                                                </ul>
                                                            </div>
                                                            <div class="right col-xs-5 text-center">
                                                                <img src="images/user.png" alt="" class="img-circle img-responsive">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 bottom text-center">
                                                            <div class="col-xs-12 col-sm-6 emphasis">
                                                                <p class="ratings">
                                                                    <a>4.0</a>
                                                                    <a href="#"><span class="fa fa-star"></span></a>
                                                                    <a href="#"><span class="fa fa-star"></span></a>
                                                                    <a href="#"><span class="fa fa-star"></span></a>
                                                                    <a href="#"><span class="fa fa-star"></span></a>
                                                                    <a href="#"><span class="fa fa-star-o"></span></a>
                                                                </p>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-6 emphasis">
                                                                <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                                                    </i> <i class="fa fa-comments-o"></i> </button>
                                                                <button type="button" class="btn btn-primary btn-xs">
                                                                    <i class="fa fa-user"> </i> View Profile
                                                                </button>
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
                    </div>
                </div>
            </div>

              <div class="col-md-4">
                  <div class="">
                      <div class="x_content">
                          <div class="row">
                              <div class="col-md-12 col-xs-12 ">
                                  <div class="x_panel">
                                      <div class="x_title">
                                          <h2>Request ticket</h2>
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
                                          <div>
                                              <div class="form-group">
                                                  <h4 style="border-bottom:1px solid #e6e9ed;">{{date('m/d/Y', strtotime($request->created_at))}} - {{$request->user->name}}</h4>
                                              </div>

                                              <div class="form-group">

                                                  <div>
                                                      {{$request->note}}
                                                  </div>
                                              </div>

                                          </div>
                                          <div>
                                              </label>
                                              <ul class="list-inline widget_tally">
                                                  <?php foreach ($request->params() as $key => $param): ?>
                                                  <li>
                                                      <p>
                                                          <span class="month" style="font-weight: bold;">{{$param->number??'-'}} {{$param->role}} </span>
                                                          <span class="count">{{$param->year_of_exp??'-'}} years</span>
                                                      </p>
                                                      <p>
                                                          <span class="month">
                                                              <?php if(is_array($param->skill)) : ?>
                                                                <?php echo implode(', ', $param->skill); ?>
                                                              <?php endif; ?>
                                                          </span>

                                                      </p>
                                                      <p>
                                                          <span class="month">Need from:
                                                             {{$param->start_time??'-'}}
                                                          </span>

                                                      </p>
                                                  </li>
                                                      <?php endforeach; ?>

                                              </ul>
                                          </div>
                                          <div class="text-center"><button>Close</button></div>
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