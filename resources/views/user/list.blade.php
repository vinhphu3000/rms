@extends('layouts.master')
@section('page_heading','Employee Listing')
@section('section')
        <div class="">

            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User <small>Management</small></h2>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <form class="form-horizontal form-label-left"  action="{{ url ('user') }}"  method = "get">

                                <div class="input-group">
                                    <input class="form-control" placeholder="Search for..." type="text" value="{{$search_param['kw']}}" name="kw">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Go!</button>
                                    </span>
                                </div>

                        </form>

                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th><a href="{{ url ('user?order_by=id&order_type=' . ($search_param['order_type'] == 'desc' ? 'asc' : 'desc')) }}">ID
                                            <?php if ($search_param['order_by'] == 'id') :  ?>
                                            <i class="fa fa-angle-{{$search_param['order_type'] == 'desc' ? 'down' : 'up'}} pull-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>
                                    <th><a href="{{ url ('user?order_by=name&order_type=' . ($search_param['order_type'] == 'desc' ? 'asc' : 'desc')) }}">Name
                                            <?php if ($search_param['order_by'] == 'name') :  ?>
                                            <i class="fa fa-angle-{{$search_param['order_type'] == 'desc' ? 'down' : 'up'}} pull-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>

                                    <th><a href="{{ url ('user?order_by=email&order_type=' . ($search_param['order_type'] == 'desc' ? 'asc' : 'desc')) }}">Email
                                            <?php if ($search_param['order_by'] == 'email') :  ?>
                                            <i class="fa fa-angle-{{$search_param['order_type'] == 'desc' ? 'down' : 'up'}} pull-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>

                                    <th><a href="{{ url ('user?order_by=type&order_type=' . ($search_param['order_type'] == 'desc' ? 'asc' : 'desc')) }}">Admin
                                            <?php if ($search_param['order_by'] == 'type') :  ?>
                                            <i class="fa fa-angle-{{$search_param['order_type'] == 'desc' ? 'down' : 'up'}} pull-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>

                                    <th><a href="{{ url ('user?order_by=last_login&order_type=' . ($search_param['order_type'] == 'desc' ? 'asc' : 'desc')) }}">Last login
                                            <?php if ($search_param['order_by'] == 'last_login') :  ?>
                                            <i class="fa fa-angle-{{$search_param['order_type'] == 'desc' ? 'down' : 'up'}} pull-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($result as $key => $item) :?>
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->type =='admin' ? 'admin' : ''}}</td>
                                        <td>{{\Carbon\Carbon::parse($item->last_login)->diffForHumans()}}</td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php echo $result->render(); ?>
                    </div>
                    </div>
                </div>
            </div>

@stop
