@extends('admin.layouts.template')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"> {{-- content --}}
<h1 class="page-header">Меню</h1>

<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			Пункты меню
			
			<a href="{{ route('menus.index') }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" method="POST" action="{{ route('menus.store') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
					<label for="title" class="col-md-4 control-label">
						Заголовок меню
					</label>

					<div class="col-md-6">
						<input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

						@if ($errors->has('title'))
						<span class="help-block">
							<strong>
								{{ $errors->first('title') }}
							</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
					<label for="url" class="col-md-4 control-label">
						Адрес
					</label>

					<div class="col-md-6">
						<input id="url" type="text" class="form-control" name="url" value="{{ old('url') }}" required>
						@if ($errors->has('url'))
						<span class="help-block">
							<strong>
								{{ $errors->first('url') }}
							</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Добавить
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

</div> {{-- end content --}}
@endsection