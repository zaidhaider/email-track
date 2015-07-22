@extends('layouts.dashboard')
@section('page_heading','RankWatch Mail Manager-User data')

@section('section')

<div class="row">
	<div class="col-sm-12">
		@section ('cotable_panel_title','Status Details')
		@section ('cotable_panel_body')

		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Unique Id</th>
					<th>Email</th>
					<th>State</th>
					<th>Event</th>
					<th>TIME</th>
				</tr>
			</thead>
			<tbody>
				
				@foreach ($taginfosReceiever as $tag_info)
					<tr class="success">
						<td>{{$tag_info->_id}} </td>
						<td>{{$tag_info->_email}} </td>
						<td>{{$tag_info->_state}} </td>
						<td>{{$tag_info->_events}} </td>
						
						<td>{{$tag_info->_date}} </td>
					</tr>
				@endforeach
				
			</tbody>
		</table>	
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
	</div>
</div>
</div>
@stop