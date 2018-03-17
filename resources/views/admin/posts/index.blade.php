@extends('layouts.app')



@section('content')

	<div class="card">
		<div class="card-header">
			Published Posts
		</div>
		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<th>
						Image
					</th>
					<th>
						Title
					</th>
					<th>
						Edit
					</th>
					<th>
						Trash
					</th>
				</thead>

				<tbody>
					@if($posts->count() > 0)
						@foreach($posts as $post)
							<tr>
								<td>
									<img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px">
								</td>
								<td>
									{{ $post->title }}
								</td>
								<td>
									<a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-info">
										<i class="far fa-edit"></i>
									</a>
								</td>
								<td>
									<a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger">
										<i class="far fa-trash-alt"></i>
									</a>
								</td>
							</tr>
						@endforeach

					@else
						<tr>
							<th colspan="5" class="text-center">
								No published posts.
							</th>
						</tr>	
					@endif
				</tbody>

			</table>
		</div>
	</div>


@endsection