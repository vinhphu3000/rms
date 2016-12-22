<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<ul class="nav side-menu">
			<?php foreach ($result as $item): ?>
				<li {{ (Request::is('project/' . $item->id) ? 'class="active"' : '') }} >
					<a href="{{ url ('project/' . $item->id) }}"> <h4><span class="x_title">{{$item->name}}</span></h4>
						<span>Client: </span><label>Aussie company</label><br/>
						<span>Created by: </span><label>{{isset($item->user->name) ? $item->user->name : '-'}}</label><br/>
						<span>Created date: </span><label>{{$item->created_at->format('Y/m/d')}}</label>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>