@extends('layouts.app')


@section('content')
	{{-- show errors if any --}}
	@include('admin.includes.errors')

	<div class="card">
		<h5 class="card-title text-center">Edit Profile</h5>
		<div class="card-body">
				<form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data"> 
					{{ csrf_field() }}
					<div class="form-control">
						<label for="name">Username</label>
						<input type="text" name="name" class="form-control" value="{{ $user->name }}">
					</div>
					<br>
					<div class="form-control">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" value="{{ $user->email }}">
					</div>
					<br>
					<div class="form-control">
						<label for="password">New Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<br>
					<div class="form-control">
						<label for="avatar">Upload Avatar</label>
						<input type="file" name="avatar" class="form-control">
					</div>
					<br>
					<div class="form-control">
						<label for="facebook">Facebook Profile</label>
						<input type="text" name="facebook" class="form-control" value="{{ $user->profile->facebook }}">
					</div>
					<br>
					<div class="form-control">
						<label for="youtube">Youtube Profile</label>
						<input type="text" name="youtube" class="form-control" value="{{ $user->profile->youtube }}">
					</div>
					<br>
					<div class="form-control">
						<label for="about">About Me</label>
						<textarea name="about" id="about" cols="6" rows="6" class="form-control">{{ $user->profile->about }}</textarea>
					</div>
					<br>
					<div class="text-center">
						<button class="btn btn-success" type="submit">
							Submit
						</button>
					</div>
				</form>
		</div>
	</div>



@stop