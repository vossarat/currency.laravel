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
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                @section('top_menu')
                @include('default.layouts.top_menu')
                @show
            </div>

            <div class="row">
                @yield('content')
            </div>

            <div class="row">
                @section('footer')
                @include('default.layouts.footer')
                @show
            </div>

        </div>
        </div>



        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    </body>
</html>
