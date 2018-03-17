@extends('layouts.app')



@section('content')

	<div class="card">
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
						Restore
					</th>
					<th>
						Delete
					</th>
				</thead>

				<tbody>
					@foreach($posts as $post)
						<tr>
							<td>
								<img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px">
							</td>
							<td>
								{{ $post->title }}
							</td>
							<td>
								Edit
							</td>
							<td>
								<a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-success">
									<i class="far fa-window-restore"></i>
								</a>
							</td>
							<td>
								<a href="{{ route('post.kill', ['id' => $post->id]) }}" class="btn btn-danger">
									<i class="far fa-trash-alt"></i>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>

			</table>
		</div>
	</div>


@endsection