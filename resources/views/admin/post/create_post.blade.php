@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header bg-success">
		<h3 class="text-center text-white">Create Post</h3>
	</div>
	<div class="card-body">
		<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label for="title">Title</label>
				@error('title')
					<span class="text-danger">{{$message}}</span>
				@enderror
				<input type="text" id="title" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label for="featured">Featured</label>
				@error('featured')
					<span class="text-danger">{{$message}}</span>
				@enderror
				<input type="file" name="featured" class="form-control" id="featured">
			</div>
			<div class="form-group">
				<label for="category">Category Id</label>
				@error('category_id')
					<span class="text-danger">{{$message}}</span>
				@enderror
				<select class="form-control" name="category_id" id="category">
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{$category->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="tag">Select Tag:</label>
				@error('tags')
					<span class="text-danger">{{$message}}</span>
				@enderror
				@foreach($tags as $tag )
					<div class="checkbox">
						<label><input type="checkbox" id="checkbox" value="{{ $tag->id}}" name="tags[]"> {{$tag->name}}</label>
					</div>
				@endforeach
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				@error('content')
					<span class="text-danger">{{$message}}</span>
				@enderror
				<textarea class="form-control" name="content" id="content" rows="2" cols="20"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="" value="Creat Post" class="btn btn-success">
			</div>
		</form>
	</div>
</div>
@endsection