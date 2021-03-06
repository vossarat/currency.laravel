@extends('default.layouts.template')

@section('title', 'Обменные пункты')

@section('content')

<div class="table-responsive">
	<table id="currencyViewTable" class="table" width="100%">
		<thead>
			<tr>
				<th class="hidden column-office-name" rowspan="2">Обменный пункт</th>
				@for($i=1; $i<=3; $i++)
				<th colspan="2" class="{{ $i>1 ? 'hidden-xs' : '' }}">
					<select class="form-control" id="select-currency-column-{{ $i }}">
						@foreach($viewUniqueCurrency as $currencyName)
							@if($i==1 and $currencyName == 'USD')
								<option data-iconurl="/images/icon/USD.PNG" selected>USD</option>
							@elseif($i==2 and $currencyName == 'RUB')
								<option data-iconurl="/images/icon/RUB.PNG" selected>RUB</option>
							@elseif($i==3 and $currencyName == 'EUR')
								<option data-iconurl="/images/icon/EUR.PNG" selected>EUR</option>
							@else
								<option data-iconurl="/images/icon/{{ $currencyName }}.PNG">{{ $currencyName }}</option>
							@endif
						@endforeach
					</select>
				</th>
				@endfor
			</tr>

			<tr>
				@for($i=1; $i<=3; $i++)
				@foreach($viewUniqueCurrency as $currencyName)
				<th class="{{ $i>1 ? 'hidden-xs' : '' }} hidden column-currency-{{ $i.'-'.$currencyName }}">Покупка</th>
				<th class="{{ $i>1 ? 'hidden-xs' : '' }} hidden column-currency-{{ $i.'-'.$currencyName }}">Продажа</th>
				@endforeach
				@endfor
			</tr>
		</thead>


		<tbody>

			@foreach($viewdata as $content)

			<tr>
				<td class="hidden column-office-name"><img src="/storage/logotips/{{$content->name}}.png">&nbsp;&nbsp;{{ $content->name }}</td>

				@for($i=1; $i<=3; $i++)
				@foreach($content->currency as $currency)
				<td class="{{ $i>1 ? 'hidden-xs' : '' }} hidden column-currency-{{ $i.'-'.$currency->code }}">{{ $currency->buy }} </td>
				<td class="{{ $i>1 ? 'hidden-xs' : '' }} hidden column-currency-{{ $i.'-'.$currency->code }}">{{ $currency->sell }} </td>
				@endforeach
				@endfor

			</tr>

			@endforeach

		</tbody>
	</table>
</div>
@push('css')
	<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/dataTables.css') }}">
	<link rel="stylesheet" href="{{ asset('css/colReorder.dataTables.min.css') }}">		
	<link rel="stylesheet" href="{{ asset('css/jquery.selectBoxIt.css') }}">
	<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('css/pages/office.css') }}"> 
@endpush

@push('scripts')
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/jquery.selectBoxIt.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/dataTables.colReorder.min.js') }}"></script>
<script>
	$(document).ready(function()
		{
			$('#currentpage').val('1');
			var currentpage = $('#currentpage').val();
			var table = $('#currencyViewTable').DataTable(
				{
					"paging":  false,
					searching: false,
					"info":    false,
				});
			$('.column-office-name').removeClass('hidden');
			$('.column-currency-1-USD').removeClass('hidden');
			$('.column-currency-2-RUB').removeClass('hidden');
			$('.column-currency-3-EUR').removeClass('hidden');
			var currencyViewTableHeight = $('#currencyViewTable').height();
			$('#currencyViewTable').height(currencyViewTableHeight);
			$("#select-currency-column-1").on("change", function()
				{
					$('[class*="column-currency-1"]').addClass('hidden');
					$('.column-currency-1-'+this.value).removeClass('hidden');
				});
			$("#select-currency-column-2").on("change", function()
				{
					$('[class*="column-currency-2"]').addClass('hidden');
					$('.column-currency-2-'+this.value).removeClass('hidden');
				});
			$("#select-currency-column-3").on("change", function()
				{
					$('[class*="column-currency-3"]').addClass('hidden');
					$('.column-currency-3-'+this.value).removeClass('hidden');
				});
		});
			
	    $("select").selectBoxIt();

</script>
@endpush
@endsection