@extends('layouts.dashboard')
@section('page_heading','RankWatch Mail Manager-Administrator data')

@section('section')

<div class="row">
	<div class="col-sm-12">
		@section ('cotable_panel_title','Status Details')
		@section ('cotable_panel_body')

		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Unique Id </th>
					<th>Tags</th>
					<th>Open Rate</th>
					<th>Click Rate</th>
					
					<th>TIME</th>
				</tr>
			</thead>
			<tbody>
				
				@foreach ($taginfosSenderV2 as $tag_info)
				
					<tr class="success">
						<td>{{$tag_info->_id}} </td>
						<td>{{$tag_info->_tags}} </td>
						<td>{{$tag_info->open_rate}} </td>
						<td>{{$tag_info->click_rate}} </td>
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