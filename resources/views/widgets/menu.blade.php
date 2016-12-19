<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<ul class="nav side-menu">
			<li {{ (Request::is('dash') ? 'class="active"' : '') }} ><a href="{{ url ('user') }}"><i class="fa fa-user"></i> User </a></li>
			<li {{ (Request::is('employee') ? 'class="active"' : '') }} ><a href="{{ url ('employee') }}"><i class="fa fa-users"></i> Employee</a></li>
		</ul>
	</div>
</div>