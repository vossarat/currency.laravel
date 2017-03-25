<nav id="default-navbar" class="navbar navbar-default" role="navigation" >
	<div class="navbar-header">
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<img src="/images/app1x.png" class="logo"><a href="/" class="navbar-brand">Курсы валют</a>
	</div>
	<!-- Collection of nav links and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse">
		<div class="col-md-offset-2">
		<ul class="nav navbar-nav">
			@foreach($viewdata as $menu)
			<li>
				<a href="{{ $menu->url }}"><img src="/images/{{ $menu->icon }}" class="img-nav"><big>&nbsp;&nbsp;{{ $menu->title }}</big></a>
			</li>
			@endforeach
		</ul>
		</div>



		<ul class="nav navbar-nav navbar-right">
			<!-- Authentication Links -->
			@if (Auth::guest())
			<li>
				<a href="{{ url('/login') }}"><i class="glyphicon glyphicon-lock"></i></a></li>
			@else
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					{{ Auth::user()->name }}
					<span class="caret"></span>
				</a>

				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="{{ route('adminpanel') }}">AdminPanel</a></li>
					<li>
						<a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
							Logout
						</a>

						<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>

				</ul>
			</li>
			@endif
		</ul>
	</div>
</nav>

