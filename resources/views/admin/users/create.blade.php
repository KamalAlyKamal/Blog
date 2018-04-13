@extends('layouts.app')


@section('content')
	{{-- show errors if any --}}
	@include('admin.includes.errors')

	<div class="card">
		<h5 class="card-title text-center">Create a new user</h5>
		<div class="card-body">
				<form action="{{ route('user.store') }}" method="POST"> 
					{{ csrf_field() }}
					<div class="form-control">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control">
					</div>
					<br>
					<div class="form-control">
						<label for="name">Email</label>
						<input type="email" name="email" class="form-control">
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