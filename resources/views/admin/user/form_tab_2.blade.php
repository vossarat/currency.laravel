<div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
	<label for="fullname" class="col-md-4 control-label">Полное наименование</label>

	<div class="col-md-6">
		<input id="fullname" type="text" class="form-control" name="fullname" value="{{ $view_office->fullname or old('fullname') }}"  >

		@if ($errors->has('fullname'))
		<span class="help-block">
			<strong>
				{{ $errors->first('fullname') }}
			</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}"> {{-- city field --}}
	<label for="city" class="col-md-4 control-label">Город</label>

	<div class="col-md-6">
		<select class="form-control" name="city" >

			@foreach($cities as $city)

			@if(isset($view_office))
			@if($city->id == $view_office->city_id)
			<option selected>{{ $city->name }}</option>
			@else
			<option>{{ $city->name }}</option>
			@endif
			@else
			<option>{{ $city->name }}</option>
			@endif

			@endforeach

		</select>
		@if ($errors->has('city'))
		<span class="help-block">
			<strong>
				{{ $errors->first('city') }}
			</strong>
		</span>
		@endif
	</div>
</div> {{-- end city field --}}

<div class="form-group{{ $errors->has('geolocation') ? ' has-error' : '' }}">
	<label for="geolocation" class="col-md-4 control-label">Геолокация</label>

	<div class="col-md-6">
		<input id="geolocation" type="text" class="form-control" name="geolocation" value="{{ $view_office->geolocation or old('geolocation') }}"  >

		@if ($errors->has('geolocation'))
		<span class="help-block">
			<strong>
				{{ $errors->first('geolocation') }}
			</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group">
	<label for="image" class="col-md-4 control-label">Логотип</label>
	<input type="hidden" id="image" class="form-control" name="image" value="{{ $view_office->image or old('image') }}"  >
	<div class="col-md-6 logotip-show">
		<img src="/storage/logotips/{{ $view_office->image or old('image') }}">
		<button class="btn btn-default" type="button" data-toggle="modal" data-target="#logo_browse">...</button>
	</div>
</div>

<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
	<label for="phone" class="col-md-4 control-label">Телефон</label>

	<div class="col-md-6">
		<input id="phone" type="text" class="form-control" name="phone" value="{{ $view_office->phone or old('phone') }}"  >

		@if ($errors->has('phone'))
		<span class="help-block">
			<strong>
				{{ $errors->first('phone') }}
			</strong>
		</span>
		@endif
	</div>
</div>

@include('admin.user.logo_browse')