<ul class="nav nav-sidebar">
	@foreach($viewdata as $menu)
	<li>
		<a href="{{ $menu->url }}">{{ $menu->title }}</a>
	</li>
	@endforeach
</ul>