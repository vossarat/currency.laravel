@extends('default.layouts.template')

@section('title', 'Курсы валют НБ РК')

@section('content')

@mobile
<div class="row-fluid">
    <table class="table">
        <tbody>
            @foreach($viewdata as $currency)
            <tr>
                <div class="row-fluid">

                    <td>
                        <div class="col-xs-3 col-sm-2 col-sm-offset-3 text-right">
                            {{ $currency->title }}
                            <img src="/images/icon/{{ $currency->title.'.PNG' }}" class="currency-icon">
                        </div>

                        <div class="col-xs-5 col-sm-2 text-center">
                            @foreach($currencyData as $oneCurrencyInfo)
                            @if($currency->title == $oneCurrencyInfo->title)
                            <p>{{ "1 $oneCurrencyInfo->symbol =  $currency->description" }} ⍑</p>
                            <p>{{ $oneCurrencyInfo->rusname}}</p>
                            @endif
                            @endforeach
                        </div>

                        <div class="col-xs-4 col-sm-1">
                            <span class="{{$currency->index=='DOWN' ?'DOWN' : 'UP'}}">
                                <b>{{ $currency->change }}&nbsp;</b>
                                <i class="glyphicon glyphicon-{{$currency->index=='DOWN' ? 'arrow-down' : ($currency->index=='UP' ? 'arrow-up':'ok')}}"></i>
                            </span>
                            <i>{{ $currency->pubDate }}</i>
                        </div>
                    </td>
                </div>


            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@elsemobile
<h1 class="text-center hidden"> Курсы Национального Банка Республики Казахстан </h1>
<h2 class="text-center"> Курсы Национального Банка Республики Казахстан </h2>

<table class="table table-striped">
		<tbody>	
			@foreach($viewdata as $currency)
				@foreach($currencyData as $oneCurrencyInfo)
					@if($currency->title == $oneCurrencyInfo->title)			
					
					<tr>
						<td>
										
							<div class="row-fluid row-for-middle">
								
								<div class="col-sm-2 col-middle text-right">
									<img src="/images/icon/{{ $currency->title.'.PNG' }}" class="currency-icon">
								</div>
								
								<div class="col-sm-2 col-middle text-center">
									<h4>{{ $oneCurrencyInfo->rusname }}</h4>
								</div>							
								
								<div class="col-sm-2 col-middle resource-price">
									<h3>{{ "1 $oneCurrencyInfo->symbol =  $currency->description" }} ⍑</h3>
								</div>
								
								<div class="col-sm-2 col-middle">
									<span class="{{$currency->index=='DOWN' ?'DOWN' : 'UP'}}">
										<h4><b>{{ $currency->change }}&nbsp;</b>
											<i class="glyphicon glyphicon-{{$currency->index=='DOWN' ? 'arrow-down' : ($currency->index=='UP' ? 'arrow-up':'ok')}}"></i></h4>
									</span>
								</div>
								
								<div class="col-sm-2 col-middle resource-description text-left">
									<i>{{ date('d.m.Y', strtotime(  $currency->pubDate )) }}</i>
								</div>
								
								
							</div>
						</td>
					</tr>
					
					@endif
				@endforeach
			@endforeach
			</tbody>
		</table>
@endmobile

@push('css')
	<link rel="stylesheet" href="{{ asset('css/pages/currency_all.css') }}"> 
	<link rel="stylesheet" href="{{ asset('css/pages/resource.css') }}"> 
@endpush

@push('scripts') 
<script src="{{ asset('js/middle.js') }}"></script> {{-- скрипт выравнивания изображения валюты по центру --}}
@endpush

@endsection