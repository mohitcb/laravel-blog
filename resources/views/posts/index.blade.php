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
		    	<post-list></post-list>
		    	<counter></counter>

<<<<<<< HEAD
					@endforeach

				</tbody>
			</table>
			<counter></counter>

			<div class="text-center">
			</div>
			@endif
		</div>
=======
>>>>>>> c5790b130c69fe7e7580d6b0514952f9351bd27a
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