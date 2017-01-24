<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}"> --}}

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js">    
    </script>


    <title>
      Курсы валют - @yield('title')
    </title>
  </head>
  <body>

    <div class="container-fluid">
      @yield('top_menu')

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center">
          @yield('myfield')
        </div>
      </div>



      @yield('footer')


    </div> <!-- end class container -->
  </body>
</html>