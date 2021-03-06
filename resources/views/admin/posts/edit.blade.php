@extends('layouts.app')


@section('content')
	{{-- show errors if any --}}
	@include('admin.includes.errors')

	<div class="card">
		<h5 class="card-title text-center">Edit Post: {{ $post->title }}</h5>
		<div class="card-body">
			{{-- enctype for image upload --}}
				<form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data"> 
					{{ csrf_field() }}
					<div class="form-control">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control" value="{{ $post->title }}">
					</div>
					<br>
					<div class="form-control">
						<label for="featured">Featured Image</label>
						<input type="file" name="featured" class="form-control">
					</div>
					<br>
					<div class="form-control">
						<label for="category">Category</label>
						<select name="category_id" id="category" class="form-control">
							@foreach($categories as $category)
								<option value="{{ $category->id }}"
										@if($category->id == $post->category->id)
											selected
										@endif
									>
									{{ $category->name }}
								</option>
							@endforeach
						</select>
					</div>
					<br>
					<label for="tags">Select tags:</label>
					<div class="form-check">
						@foreach($tags as $tag)
																			{{-- this passes array of tags selected  --}}
							<input type="checkbox" class="form-check-input" id="tags" name="tags[]" value="{{ $tag->id }}"
								@foreach($post->tags as $t)
									@if($tag->id == $t->id)
										checked
									@endif
								@endforeach
							>
    						<label class="form-check-label" for="tags">{{ $tag->tag }}</label>
    						<br>
    					@endforeach
					</div>
					<br>
					<div class="form-control">
						<label for="content">Content</label>
						<textarea class="form-control" name="content" id="content" cols="5" rows="5">{{ $post->content }}</textarea>
					</div>

					<br>
						<div class="text-center">
							<button class="btn btn-success" type="submit">Submit</button>
						</div>
				</form>
		</div>
	</div>



@stop

@section('styles')
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@stop

@section('scripts')
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
  			$('#content').summernote();
		});
	</script>
@stop