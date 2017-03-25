<div class="col-xs-10 col-xs-offset-1">
	@foreach (collect($browseFiles)->chunk(4) as $chunk)
	<div class="row">
		@foreach ($chunk as $file)
		<div class="col-xs-3">
			<div class="thumbnail">
				<a href="#"><img src="/storage/logotips/{{ $file }}"></a>
			</div>
		</div>
		@endforeach
	</div>
	@endforeach
</div>