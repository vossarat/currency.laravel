@extends('default.layouts.template')

@section('title', 'Main Page')

@section('top_menu')
@parent
@endsection

@section('content')

<button>Name3</button>

<div class="table-responsive">
	<table id="example" class="table table-striped">
		<thead>
			<tr>
				<th rowspan="2">Название</th>

				@foreach($viewUniqueCurrency as $nameCurrency)
				@break($loop->index > 2)
				<th colspan="2">{{ $nameCurrency }}</th>
				@endforeach
			</tr>
			<tr>
				@foreach($viewUniqueCurrency as $nameCurrency)
				@break($loop->index > 2)
				<th>Покупка</th>
				<th>Продажа</th>

				@endforeach
			</tr>


		</thead>


		<tbody>

			@foreach($viewdata as $content)

			<tr>
				<td style="text-align: left;">{{ $content->name }}</td>
				@foreach($content->currency as $currency)
				@break($loop->index > 2)
				<td>{{ $currency->buy }} </td>
				<td>{{ $currency->sell }} </td>
				@endforeach
			</tr>

			@endforeach

		</tbody>
	</table>
</div>

@push('scripts')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script>
	$(document).ready(function()
		{
			var table = $('#example').DataTable(
				{
					"paging":   false,
					searching: false,
					"info":     false
				});


			$('button').on( 'click', function (e)
				{

				} );
		});
</script>
@endpush

@endsection

@section('footer')
@parent
@endsection