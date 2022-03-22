@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header bg-primary">
		<h3 class="text-white text-center">Create Tags</h3>
	</div>
	<div class="card-body">
		<form action="{{route('tags.store')}}" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label for="name">Name:</label>
				@error('name')
					<span class="text-danger">{{$message}}</span>
				@enderror
				<input type="text" name="name" class="form-control" id="name" placeholder="Enter the tags">
			</div>
			<input type="submit" value="Create Tags" class="btn btn-danger" name="">
		</form>
	</div>
</div>
@endsection