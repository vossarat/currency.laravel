{{-- DefaultPage Sidebar  --}}
<ul class="nav nav-sidebar">
	@foreach($viewdata as $menu)
	<li>
		<a href="{{ $menu->url }}">{{ $menu->title }}</a>
	</li>
	@endforeach
</ul>

@push('scripts')

<script>
	$(document).ready(function()
		{

			var contentHeight = $('#contentDefault').height();
			$('#sidebarDefault').height(contentHeight);

			console.log(contentHeight);

		});
</script>
@endpush