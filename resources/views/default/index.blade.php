@extends('default.layouts.template')

@section('title', 'Курсы валют НБ РК')

@section('content')

		@foreach($viewdata as $currencyBase)
		@if(in_array($currencyBase->title, ['USD','RUB','EUR']))
		@foreach($currencyData as $oneCurrencyInfo)
		@if($currencyBase->title == $oneCurrencyInfo->title)
		<div class="col-xs-12 col-sm-4 content-currency-all"> {{-- разделить на 3 части --}}
			<div class="row"> {{-- строка нужна для создания отступов между блоками информации --}}
				<div class="col-xs-10 col-xs-offset-1"> {{-- отступы между блоками --}}
					<div class="row one-currency-info row-for-middle-currency"> {{-- разделим иконку флага валюты и информацией о курсе --}}
						<div class="col-xs-5 col-middle"> {{-- иконка флага --}}
							<img src="/images/icon/{{ $currencyBase->title . '.PNG' }}" class="img-responsive">
						</div>
						{{-- строки информации о курсе --}}
						<div class="row text-center one-currency-info-title">{{ $currencyBase->title }} 1 {{ $oneCurrencyInfo->symbol }} = </div>
						<div class="row text-center one-currency-info-description">{{ $currencyBase->description}} ⍑</div>
						<div class="row text-center one-currency-info-change {{$currencyBase->index=='DOWN' ?'DOWN' : 'UP'}} ">
							<b>{{ $currencyBase->change}}</b>
							<i class="glyphicon glyphicon-{{$currencyBase->index=='DOWN' ? 'arrow-down' : ($currencyBase->index=='UP' ? 'arrow-up':'ok')}}"></i>
						</div>
						<div class="row text-center one-currency-info-pubDate"><i>&nbsp;&nbsp;&nbsp{{ $currencyBase->pubDate }}</i></div>
					</div>
				</div>
			</div>
		</div>
		@endif
		@endforeach
		@endif
		@endforeach

<div class="row-fluid hidden-xs">
	<div class="col-sm-7 content-currency-all">
	<h1 class="text-center"> Курсы Национального Банка Республики Казахстан </h1>
				@foreach($viewdata as $currency)
				
					<div class="row table-row">
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
				@endforeach
	</div>
</div>

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
