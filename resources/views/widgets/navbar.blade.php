<div class="top_nav">
  <div class="nav_menu">
    <nav>
        <div class="navbar nav_title">
            <a href="index.html"><h3 style="text-align: center; color:#ecf0f1">RMS</h3></a>

        </div>

        <ul class="nav navbar-nav navbar-left">
            <li {{ (Request::is('project') ? 'class=active' : '') }} >
                <a href="{{ url ('project') }}" >
                    <i class="fa fa-th-large"></i>
                </a>

            </li>
            <li>
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="glyphicon glyphicon-refresh"></i>
                    <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                        <a>
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                        </a>
                    </li>
                    <li>
                        <div class="text-center">
                            <a>
                                <strong>See All Alerts</strong>
                                 <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>


        </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="">
            @include('widgets.profile')
        </li>

        <li role="presentation" class="dropdown">
          <a href="javascript:;" class="active" >
            <i class="glyphicon glyphicon-align-justify"></i>
          </a>
        </li>
      </ul>
    </nav>
  </div>


</div>