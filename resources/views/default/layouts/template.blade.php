<!DOCTYPE html> {{-- Default template view --}}
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="apple-itunes-app" content="app-id=957083912, affiliate-data=https://itunes.apple.com/app/id957083912">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="Курсы,валют,обменники,курс,Национальный,Банк,Республики,Казахстан,НБ,РК,kase,для,обменный,kz,официальный,usd">
		<meta name="description" content="База список обменных пунктов, курсы валют, курс, доллар сша, евро, калькулятор валют, курсы forex, кросс курсы валют, архив курсов валют, курсы валют архив, обмен валют, обменный пункт, г. Алматы, Казахстан, финансовые новости">

		<title>
			@section('title')
			{{ $title or 'Курсы валют' }}
			@show
		</title>

		<link href="images/app1x.png" rel="shortcut icon" type="image/x-icon"> {{-- favicon --}}
		
		<!-- Styles -->
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		
		<!-- Include Default Style -->
		<link rel="stylesheet" href="{{ asset('css/layouts/default.css') }}">
		<link rel="stylesheet" href="{{ asset('css/layouts/navbar.css') }}">
		<link rel="stylesheet" href="{{ asset('css/layouts/footer.css') }}">		 
		
		<!-- Include Font-Awesome -->
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
		
		<!-- Include Some Style -->
		@stack('css')
	
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
		@stack('scripts')

	</body>    
	
</html>