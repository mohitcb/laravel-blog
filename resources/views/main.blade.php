<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')


  </head>
  
  <body>

    @include('partials._nav')    

    <div id="app" class="container">
      @include('partials._messages')

      @yield('content')

      @include('partials._footer')

    </div> <!-- end of .container --> 

        @include('partials._javascript')

        @yield('scripts')
  </body>
  <script src="{{ mix('js/app.js') }}"></script>

</html>
