@extends('layouts.app')


@section('content')
	{{-- show errors if any --}}
	@include('admin.includes.errors')

	<div class="card">
		<h5 class="card-title text-center">Edit tag {{ $tag->tag }}</h5>
		<div class="card-body">
				<form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="POST"> 
					{{ csrf_field() }}
					<div class="form-control">
						<label for="name">Tag</label>
						<input type="text" name="tag" class="form-control" value="{{ $tag->tag }}">
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