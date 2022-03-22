@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Category</h3>
        </div>
        <div class="card-body">
            <form action="{{route('category.update',['id'=>$categories->id])}}" method="post">
                {{csrf_field()}}

            	<div class="form-group">
            		<label for="name">Name: </label>
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
            		<input type="text" id="name" name="name" value="{{ $categories->name }}" class="form-control">
            	</div>
            	<div class="form-group">
            		<input type="submit" value="Update" class="btn btn-success">
            	</div>
            </form>
        </div>
    </div>
@endsection()
