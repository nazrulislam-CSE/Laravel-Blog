@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header bg-danger">
		<h3 class="text-white text-center">All Settings</h3>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-sm">
			<tr class="bg-success text-white text-center">
				<th>Id</th>
				<th>Site Name</th>
				<th>Site Title</th>
				<th>Content</th>
				<th>Contact Number</th>
				<th>Contact Email</th>
				<th>Address</th>
				<th colspan="2">Action</th>
			</tr>
			@foreach($setting as $settings)
				<tr>
					<td>{{ $settings->id }}</td>
					<td>{{ $settings->site_name }}</td>
					<td>{{ $settings->title }}</td>
					<td>{{ $settings->content }}</td>
					<td>{{ $settings->contact_number }}</td>
					<td>{{ $settings->contact_email }}</td>
					<td>{{ $settings->address }}</td>
					<td><a class="btn btn-primary btn-sm" href="{{ route('edit.settings',['id'=>$settings->id])}}">Edit</a></td>
					<td><a class="btn btn-danger  btn-sm" href="#">Delete</a></td>
				</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection