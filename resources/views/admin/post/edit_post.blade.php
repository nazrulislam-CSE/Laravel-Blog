@extends('layouts.app')
@section('content')
<div class="card">	
	<div class="card-header bg-danger">
		<h3 class="card-title text-center text-white">Edit Post</h3>
	</div>
	<div class="card-body">
		<form action="{{route('post.update',['id' =>$posts->id])}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
            	<label for="title">Title: </label>
            	@error('title')
            		<span class="text-danger">{{$message}}</span>
            	@enderror
            	<input type="text" id="title" name="title" class="form-control" value="{{$posts->title}}">
            </div>
            <div class="form-group">
            	<label for="featured">Featured Image: </label>
            	@error('featured')
            		<span class="text-danger">{{ $message }}</span>
            	@enderror
            	<input type="file" class="form-control" id="featured" name="featured">
            </div>
            <div class="form-group">
				<label for="category">Category Id</label>
				@error('category_id')
					<span class="text-danger">{{ $message }}</span>
				@enderror
				<select class="form-control" name="category_id" id="category">
					@foreach($categories as $category)
						<option value="{{ $category->id }}"
							@if($posts->category_id == $category->id)
								selected
							@endif
							>{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="tag">Select Tag</label>
				@foreach($tags as $tag)
				<div class="checkbox">
					<label>
						<input type="checkbox" name="tag[]" id="tag" value="{{ $tag->id }}"
						@foreach($posts->tags as $t)
							@if($tag->id == $t->id)
								checked
							@endif
						@endforeach>
						{{ $tag->name }}
					</label>
				</div>
				@endforeach
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				@error('content')
					<span class="text-danger">{{ $message }}</span>
				@enderror
				<textarea class="form-control" name="content" id="content" rows="2" cols="20">{{$posts->content}}</textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="" value="Update Post" class="btn btn-success">
			</div>
		</form>
	</div>
</div>
@endsection