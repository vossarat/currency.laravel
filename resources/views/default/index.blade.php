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

</div>

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

@endsection