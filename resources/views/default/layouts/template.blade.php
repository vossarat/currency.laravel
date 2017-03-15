{{-- Default template view --}}
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
		<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/dataTables.css') }}">
		<link rel="stylesheet" href="{{ asset('css/colReorder.dataTables.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/sidebarDefault.css') }}">

	</head>
	<body>

		<div class="container-fluid">
			<div class="row">
				@section('navbar')
					@include('default.layouts.navbar')
				@show
			</div>

			@yield('content')

			<div class="row">
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
		@stack('scripts')

	</body>
</html>
