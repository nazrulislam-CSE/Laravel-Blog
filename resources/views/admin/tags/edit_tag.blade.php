@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header bg-success">
            <h3 class="card-title text-center text-white">Edit Tags</h3>
        </div>
        <div class="card-body">
            <form action="{{route('tags.update',['id'=>$tags->id])}}" method="post">
                {{csrf_field()}}
            	<div class="form-group">
            		<label for="name">Name: </label>
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
            		<input type="text" id="name" name="name" value="{{$tags->name}}" class="form-control">
            	</div>
            	<div class="form-group">
            		<input type="submit" value="Update" class="btn btn-success">
            	</div>
            </form>
        </div>
    </div>
@endsection()
