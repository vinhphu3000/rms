<div class="top_nav">
  <div class="nav_menu">
    <nav>
        <ul class="nav navbar-nav navbar-left">
            <li {{ (Request::is('project') ? 'class=active' : '') }} >
                <a href="{{ url ('project') }}" >
                    <i class="fa fa-th-large"></i>
                </a>

            </li>

            <li {{ (Request::is('employee-explorer') ? 'class=active' : '') }}>
                <a href="{{ url ('employee-explorer') }}"  >
                    <i class="fa fa-users" ></i>
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

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ul>
</div>
</div>