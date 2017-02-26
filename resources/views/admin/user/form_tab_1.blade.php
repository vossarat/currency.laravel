<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name" class="col-md-4 control-label">Имя пользователя</label>

	<div class="col-md-6">
		<input id="name" type="text" class="form-control" name="name" value="{{ $view_user->name or old('name') }}" required >

		@if ($errors->has('name'))
		<span class="help-block">
			<strong>
				{{ $errors->first('name') }}
			</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
	<label for="login" class="col-md-4 control-label">Логин</label>

	<div class="col-md-6">
		<input id="login" type="text" class="form-control" name="login" value="{{ $view_user->login or old('login') }}" >

		@if ($errors->has('login'))
		<span class="help-block">
			<strong>
				{{ $errors->first('login') }}
			</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	<label for="email" class="col-md-4 control-label">E-Mail</label>

	<div class="col-md-6">
		<input id="email" type="email" class="form-control" name="email" value="{{ $view_user->email or old('email') }}" >

		@if ($errors->has('email'))
		<span class="help-block">
			<strong>
				{{ $errors->first('email') }}
			</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	<label for="password" class="col-md-4 control-label">Пароль</label>

	<div class="col-md-6">
		<input id="password" type="password" class="form-control" name="password" >

		@if ($errors->has('password'))
		<span class="help-block">
			<strong>
				{{ $errors->first('password') }}
			</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group">
	<label for="password-confirm" class="col-md-4 control-label">Повторите пароль</label>

	<div class="col-md-6">
		<input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
	</div>
</div>