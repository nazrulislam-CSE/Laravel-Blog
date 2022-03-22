@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header bg-primary">
		<h3 class="text-white text-center">Create a New User</h3>
	</div>
	<div class="card-body">
		<form action="{{route('user.store')}}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Name:</label>
				@error('name')
					<span class="text-danger">{{ $message }}</span>
				@enderror
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter the user name:">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				@error('email')
					<span class="text-danger">{{ $message }}</span>
				@enderror
				<input type="email" name="email" id="email" class="form-control" placeholder="Enter the user Email:">
			</div>
			<div class="form-group">
				<input type="submit" name="" value="Add User" class="btn btn-success">
			</div>
		</form>
	</div>
</div>
@endsection