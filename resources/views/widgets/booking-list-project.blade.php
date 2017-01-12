<div class="left-filter" style="height:40px;">
<div class="input-group">
	<input type="text" class="form-control" style="height: 34px">
	<span class="input-group-btn">
                                   <button type="button" class="btn btn-primary">Go!</button>
                            </span>
</div>
</div>


<div class="clearfix"></div>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<ul class="nav side-menu">
			<?php foreach ($projects as $item): ?>
				<li <?php echo !empty($project->id) && $project->id == $item->id ? 'class="active"' : ''?> >
					<a  href="{{ url ('booking?project_id=' . $item->id) }}"> <span style="border-bottom:1px solid #e6e9ed;">{{$item->name}}</span><br/>
						<small>Client: {{$item->client}}</small><br/>
						<small>Created by: {{isset($item->user->name) ? $item->user->name : '-'}}</small>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>