@extends('layouts.app')


@section('content')
	{{-- show errors if any --}}
	@include('admin.includes.errors')

	<div class="card">
		<h5 class="card-title text-center">Edit Blog Settings</h5>
		<div class="card-body">
				<form action="{{ route('settings.update') }}" method="POST"> 
					{{ csrf_field() }}
					<div class="form-control">
						<label for="site_name">Site Name</label>
						<input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
					</div>
					<br>
					<div class="form-control">
						<label for="contact_number">Contact Number</label>
						<input type="text" name="contact_number" value="{{ $settings->contact_number }}" class="form-control">
					</div>
					<br>
					<div class="form-control">
						<label for="contact_email">Contact Email</label>
						<input type="email" name="contact_email" value="{{ $settings->contact_email }}" class="form-control">
					</div>
					<br>
					<div class="form-control">
						<label for="address">Address</label>
						<input type="text" name="address" value="{{ $settings->address }}" class="form-control">
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