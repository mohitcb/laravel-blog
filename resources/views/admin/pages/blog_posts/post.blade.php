@extends('admin.layouts.master')
@section('title', '| Blog')
@section('content')
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Post List</h3>
            </div>
            <!-- /.box-header -->
            @if(count($posts) > 0)
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>

                <tr>
                  <th>Id</th>
                  <th>Title</th>
                  <th>Body</th>
                  <th>Created at</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                  
                <tr>
                  <a href="dsds">
                  <td>{{ $post->id }}</td>
                  <td>{{ $post->title }}
                  </td>
                  <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
                   <td>{{ $post->created_at }}</td>
                  <td>
                    <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-block btn-primary">View</a>
                  </td>
                  </a>
                </tr>
              
                @endforeach
                </tfoot>
              </table>
            </div>
            @endif
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection