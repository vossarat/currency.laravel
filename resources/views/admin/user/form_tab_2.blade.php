<div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
	<label for="fullname" class="col-md-4 control-label">Полное наименование</label>

	<div class="col-md-6">
		<input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}"  >

		@if ($errors->has('fullname'))
		<span class="help-block">
			<strong>
				{{ $errors->first('fullname') }}
			</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}"> {{-- citys field --}}
	<label for="city" class="col-md-4 control-label">Город</label>

	<div class="col-md-6">
		<select class="form-control" name="city" >

			{{-- @if(isset($viewdata))

			@foreach($viewdata->citys as $city) 
				@if($city == $viewdata->city)
					<option selected>{{ $viewdata->city }}</option>
				@else
					<option>{{ $city }}</option>
				@endif
			@endforeach

			@else --}}
				
			@foreach($cities as $city)
				<option>{{ $city->name }}</option>
			@endforeach

			{{--  @endif --}}

		</select>
		@if ($errors->has('city'))
		<span class="help-block">
			<strong>
				{{ $errors->first('city') }}
			</strong>
		</span>
		@endif
	</div>
</div> {{-- end citys field --}}

<div class="form-group{{ $errors->has('geolocation') ? ' has-error' : '' }}">
	<label for="geolocation" class="col-md-4 control-label">Геолокация</label>

	<div class="col-md-6">
		<input id="geolocation" type="text" class="form-control" name="geolocation" value="{{ old('geolocation') }}"  >

		@if ($errors->has('geolocation'))
		<span class="help-block">
			<strong>
				{{ $errors->first('geolocation') }}
			</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
	<label for="image" class="col-md-4 control-label">Эмблема</label>

	<div class="col-md-6">
		<input id="image" type="text" class="form-control" name="image" value="{{ old('image') }}"  >

		@if ($errors->has('image'))
		<span class="help-block">
			<strong>
				{{ $errors->first('image') }}
			</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
	<label for="phone" class="col-md-4 control-label">Телефон</label>

	<div class="col-md-6">
		<input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}"  >

		@if ($errors->has('phone'))
		<span class="help-block">
			<strong>
				{{ $errors->first('phone') }}
			</strong>
		</span>
		@endif
	</div>
</div>