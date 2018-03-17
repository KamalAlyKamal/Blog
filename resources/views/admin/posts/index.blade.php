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
						Delete
					</th>
				</thead>

				<tbody>
					@foreach($posts as $post)
						<tr>
							<td>
								Image
							</td>
							<td>
								{{ $post->title }}
							</td>
							<td>
								Edit
							</td>
							<td>
								Delete
							</td>
						</tr>
					@endforeach
				</tbody>

			</table>
		</div>
	</div>


@endsection