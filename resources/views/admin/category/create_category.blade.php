@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header bg-primary">
		<h3 class="text-white text-center">Create Category</h3>
	</div>
	<div class="card-body">
		<form action="{{route('category.store')}}" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label for="name">Name:</label>
				@error('name')
					<span class="text-danger">{{$message}}</span>
				@enderror
				<input type="text" name="name" class="form-control" id="name" placeholder="Enter the Category">
			</div>
			<input type="submit" value="Create Category" class="btn btn-danger" name="">
		</form>
	</div>
</div>
@endsection