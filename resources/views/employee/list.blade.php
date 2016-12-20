@extends('layouts.master')
@section('page_heading','Employee Listing')
@section('section')
        <div class="">

            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Employee <small>Management</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><button type="button" class="btn btn-trans experience" url = "{{ url('experience-popup') }}"><i class="glyphicon glyphicon-certificate" aria-hidden = true></i> Experience</button>
                            </li>
                            <li><button type="button" class="btn btn-trans link-popup" url = "{{ url('import-popup') }}"><i class="glyphicon glyphicon-import" aria-hidden = true></i> Import</button>
                            </li>
                            <li>
                                <button onclick="location.href = '{{ url ('employee/export') }}'" type="button" class="btn btn-trans"><i class="glyphicon glyphicon-export" aria-hidden = true></i> Export</button>

                            </li>

                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <form class="form-horizontal form-label-left"  action="{{ url ('employee') }}"  method = "get">

                                <div class="input-group">
                                    <input class="form-control" placeholder="Search for..." type="text" value="{{$search_param['kw']}}" name="kw">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Go!</button>
                                    </span>
                                </div>

                        </form>

                        <div class="modal bs-experience-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-m">
                                <div class="modal-content">

                                    </div>
                            </div>
                        </div>


                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" class="check-all"></th>
                                    <th><a href="{{ url ('employee?order_by=id&order_type=' . ($search_param['order_type'] == 'desc' ? 'asc' : 'desc')) }}">ID
                                            <?php if ($search_param['order_by'] == 'id') :  ?>
                                            <i class="fa fa-angle-{{$search_param['order_type'] == 'desc' ? 'down' : 'up'}} pull-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>
                                    <th><a href="{{ url ('employee?order_by=code&order_type=' . ($search_param['order_type'] == 'desc' ? 'asc' : 'desc')) }}">Code
                                            <?php if ($search_param['order_by'] == 'code') :  ?>
                                            <i class="fa fa-angle-{{$search_param['order_type'] == 'desc' ? 'down' : 'up'}} pull-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>

                                    <th><a href="{{ url ('employee?order_by=first_name&order_type=' . ($search_param['order_type'] == 'desc' ? 'asc' : 'desc')) }}">First Name
                                            <?php if ($search_param['order_by'] == 'first_name') :  ?>
                                            <i class="fa fa-angle-{{$search_param['order_type'] == 'desc' ? 'down' : 'up'}} pull-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>

                                    <th><a href="{{ url ('employee?order_by=last_name&order_type=' . ($search_param['order_type'] == 'desc' ? 'asc' : 'desc')) }}">Last Name
                                            <?php if ($search_param['order_by'] == 'last_name') :  ?>
                                            <i class="fa fa-angle-{{$search_param['order_type'] == 'desc' ? 'down' : 'up'}} pull-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>

                                    <th><a href="{{ url ('employee?order_by=sex&order_type=' . ($search_param['order_type'] == 'desc' ? 'asc' : 'desc')) }}">Sex
                                            <?php if ($search_param['order_by'] == 'sex') :  ?>
                                            <i class="fa fa-angle-{{$search_param['order_type'] == 'desc' ? 'down' : 'up'}} pull-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>

                                    <th><a href="{{ url ('employee?order_by=position_id&order_type=' . ($search_param['order_type'] == 'desc' ? 'asc' : 'desc')) }}">Position
                                            <?php if ($search_param['order_by'] == 'position_id') :  ?>
                                            <i class="fa fa-angle-{{$search_param['order_type'] == 'desc' ? 'down' : 'up'}} pull-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>

                                    <th><a href="{{ url ('employee?order_by=office_id&order_type=' . ($search_param['order_type'] == 'desc' ? 'asc' : 'desc')) }}">Office
                                            <?php if ($search_param['order_by'] == 'office_id') :  ?>
                                            <i class="fa fa-angle-{{$search_param['order_type'] == 'desc' ? 'down' : 'up'}} pull-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>

                                    <th><a href="{{ url ('employee?order_by=join_date&order_type=' . ($search_param['order_type'] == 'desc' ? 'asc' : 'desc')) }}">Join date
                                            <?php if ($search_param['order_by'] == 'join_date') :  ?>
                                            <i class="fa fa-angle-{{$search_param['order_type'] == 'desc' ? 'down' : 'up'}} pull-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>

                                    <th><a href="{{ url ('employee?order_by=email&order_type=' . ($search_param['order_type'] == 'desc' ? 'asc' : 'desc')) }}">Email
                                            <?php if ($search_param['order_by'] == 'email') :  ?>
                                            <i class="fa fa-angle-{{$search_param['order_type'] == 'desc' ? 'down' : 'up'}} pull-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>

                                    <th><a href="{{ url ('employee?order_by=skills&order_type=' . ($search_param['order_type'] == 'desc' ? 'asc' : 'desc')) }}">Skills
                                            <?php if ($search_param['order_by'] == 'skills') :  ?>
                                            <i class="fa fa-angle-{{$search_param['order_type'] == 'desc' ? 'down' : 'up'}} pull-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    </th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($result as $key => $item) :?>
                                    <tr>
                                        <td><input type="checkbox" name="employee_ids" class="employee-id" value="{{$item->id}}"></td>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->code}}</td>
                                        <td>{{$item->first_name}}</td>
                                        <td>{{$item->last_name}}</td>
                                        <td>{{$item->sex == 1 ? trans('employee.male') : trans('employee.female')}}</td>
                                        <td>{{isset($item->position->name) ? $item->position->name : '-'}}</td>
                                        <td>{{isset($item->office->name) ? $item->office->name : '-'}}</td>
                                        <td>{{$item->join_date}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->skills}}<br>
                                            <button type="button" class="btn btn-trans view-matrix" url = "{{ url('experience-popup') }}" id = {{$item->id}}><i class="glyphicon glyphicon-edit" aria-hidden = true></i> Skill matrix</button>
                                            </td>
                                        <td><a href="#">View</a></td>
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
        </div>
@stop
