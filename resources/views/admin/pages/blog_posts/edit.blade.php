@extends('admin.layouts.master')
@section('title', '| Post Edit')
@section('content')
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Post Edit</h3>
            </div>
            <!-- form start -->
           {!! Form::model($post, ['route' => ['blog.update', $post->id], 'method' => 'PUT','files' => true]) !!}
              <div class="box-body">
                <div class="form-group">
                  {{ Form::label('title', 'Title', ['for' => 'title']) }}
                  {{ Form::text('title', null, ["class" => 'form-control',"id" =>'title']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('slug', 'Slug', ['for' => 'slug']) }}
                  {{ Form::text('slug', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                  <!-- {{ Form::label('body', 'Body', ['for' => 'body']) }} -->
                  {{ Form::textarea('body', null, ['class' => 'form-control', 'id'=> 'blog']) }}
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
      </section>
    <!-- /.content -->
@endsection
