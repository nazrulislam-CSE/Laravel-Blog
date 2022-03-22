@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header bg-danger">
		<h3 class="card-title text-center text-white">Edit Settings</h3>
	</div>
	<div class="card-body">
		<form action="{{route('update.settings',['id'=>$setting->id])}}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="sitename">Site Name:</label>
				@error('sitename')
					<span class="text-danger">{{ $message }}</span>
				@enderror
				<input type="text" name="sitename" value="{{$setting->site_name}}" id="sitename" class="form-control">
			</div>
			<div class="form-group">
				<label for="title">Title:</label>
				@error('title')
					<span class="text-danger">{{ $message }}</span>
				@enderror
				<input type="text" name="title" value="{{$setting->title}}" id="title" class="form-control">
			</div>
			<div class="form-group">
				<label for="number">Contact Number:</label>
				@error('contact')
					<span class="text-danger">{{ $message }}</span>
				@enderror
				<input type="number" name="contact" id="number" value="{{$setting->contact_number}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">Contact Email:</label>
				@error('email')
					<span class="text-danger">{{ $message }}</span>
				@enderror
				<input type="email" name="email" value="{{$setting->contact_email}}" id="email" class="form-control">
			</div>
			<div class="form-group">
				<label for="address">Address:</label>
				@error('address')
					<span class="text-danger">{{ $message }}</span>
				@enderror
				<input type="text" name="address" value="{{$setting->address}}" id="address" class="form-control">
			</div>
			<div class="form-group">
				<label for="sitecontent">Content:</label>
				@error('content')
					<span class="text-danger">{{ $message }}</span>
				@enderror
				<input type="text" name="content" value="{{$setting->content}}" id="sitecontent" class="form-control">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success" name="submit" value="Update">
			</div>
		</form>
	</div>
</div>
@endsection