@extends('default.layouts.template')

@section('title', 'Курсы валют Казахстана')

@section('content')
<div class="row-fluid">
	@foreach($viewdata as $currencyBase)
	@if(in_array($currencyBase->title, ['USD','RUB','EUR']))
	@foreach($currencyData as $oneCurrencyInfo)
	@if($currencyBase->title == $oneCurrencyInfo->title)
	<div class="col-xs-12 col-sm-4"> {{-- разделить на 3 части --}}
		<div class="main-currency">
			<div class="row for-middle"> {{-- разделим иконку флага валюты и информацию о курсе --}}
				<div class="col-xs-5 col-for-middle text-center">
					<img src="/images/icon/{{ $currencyBase->title . '.PNG' }}">
				</div>
				<div class="col-xs-7 text-center">
					<p class="main-currency-title">{{ $currencyBase->title }} 1 {{ $oneCurrencyInfo->symbol }} =</p>
					<p class="main-currency-description">{{ $currencyBase->description}} ⍑</p>
					<p class="main-currency-change {{$currencyBase->index=='DOWN' ?'DOWN' : 'UP'}}">
					 <b>{{ $currencyBase->change}} 
					 <i class="glyphicon glyphicon-{{$currencyBase->index=='DOWN' ? 'arrow-down' : ($currencyBase->index=='UP' ? 'arrow-up':'ok')}}"></i> </b></p>
					<p class="main-currency-pubDate"><i>{{ $currencyBase->pubDate }}</i></p>
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
			@if(in_array($currency->title, ['USD','RUB','EUR', 'XDR']))
				@continue
			@endif
			<div class="table-row-currency-all">
				<div class="row">
					<div class="col-sm-2 text-left">
						{{ $currency->title }}
						<img src="/images/icon/{{ $currency->title.'.PNG' }}" class="currency-icon">
					</div>

					@foreach($currencyData as $oneCurrencyInfo)
					@if($currency->title == $oneCurrencyInfo->title)
					<div class="col-sm-3 text-center">
						<h4>{{ $oneCurrencyInfo->rusname}}</h4>
					</div>

					<div class="col-sm-3 text-left">
						<h3>{{ "1 $oneCurrencyInfo->symbol =  $currency->description" }} ⍑</h3>
					</div>
					@endif
					@endforeach

					<div class="col-sm-2 text-left">
						<span class="{{$currency->index=='DOWN' ?'DOWN' : 'UP'}}">
							<h3><b>{{ $currency->change }}&nbsp;</b>
							<i class="glyphicon glyphicon-{{$currency->index=='DOWN' ? 'arrow-down' : ($currency->index=='UP' ? 'arrow-up':'ok')}}"></i></h3>
						</span>						
					</div>
					<div class="col-sm-2">
						<h5><i>{{ $currency->pubDate }}</i></h5>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="col-sm-4">
		<div class="main-currency">
			<h2 class="text-center"> Ресурсы </h2>

			@foreach($jsonData as $resourceJson)
			@foreach($addData as $resourceAdd)
			@if($resourceJson['fields']['name'] == $resourceAdd['fields']['name'])
			<div class="row table-row-currency-all">
				<div class="col-xs-2">
					<img src="/images/icon/{{ $resourceJson['fields']['name'].'.PNG' }}" class="currency-icon">
				</div>

				<div class="col-xs-10">
					<div class="row">
						<div class="col-xs-6 text-center">
							<h3>{{ $resourceAdd['fields']['rusname'] }}</h3> {{-- rusname resource --}}
						</div>

						<div class="col-xs-6 text-right">
							<h4>{{ $resourceJson['fields']['price'] }}$</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 text-right">
						<span class="resource-info-{{ $resourceJson['fields']['Change'] < 0 ? 'down':'up' }}">
						<b>{{ $resourceJson['fields']['Change'] }}$</b></span>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4 text-left">
							<i>{{ date('d.m.Y', strtotime( $resourceJson['fields']['utctime'] )) }}</i>
						</div>
						<div class="col-xs-8 text-right">
							<i>{{ $resourceAdd['fields']['description'] }}</i>
						</div>
					</div>
				</div>
			</div>
			@endif
			@endforeach
			@endforeach			
		</div>
			

		</div>
	</div>

@push('css')
	<link rel="stylesheet" href="{{ asset('css/pages/default.css') }}"> 
@endpush

@push('scripts') 
<script src="{{ asset('js/middle.js') }}"></script> {{-- скрипт выравнивания изображения валюты по центру --}}
@endpush

@endsection