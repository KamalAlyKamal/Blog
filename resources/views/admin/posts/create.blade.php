@extends('layouts.app')


@section('content')
	{{-- show errors if any --}}
	@include('admin.includes.errors')

	<div class="card">
		<h5 class="card-title text-center">Create a new post</h5>
		<div class="card-body">
			{{-- enctype for image upload --}}
				<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data"> 
					{{ csrf_field() }}
					<div class="form-control">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control">
					</div>
					<br>
					<div class="form-control">
						<label for="featured">Featured Image</label>
						<input type="file" name="featured" class="form-control">
					</div>
					<br>
					<div class="form-control">
						<label for="content">Content</label>
						<textarea class="form-control" name="content" id="content" cols="5" rows="5"></textarea>
					</div>

					<br>
						<div class="text-center">
							<button class="btn btn-success" type="submit">Submit</button>
						</div>
				</form>
		</div>
	</div>



@stop