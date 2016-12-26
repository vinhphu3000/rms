<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<ul class="nav side-menu">
			<?php foreach ($result as $item): ?>
				<li <?php echo !empty($project->id) && $project->id == $item->id ? 'class="active"' : ''?> >
					<a  href="{{ url ('project/details/' . $item->id) }}"> <span style="border-bottom:1px solid #e6e9ed;">{{$item->name}}</span><br/>
						<small>Client: {{$item->client}}</small><br/>
						<small>Created by: {{isset($item->user->name) ? $item->user->name : '-'}}</small>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>