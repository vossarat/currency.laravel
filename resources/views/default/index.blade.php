@extends('default.layouts.template')

@section('title', 'Курсы валют НБ РК')

@section('content')
<div class="row-fluid">
	@foreach($viewdata as $currencyBase)
	@if(in_array($currencyBase->title, ['USD','RUB','EUR']))
	@foreach($currencyData as $oneCurrencyInfo)
	@if($currencyBase->title == $oneCurrencyInfo->title)
	<div class="col-xs-12 col-sm-4"> {{-- разделить на 3 части --}}
		<div class="main-currency">
			<div class="row"> {{-- разделим иконку флага валюты и информацию о курсе --}}
				<div class="col-xs-5">
					<img src="/images/icon/{{ $currencyBase->title . '.PNG' }}">
				</div>
				<div class="col-xs-7 text-center">
					<p class="main-currency-title">{{ $currencyBase->title }} 1 {{ $oneCurrencyInfo->symbol }} =</p>
					<p class="main-currency-description">{{ $currencyBase->description}} ⍑</p>
					<p class="main-currency-change {{$currencyBase->index=='DOWN' ?'DOWN' : 'UP'}}">
					 <b>{{ $currencyBase->change}} 
					 <i class="glyphicon glyphicon-{{$currencyBase->index=='DOWN' ? 'arrow-down' : ($currencyBase->index=='UP' ? 'arrow-up':'ok')}}"></i> </b></p>
					<p class=""><i>{{ $currencyBase->pubDate }}</i></p>
				</div>
			</div>
		</div>
	</div>
	@endif
	@endforeach
	@endif
	@endforeach
</div>

<div class="row-fluid hidden-xs">
	<div class="col-sm-8">
		<div class="main-currency">			
			<h1 class="text-center hidden"> Курсы Национального Банка Республики Казахстан </h1>
			<h2 class="text-center"> Курсы Национального Банка Республики Казахстан </h2>
				@foreach($viewdata as $currency)				
					<div class="table-row-currency-all">
						<div class="row">											
							<div class="col-sm-2 col-sm-offset-1 text-left">
								{{ $currency->title }}
								<img src="/images/icon/{{ $currency->title.'.PNG' }}" class="currency-icon">
							</div>

								@foreach($currencyData as $oneCurrencyInfo)
									@if($currency->title == $oneCurrencyInfo->title)
										<div class="col-sm-2 text-center">
											{{ $oneCurrencyInfo->rusname}}
										</div>
										
										<div class="col-sm-2 text-left">
											{{ "1 $oneCurrencyInfo->symbol =  $currency->description" }} ⍑
										</div>
									@endif
								@endforeach
								

							<div class="col-sm-3 text-left">
								<span class="{{$currency->index=='DOWN' ?'DOWN' : 'UP'}}">
									<b>{{ $currency->change }}&nbsp;</b>
									<i class="glyphicon glyphicon-{{$currency->index=='DOWN' ? 'arrow-down' : ($currency->index=='UP' ? 'arrow-up':'ok')}}"></i>
								</span>
								<i>{{ $currency->pubDate }}</i>
							</div>
						</div>
					</div>
				@endforeach
		</div>
	</div>
	<div class="col-sm-4">
		<!--<div class="main-currency">			
			<h2 class="text-center"> Ресурсы </h2>
			
			@foreach($jsonData as $resourceJson)
				@foreach($addData as $resourceAdd)
					@if($resourceJson['fields']['name'] == $resourceAdd['fields']['name'])
						<div class="row-fluid resource-info">
								<div class="col-xs-3 col-sm-2 col-sm-offset-3">
									<img src="/images/icon/{{ $resourceJson['fields']['name'].'.PNG' }}" class="currency-icon">
								</div>

								<div class="col-xs-9 col-sm-3">
									<div class="row">
										<div class="col-xs-12 text-left">
											{{ $resourceJson['fields']['name'] }} {{-- name from json --}}
										</div>
									</div>

									<div class="row">
										<div class="col-xs-6 text-left">
											{{ $resourceAdd['fields']['rusname'] }} {{-- rusname resource --}}
										</div>
										<div class="col-xs-6 resource-info-price text-right">
											{{ $resourceJson['fields']['price'] }}$
										</div>
									</div>

									<div class="row ">
										<div class="col-xs-12 text-right">
											<span class="resource-info-{{ $resourceJson['fields']['Change'] > 0 ? 'up':'down' }}">{{ $resourceJson['fields']['Change'] }}$</span>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-4 resource-info-description text-left">
											{{ date('d.m.Y', strtotime( $resourceJson['fields']['utctime'] )) }}
										</div>
										<div class="col-xs-8  resource-info-description text-right">
											{{ $resourceAdd['fields']['description'] }}
										</div>
									</div>
								</div>

						</div>
					@endif
				@endforeach
			@endforeach
			
		</div>-->
	</div>
</div>

@push('css')
	<link rel="stylesheet" href="{{ asset('css/pages/default.css') }}"> 
@endpush

@endsection


{{-- disable news KASE
<div class="hidden-xs">
	<div class="row-fluid">
		<div class="col-sm-8 col-sm-offset-2 ">


			<table class = "table">

				<thead>
					<tr>
						<th><h2>Новости KASE</h2></th>
					</tr>
				</thead>

				<tbody>
					@foreach($newsKase as $item)
					@if ($loop->iteration == 11)
					@break
					@endif
					<tr>
						<td>
							<details class="news-kase-title">
								<summary>{{ $item[0] }}...Подробнее...</summary>
								<pre>{!! $item[3] !!}</pre>
							</details>

						</td>
					</tr>
					@endforeach
				</tbody>

			</table>

		</div>
	</div>
</div>
--}}
