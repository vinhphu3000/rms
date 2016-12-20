<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
	<img src="{{ asset(Config::get('constants.PATH_AVATAR') . empty(\App\Authentication\Service::getAuthInfo()->avatar) ? Config::get('constants.PATH_AVATAR') . Config::get('constants.DEFAULT_AVATAR') : \App\Authentication\Service::getAuthInfo()->avatar) }}" alt=""><?php echo \App\Authentication\Service::getAuthInfo()->name?>
	<span class=" fa fa-angle-down"></span>
</a>
<ul class="dropdown-menu dropdown-usermenu pull-right">
	<li><a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
</ul>