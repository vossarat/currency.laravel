<nav role="navigation" class="navbar navbar-default">
	<div class="navbar-header">
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="#" class="navbar-brand">КВ</a>
	</div>
	<!-- Collection of nav links and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			@foreach($viewdata as $menu)
			<li>
				<a href="{{ $menu->url }}">{{ $menu->title }}</a>
			</li>
			@endforeach
		</ul>



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

