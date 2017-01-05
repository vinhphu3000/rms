<div class="left-filter" style="height:40px;">
		<select class="select2 filter-by-project" style="width: 100%; background: #f7f8f8;">
			<option value="">All Request</option>
			<?php foreach ($projects as $item): ?>
			<option <?php echo $project_id ==  $item->id ? 'selected' : ''?> value="{{$item->id}}">{{$item->name}}</option>
			<?php endforeach;?>
		</select>
</div>


<div class="clearfix"></div>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<ul class="nav side-menu">
			<?php foreach ($requests as $item): ?>
				<li <?php echo !empty($request->id) && $request->id == $item->id ? 'class="active"' : ''?> >
					<a  href="{{ url ('booking/' . $item->project_id . '/' . $item->id) }}"> <span style="border-bottom:1px solid #e6e9ed;font-weight: bold;">{{date('m/d/Y', strtotime($item->created_at))}} - {{$item->project->name??''}}</span><br/>
						<small>
							<?php foreach ($item->params() as $key => $param): ?>
							{{$key == 0 ? '' : ','}}
							 {{$param->role}}({{$param->number}})
							<?php endforeach; ?>
						</small><br/>
						<small>Request by: {{$item->user->name}}</small>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>