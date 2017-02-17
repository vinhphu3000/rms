@extends('layouts.booking')
@section('page_heading','Booking')
@section('section')
    <div class="">
        <div class="row">
            <div class="col-md-8">
                <div class="">
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h4>Proposal for this request</h4>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div>

                                            <div class="form-group">

                                                <div>
                                                    {{$request->note}}
                                                </div>
                                            </div>

                                        </div>
                                        <div>
                                            </label>
                                            <ul class="list-inline widget_tally">
                                                <?php if (count($proposal)) : ?>
                                                <?php foreach ($proposal as $key => $item): ?>
                                                <li>
                                                    <b>{{$item->created_at->format('Y-m-d H:i')}} proposal by {{$item->user->name}}</b>
                                                    <ul class="list-inline widget_tally">
                                                        <?php foreach($item->getEmployeeProposal() as $emp_proposal) :?>
                                                        <li>Name: {{$emp_proposal->employee->fullname()}} /  Proposal role: {{$emp_proposal->role->name}} / Status: {{$emp_proposal->status}}</li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                <li>There are not proposal for this request! </li>
                                                <?php endif ?>

                                            </ul>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Employee<small>Search</small></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                    <form class="form-horizontal form-label-left" action="{{ url ('request/booking')}}" method="get" >
                                                        <div class="input-group">
                                                            <input class="form-control" style="height: 34px;" placeholder="Search for id, name, email, skill ..." value="{{$search_param['kw']}}" name="kw" type="text">
                                                            <input type="hidden" name="project_id" value="{{$project_id}}">
                                                            <input type="hidden" name="request_id" value="{{$request->id}}">
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
                                                            <button type="button" employee-id="{{$item->id}}" request-id="{{$request->id}}" url="{{url('booking/popup')}}" class="btn btn-primary btn-xs booking">  <i class="fa fa-plus-square"></i> Proposal</button>
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
                                          <h4>{{$request->titleWithUser()}}</h4>
                                          <div class="clearfix"></div>
                                      </div>
                                      <div class="x_content">
                                          <div>

                                              <div class="form-group">

                                                  <div>
                                                      Need from <strong>{{$request->start_date}}</strong> to <strong>{{$request->end_date}}</strong>
                                                  </div>
                                              </div>

                                          </div>
                                          <div>
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

                                                  </li>
                                                  <?php endforeach; ?>

                                              </ul>
                                          </div>
                                          <div style="text-align: center"><button class="btn close-link">Close</button></div>

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