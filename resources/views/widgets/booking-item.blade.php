<div class="employee-sm">
    <div class="left avatar-sm-1">
        <img src="{{ asset(Config::get('constants.PATH_AVATAR') . empty($booking->employee->avatar) ? Config::get('constants.PATH_AVATAR') . Config::get('constants.DEFAULT_AVATAR') : $booking->employee->avatar) }}" alt="" class="img-circle img-responsive">
    </div>
    <div class="left">
        <span><a href="#">{{$booking->employee->fullName()}}</a></span> <br/>
        <span><small>{{$booking->joinLable()}}</small></span>

    </div>
    {{--<div class="left">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-cog"></i></a>--}}
        {{--<ul class="dropdown-menu" role="menu">--}}
            {{--<li><a href="#">Settings 1</a>--}}
            {{--</li>--}}
            {{--<li><a href="#">Settings 2</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
</div>