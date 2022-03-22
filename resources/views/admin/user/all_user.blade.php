@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header bg-primary">
		<h3 class="text-white text-center">All User</h3>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<tr class="bg-success text-white text-center">
				<th>Id</th>
				<th>Image</th>
				<th>Name</th>
				<th>Premission</th>
				<th colspan="2">Action</th>
			</tr>
			@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td><img src="{{asset($user->profile->avater)}}" alt="" height="70" width="70" style="border-radius: 50%;"></td>
					<td>{{$user->name}}</td>
					<td>
						@if($user->admin == 1)
							<a href="{{ route('user.not_admin',['id'=>$user->id])}}" class="btn btn-danger btn-sm">Remove Premission</a>
						@else
							<a href="{{ route('user.admin',['id'=> $user->id])}}" class="btn btn-success btn-sm">Make Admin</a>
						@endif
					</td>
					<td>Premission</td>
					<td>Delete</td>
				</tr>
			@endforeach
		</table>
	</div>
</div>
@endsection