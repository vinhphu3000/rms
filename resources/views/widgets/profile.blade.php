<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
	<img src="{{ asset($my->avatarPath()) }}" alt=""><?php echo $my->name?>
	<span class=" fa fa-angle-down"></span>
</a>
<ul class="dropdown-menu dropdown-usermenu pull-right">
	<li><a href="{{ url('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
</ul>