<?php foreach($item_inline_red as $item) : ?>
<li class="<?php echo $item['seen'] ? 'seen' : 'unseen' ?> notification" id="{{$item['id']}}">
    <?php if($item['type'] =='popup') : ?>
        <a class="link-popup" url="{{$item['link']}}">
    <?php else: ?>
        <a  url="{{$item['link']}}" href="{{$item['link']}}">
    <?php endif; ?>
        <span class="image"><img src="{{ asset($item['from']->avatarPath()) }}" alt="Profile Image" /></span>
        <span>
          <span>{{$item['from']->name}}</span>
          <span class="time">{{$item['created_at']->diffForHumans()}}</span>
        </span>
        <span class="message">
          {{$item['title']}}
        </span>
    </a>
</li>
<?php endforeach;?>