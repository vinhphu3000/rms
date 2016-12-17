<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
	<img src="{{ asset(Config::get('constants.PATH_AVATAR') . empty(\App\Authentication\Service::getAuthInfo()->avatar) ? Config::get('constants.PATH_AVATAR') . Config::get('constants.DEFAULT_AVATAR') : \App\Authentication\Service::getAuthInfo()->avatar) }}" alt=""><?php echo \App\Authentication\Service::getAuthInfo()->name?>
	<span class=" fa fa-angle-down"></span>
</a>
<ul class="dropdown-menu dropdown-usermenu pull-right">
	<li><a href="javascript:;"> Profile</a></li>
	<li>
		<a href="javascript:;">
			<span class="badge bg-red pull-right">50%</span>
			<span>Settings</span>
		</a>
	</li>
	<li><a href="javascript:;">Help</a></li>
	<li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
</ul>