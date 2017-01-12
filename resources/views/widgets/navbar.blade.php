<div class="top_nav">
  <div class="nav_menu">
    <nav>
        <div class="navbar nav_title">
            <a href="{{url('project')}}"><h3 style="text-align: center; color:#ecf0f1">RMS</h3></a>
        </div>

        <ul class="nav navbar-nav navbar-left">
            <li {{ (Request::is('project') ? 'class=active' : '') }} >
                <a href="{{ url ('project') }}" >
                    <i class="fa fa-th-large"></i>
                </a>

            </li>
            <li>
                @include('widgets.notification')
            </li>


        </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="">
            @include('widgets.profile')
        </li>
<?php if ($my->type == 'admin'): ?>
        <li role="presentation" class="dropdown active">
          <a href="{{url('user')}}" >
            <i class="glyphicon glyphicon-align-justify"></i>
          </a>
        </li>
<?php endif; ?>
      </ul>
    </nav>
  </div>


</div>