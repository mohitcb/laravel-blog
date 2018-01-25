<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.commons.head')
  </head>
  
 <body class="hold-transition skin-blue sidebar-mini">

    @include('admin.commons.header')
    @include('admin.commons.sidebar') 
    <div class="content-wrapper">
      <section class="content-header">
        @include('admin.commons.messages')
        <h1>
          <small>Post Edit</small>
        </h1>
      </section>
      @yield('content')
    </div> 

    @include('admin.commons.header_menu_items')
    @include('admin.commons.footer')
    @include('admin.commons.scripts')
  </body>
</html>