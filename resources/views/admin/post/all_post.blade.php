@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header bg-primary">
		<h3 class="text-center text-white">All Post</h3>
	</div>
	<div class="card-body">
		@if($posts->count() > 0)
		<table class="table table-sm table-bordered table-striped">
			<tr class="bg-success text-white text-center">
				<th>Id</th>
				<th>Featured</th>
				<th>Title</th>
				<th>Slug</th>
				<th>Content</th>
				<th>Category_Name</th>
				<th>Created_At</th>
				<th>Updated_At</th>
				<th colspan="2">Action</th>
			</tr>
			@foreach($posts as $post)
				<tr>
					<td>{{$post->id}}</td>
					<td>
						<img src="{{ $post->featured }}" alt="" width="50" height="50">
					<td>{{ $post->title }}</td>
					<td>{{ $post->slug }}</td>
					<td>{{ $post->content }}</td>
					<td>{{ $post->category->name }}</td>
					<td>{{ $post->created_at->diffForHumans() }}</td>
					<td>{{ $post->updated_at->diffForHumans() }}</td>
					<td>
						<a class="btn btn-info mb-3 btn-sm" href="{{route('post.edit',['id'=>$post->id])}}">Edit</a>
						<a class="btn btn-danger mb-3 btn-sm" href="{{route('post.delete',['id'=>$post->id])}}">Trash</a>
					</td>
				</tr>
			@endforeach
		</table>
		@else
			<h2 class="text-danger">There Are No Post Yet.</h2>
		@endif
	</div>
</div>
@endsection