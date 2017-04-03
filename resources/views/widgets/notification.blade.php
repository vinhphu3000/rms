<a href="javascript:;" class="dropdown-toggle info-number" data-ajax-url="{{url('/notification/seen')}}" data-toggle="dropdown" aria-expanded="false">
    <i class="glyphicon glyphicon-refresh"></i>
    <?php if($count_notify > 0) : ?>
    <span class="badge unread-notify bg-green">{{$count_notify}}</span>
    <?php endif; ?>
</a>
<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
    <?php if(count($notification) > 0) : ?>
        @include('notification.inline-red-item', ['item_inline_red' => $notification])

    {{--<li>--}}
        {{--<div class="text-center">--}}
            {{--<a>--}}
                {{--<strong>See All Notification</strong>--}}
                {{--<i class="fa fa-angle-right"></i>--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--</li>--}}
    <?php else: ?>
    <li>
        There are not notification !
    </li>
<?php endif; ?>
</ul>
