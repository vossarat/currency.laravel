<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}"</link>

<div id="wrapper">
	<div class="col-sm-3 col-md-2 sidebar">
		<ul class="nav nav-sidebar">
			@foreach($viewdata as $menu)
			<li>
				<a href="{{ $menu->url }}">{{ $menu->title }}</a>
			</li>
			@endforeach
		</ul>
	</div>
</div>


{{--@push('scripts')
<script src="{{ asset('js/my.js') }}"></script>
@endpush--}}