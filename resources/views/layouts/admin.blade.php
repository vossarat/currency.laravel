<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
        	@section('title')
            	{{ $title or 'КВ' }}
            @show
            
        </title>

        <!-- Styles -->
        <!--<link href="/css/app.css" rel="stylesheet">-->

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}"> --}}

        <!-- Optional theme -->
        <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">-->

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
        </script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js">
        </script>

    </head>
    <body>
        @section('top_menu')
        	@include('layouts.top_menu')
        @show

        @yield('content')
        
        @section('footer')
        	@include('layouts.footer')
        @show
    </body>
</html>
