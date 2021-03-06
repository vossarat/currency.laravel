@extends('default.layouts.template')

@section('title', 'Ресурсы')

@section('content')

	@mobile		
		<table class="table">
		<tbody>
			@foreach($jsonData as $resourceJson)
				@foreach($addData as $resourceAdd)
					@if($resourceJson['fields']['name'] == $resourceAdd['fields']['name'])
					<tr>
						<div class="row-fluid resource-info">
							<td>
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
										<div class="col-xs-8 resource-info-description text-right">
											{{ $resourceAdd['fields']['description'] }}
										</div>
									</div>
								</div>

							</td>
						</div>


					</tr>
					@endif
				@endforeach
			@endforeach
		</tbody>
	</table>
	
	@elsemobile
	<table class="table table-striped">
		<tbody>	
			@foreach($jsonData as $resourceJson)
				@foreach($addData as $resourceAdd)
					@if($resourceJson['fields']['name'] == $resourceAdd['fields']['name'])			
					
					<tr>
						<td>
										
							<div class="row-fluid row-for-middle">
															
								<div class="col-sm-2 col-middle text-right">
									<img src="/images/icon/{{ $resourceJson['fields']['name'].'.PNG' }}" class="currency-icon">
								</div>
								
								<div class="col-sm-2 col-middle">
									<h4>{{ $resourceAdd['fields']['rusname'] }}</h4>
								</div>									
								
								<div class="col-sm-1 col-middle resource-price">
									{{ $resourceJson['fields']['price'] }}$
								</div>
								
								<div class="col-sm-1 col-middle resource-change-{{$resourceJson['fields']['Change']>0?'up':'down'}}">
									{{ $resourceJson['fields']['Change'] }}$
								</div>
								
								<div class="col-sm-3 col-middle resource-description text-left">
									<i>{{ date('d.m.Y', strtotime( $resourceJson['fields']['utctime'] )) }},
									{{ $resourceAdd['fields']['description'] }}</i>
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
	<link rel="stylesheet" href="{{ asset('css/pages/resource.css') }}"> 
@endpush

@endsection