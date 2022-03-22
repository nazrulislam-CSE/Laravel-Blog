@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header bg-danger">
		<h3 class="text-white text-center">All Tags</h3>
	</div>
	<div class="card-body">
		@if($tags->count() > 0)
		<table class="table table-bordered table-striped">
			<tr class="bg-success text-center text-white">
				<th>Id</th>
				<th>Name</th>
				<th>Created_At</th>
				<th colspan="2">Action</th>
			</tr>
			@foreach($tags as $tag)
				<tr>
					<td>{{$tag->id}}</td>
					<td>{{$tag->name}}</td>
					<td>{{$tag->created_at->diffForHumans()}}</td>
					<td>
						<a class="btn btn-info" href="{{route('eidt.tags',['id'=>$tag->id])}}">Edit</a>
						<a class="btn btn-danger" href="{{route('delete.tags',['id'=>$tag->id])}}">Delete</a>
					</td>
				</tr>
			@endforeach
		</table>
		@else
			<h2 class="text-danger">There Are No Tags Yet.</h2>
		@endif
	</div>
</div>	
@endsection