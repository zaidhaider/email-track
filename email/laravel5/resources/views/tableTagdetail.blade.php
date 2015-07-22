@extends('layouts.dashboard')
@section('page_heading','RankWatch Mail Manager-Administrator data')

@section('section')


<div class="row">
	<div class="col-sm-12">
		@section ('cotable_panel_title','Tag Details- Today')
		@section ('cotable_panel_body')
	<!--	<div  class="col-sm-3 btn btn-primary" id="myDiv">
		<button type="button" onclick="loadXMLDoc()">Last 7 days</button>
		</div>
		<div class="col-sm-3 btn btn-primary" id="myDiv">
		<button type="button" onclick="loadXMLDoc()">Last 14 days</button>
		</div>
		<div class="col-sm-3 btn btn-primary" id="myDiv">
		<button type="button" onclick="loadXMLDoc()">Last 30 days</button>
		</div> 
		<div class="container">
			    <div class="row">
			        <div class='col-sm-3'>
			            <div class="form-group">
			                <div class='input-group date' id='datetimepicker1'>
			                    <input type='text' placeholder="Choose Date" class="form-control" />
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
			            </div>
			        </div>
	          	</div>
			</div> -->
			<div class="bfh-datepicker" data-format="y-m-d" data-date="today">
			</div>
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Tags</th>
					<th>Date</th>
					<th>LastUpdate</th>
					<th>Sent</th>
					<th>Hard Bounces</th>
					<th>Open Rate</th>
					<th>Click Rate</th>
					<th>Rejects</th>
					<th>Clicks</th>
					<th>Unique Opens</th>
				</tr>
			</thead>
			<tbody>
				
				@foreach ($tagdetails as $tag_info)
				
					<tr class="success">
						<td>{{$tag_info->tag_name}} </td>
						<td>{{$tag_info->_date}} </td>
						<td>{{$tag_info->last_updated}} </td>
						<td>{{$tag_info->sent}} </td>
						<td>{{$tag_info->hard_bounces}} </td>
						<td>{{$tag_info->opens}} </td>
						<td>{{$tag_info->clicks}} </td>
						<td>{{$tag_info->rejects}} </td>
						<td>{{$tag_info->unique_click}} </td>
						<td>{{$tag_info->unique_open}} </td>
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