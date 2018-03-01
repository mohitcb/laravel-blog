<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')


  </head>
  
  <body>

    @include('partials._nav')    

<<<<<<< HEAD
    <div id="app" class="container">
=======
    <div class="container" id="app">
>>>>>>> c5790b130c69fe7e7580d6b0514952f9351bd27a
      @include('partials._messages')

      @yield('content')

      @include('partials._footer')

    </div> <!-- end of .container --> 

        @include('partials._javascript')
        @yield('scripts')
  </body>
<<<<<<< HEAD
  <script src="{{ mix('js/app.js') }}"></script>
=======
        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
>>>>>>> c5790b130c69fe7e7580d6b0514952f9351bd27a

</html>
