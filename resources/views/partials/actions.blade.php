@php
$routeName = Route::currentRouteName();
$route = str_replace(".index","",$routeName);
$all_routes = array('blogs');

$show_routes = array('blogs');
$edit_routes = array('blogs');
$delete_routes = array('blogs');

@endphp

@if(in_array($route, $show_routes))
<a href="{{ route($route.'.show', $id) }}" title="Show" class="btn btn-sm" style="background:#F3F3F3;">
	<i class="fa fa-eye"></i>
</a>
@endif

@if(in_array($route, $edit_routes))
<a href="{{ route($route.'.edit', $id) }}" title="Edit" class="btn btn-sm btn-primary">
	<i class="fa fa-edit"></i>
</a>
@endif

@if(in_array($route, $delete_routes))
<a href="javascript:{}" title="Delete" class="action-delete btn btn-sm btn-danger" entry-id="{{$id}}">
	<i class="fa fa-trash-alt"></i>
</a>
@endif