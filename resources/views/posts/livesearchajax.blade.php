@if(count($posts) > 0)
	<table class="table">
		<thead>
			<th>#</th>
			<th>Cover Image</th>
			<th></th>
			<th>Title</th>
			<th>Body</th>
			<th>Created At</th>
			<th></th>
		</thead>

		<tbody>
			
			@foreach ($posts as $post)
				<tr>
					<th>{{ $post->id }}</th>
					<td><img style="width:30%" src="/storage/cover_images/{{$post->cover_image}}"><td>

					<td>{{ $post->title }}</td>
					<td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
					<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
					<td><a href="{{ route('posts.show', $post->slug) }}" class="btn btn-default btn-sm">View</a>
					@if(!Auth::guest())
						@if(Auth::user()->id == $post->user_id)		
						<!--  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a> -->
						@endif
					@endif
					</td>
				</tr>

			@endforeach

		</tbody>
	</table>
@else
	<span>No Post Found</span>
@endif

			