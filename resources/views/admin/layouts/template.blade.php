<!DOCTYPE html>{{-- admin template --}}
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">	
		<link rel="shortcut icon" href="../../assets/ico/favicon.ico">

		<title>
			@section('title')
			{{ $title or 'Админ.панель' }}
			@show
		</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		
		<!-- Include Font-Awesome -->
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">	
		
		<!-- additional CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/menu.css') }}" />
		
			

		<!-- Custom styles for this template -->

		<!-- Just for debugging purposes. Don't actually copy this line! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
	
		@section('navbar')
        	@include('admin.layouts.navbar')
        @show

        <div class="container-fluid">

            <div class="row-fluid">

                @section('sidebar')
                	<div class="{{ Cookie::has('collapsed') ? 'sidebar col-xs-2 collapsed': 'sidebar col-xs-2' }}">
                    	@include('admin.layouts.sidebar')
                    </div>
                @show
				
				<div class="{{ Cookie::has('collapsed') ? 'content col-xs-12': 'content col-xs-10 col-xs-offset-2' }}">
                    @yield('content')
                </div>
               

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