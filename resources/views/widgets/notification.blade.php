<a href="javascript:;" class="dropdown-toggle info-number" data-ajax-url="{{url('/notification/seen')}}" data-toggle="dropdown" aria-expanded="false">
    <i class="glyphicon glyphicon-refresh"></i>
    <?php if($count_notify > 0) : ?>
    <span class="badge unread-notify bg-green">{{$count_notify}}</span>
    <?php endif; ?>
</a>
<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
    <?php if(count($notification) > 0) : ?>
    <?php foreach ($notification as $item): ?>
    <li class="{{$item->status_seen ? 'seen' : 'unseen'}} notification" id="{{$item->id}}">
        <a href="{{$item->link}}">
            <span class="image"><img src="{{ asset($item->user->avatarPath()) }}" alt="Profile Image" /></span>
                        <span>
                          <span>{{$item->user->name}}</span>
                          <span class="time">{{$item->created_at->diffForHumans()}}</span>
                        </span>
                        <span class="message">
                          {{$item->content}}
                        </span>
        </a>
    </li>
    <?php endforeach; ?>

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
