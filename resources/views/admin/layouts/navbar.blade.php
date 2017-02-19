<div class="navbar navbar-inverse navbar-fixed-top" role="navigation"> {{-- dashboard top menu --}}
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Административная панель</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ route('main') }}">MainPage</a></li>
				<li><a href="{{ route('register') }}">Register</a></li>
			</ul>
			<form class="navbar-form navbar-right">
				<input type="text" class="form-control" placeholder="Search...">
			</form>
		</div>
	</div>
</div> {{-- end dashboard top menu --}}

@push('scripts')
<script>
	$(document).ready(function ()
		{
			$(".navbar-brand").click(function ()
				{
					$.post("/admin/collapsed", {'_token':"{{ csrf_token() }}" } );
					$(".sidebar").toggleClass("collapsed");
					$(".content").toggleClass("col-xs-12 col-xs-10 col-xs-offset-2");

					return false;
				});
		});
</script>
@endpush