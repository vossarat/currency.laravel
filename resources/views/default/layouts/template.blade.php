<!DOCTYPE html> {{-- Default template view --}}
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>
			@section('title')
			{{ $title or 'Курсы валют' }}
			@show
		</title>

		<!-- Styles -->
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/dataTables.css') }}">
		<link rel="stylesheet" href="{{ asset('css/colReorder.dataTables.min.css') }}">		
		<link rel="stylesheet" href="{{ asset('css/default.css') }}">
		<link rel="stylesheet" href="{{ asset('css/jquery.selectBoxIt.css') }}">
		<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	
	</head>
	<body>

        <div class="container-fluid">

            <div class="row">
                @section('navbar')
                @include('default.layouts.navbar')
                @show
            </div>

            <div class="row content">
                @yield('content')
            </div>

            <div class="row footer">
                @section('footer')
                @include('default.layouts.footer')
                @show
            </div>

        </div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
		<script src="{{ asset('js/jquery.selectBoxIt.min.js') }}"></script>
		@stack('scripts')

	</body>    
	
</html>