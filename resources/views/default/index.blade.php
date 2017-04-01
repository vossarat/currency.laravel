@extends('default.layouts.template')

@section('title', 'Курсы валют НБ РК')

@section('content')

<div class="row-fluid"> {{-- строка информации по основным валютам --}}

	@foreach($viewdata as $currencyBase)
		@if(in_array($currencyBase->title, ['USD','RUB','EUR']))
			@foreach($currencyData as $oneCurrencyInfo)
				@if($currencyBase->title == $oneCurrencyInfo->title)
					<div class="col-xs-12 col-sm-4"> {{-- разделить на 3 части --}}
						<div class="row"> {{-- строка нужна для создания отступов между блоками информации --}}
							<div class="col-xs-10 col-xs-offset-1"> {{-- отступы между блоками --}}
								<div class="row one-currency-info row-for-middle"> {{-- разделим иконку флага валюты и информацией о курсе --}}
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

</div>


<div class="row-fluid">
	<table class="table">
		<tbody>
			@foreach($viewdata as $currency)
			<tr>
				<div class="row-fluid">
					<td>
							<div class="col-xs-3 col-sm-2 col-sm-offset-2 text-right">
								{{ $currency->title }}
								<img src="/images/icon/{{ $currency->title.'.PNG' }}" class="currency-icon">
							</div>
							
							<div class="col-xs-6 col-sm-2 text-left">
								@foreach($currencyData as $oneCurrencyInfo)
									@if($currency->title == $oneCurrencyInfo->title)									
										<p>{{ "1 $oneCurrencyInfo->symbol =  $currency->description" }} ⍑</p>
										<p>{{ $oneCurrencyInfo->rusname}}</p>
									@endif					
								@endforeach
							</div>
							
							<div class="col-xs-3 col-sm-3">
								<p class="{{$currency->index=='DOWN' ?'DOWN' : 'UP'}}">
									<b>{{ $currency->change }}&nbsp;</b>
										<i class="glyphicon glyphicon-{{$currency->index=='DOWN' ? 'arrow-down' : ($currency->index=='UP' ? 'arrow-up':'ok')}}"></i>
								</p>
								<i>{{ $currency->pubDate }}</i>
							</div>					
					</td>	
				</div>
				

			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection