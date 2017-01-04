@extends('layouts.booking')
@section('page_heading','Booking')
@section('section')
    <div class="">
          <div class="row">
            <div class="col-md-9">
                <div class="">
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Employee</h2>
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

              <div class="col-md-3">
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

                                          <div style="text-align: center; margin-bottom: 17px">
                              <span class="chart" data-percent="86">
                                                  <span class="percent">86</span>
                              <canvas height="110" width="110"></canvas></span>
                                          </div>

                                          <div class="pie_bg" style="text-align: center; display: none; margin-bottom: 17px">
                                              <canvas id="canvas_doughnut4" height="130"></canvas>
                                          </div>

                                          <div style="text-align: center;">
                                              <div class="btn-group" role="group" aria-label="First group">
                                                  <button type="button" class="btn btn-default btn-sm">1 D</button>
                                                  <button type="button" class="btn btn-default btn-sm">1 W</button>
                                                  <button type="button" class="btn btn-default btn-sm">1 M</button>
                                                  <button type="button" class="btn btn-default btn-sm">1 Y</button>
                                              </div>
                                          </div>
                                          <div style="text-align: center; overflow: hidden; margin: 10px 5px 3px;"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                                              <canvas id="canvas_line4" height="148" width="234" style="width: 234px; height: 148px;"></canvas>
                                          </div>
                                          <div>
                                              <ul class="list-inline widget_tally">
                                                  <li>
                                                      <p>
                                                          <span class="month">12 December 2014 </span>
                                                          <span class="count">+12%</span>
                                                      </p>
                                                  </li>
                                                  <li>
                                                      <p>
                                                          <span class="month">29 December 2014 </span>
                                                          <span class="count">+12%</span>
                                                      </p>
                                                  </li>
                                                  <li>
                                                      <p>
                                                          <span class="month">16 January 2015 </span>
                                                          <span class="count">+12%</span>
                                                      </p>
                                                  </li>
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