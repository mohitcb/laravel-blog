@extends('main')

@section('title', '| All Posts')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of .row -->

		<div class="row">
           <div id="custom-search-input">
	           	{!! Form::open(array('route' => 'search', 'method' => 'GET')) !!}
	                <div class="input-group col-md-3">
	                	{{ Form::text('q', null, array('class' => 'search-query form-control','placeholder'=>'Search', 'required' => '' ,'onkeyup' => 'search()', 'maxlength' => '255')) }}
	                    <span class="input-group-btn">
	                        <button class="btn btn-danger" type="submit">
	                            <span class=" glyphicon glyphicon-search"></span>
	                        </button>
	                    </span>
	                </div>
	            {!! Form::close() !!}
            </div>
		</div>
		<div class="col-md-12">
			@if(count($posts) > 0)
			<table id="post-table" class="table">
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
			<counter></counter>

			<div class="text-center">
			</div>
			@endif
		</div>
	</div>

@stop
  <script type="text/javascript">
  function search() {
    var query_value = $('.search-query').val();
    if(query_value !== ''){
	    $.ajax({
	      url: '/search',
	      data: {q: query_value},
	      success: function (result) { 
	      	$("#post-table").html('');  
	      	$("#post-table").html(result); 
	      },
	      error: function (result) {
          }
	  });
  }
}
</script>