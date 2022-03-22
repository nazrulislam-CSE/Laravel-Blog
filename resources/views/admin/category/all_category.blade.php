@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header bg-danger">
		<h3 class="text-white text-center">All Category</h3>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-striped">
			<tr class="bg-success text-center text-white">
				<th>Id</th>
				<th>Name</th>
				<th>Created_At</th>
				<th colspan="2">Action</th>
			</tr>
			@foreach($categories as $category)
				<tr>
					<td>{{$category->id}}</td>
					<td>{{$category->name}}</td>
					<td>{{$category->created_at->diffForHumans()}}</td>
					<td>
						<a class="btn btn-info" href="{{route('category.edit',['id'=>$category->id])}}">Edit</a>
						<a class="btn btn-danger" href="{{route('delete',['id'=>$category->id])}}">Delete</a>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
</div>	
@endsection