<div class="employee-sm">
    <div class="left avatar-sm-1">
        <img src="{{ asset(Config::get('constants.PATH_AVATAR') . empty($booking->employee->avatar) ? Config::get('constants.PATH_AVATAR') . Config::get('constants.DEFAULT_AVATAR') : $booking->employee->avatar) }}" alt="" class="img-circle img-responsive">
    </div>
    <div class="left">

        <span><a href="#">{{$booking->employee->fullName()}}</a></span> <br/>
        <span><small>Status: {{$booking->joinLable()}}, Book : {{$booking->start_date->format('m/d/Y')}} - {{$booking->end_date->format('m/d/Y')}}</small></span>

    </div>
    <ul class="nav navbar-right panel_toolbox">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><i class="fa fa-cog"></i></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="javascript:void(0)" url="{{url('booking/edit/' . $booking->id)}}" class="link-popup" id="{{$booking->id}}">Edit</a>
                </li>
                <li>
                    <a href="#">Remove</a>
                </li>
            </ul>
        </li>

    </ul>


</div>