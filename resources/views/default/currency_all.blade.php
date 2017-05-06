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
						<h4>{{ $oneCurrencyInfo->rusname}}</h4>
					</div>

					<div class="col-sm-3 text-left">
						<h3>{{ "1 $oneCurrencyInfo->symbol =  $currency->description" }} ⍑</h3>
					</div>
					@endif
					@endforeach


					<div class="col-sm-3 text-left">
						<span class="{{$currency->index=='DOWN' ?'DOWN' : 'UP'}}">
							<h3><b>{{ $currency->change }}&nbsp;</b>
							<i class="glyphicon glyphicon-{{$currency->index=='DOWN' ? 'arrow-down' : ($currency->index=='UP' ? 'arrow-up':'ok')}}"></i></h3>
						</span>
						<i>{{ $currency->pubDate }}</i>
					</div>
				</div>
			</div>
			@endforeach
		</div>
@endmobile
@endsection