@extends('admin.layouts.template')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"> {{-- content --}}
	<h1 class="page-header">Меню</h1>

	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading"> {{-- заголовок окна --}}
				Пункты меню
				<a href="{{ route('menus.index') }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a> {{-- х закрыть --}}
			</div>

			<div class="panel-body">
				<form class="form-horizontal" role="form" method="POST" action="{{ route('menus.store') }}">
					{{ csrf_field() }}

					<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
						<label for="title" class="col-md-4 control-label">
							Заголовок меню
						</label>

						<div class="col-md-6">
							<input id="title" type="text" class="form-control" name="title" value="{{ isset($viewdata) ? $viewdata->title : old('title') }}" required autofocus>

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
							<input id="url" type="text" class="form-control" name="url" value="{{ old('url')?old('url'):'testlink' }}">
							@if ($errors->has('url'))
							<span class="help-block">
								<strong>
									{{ $errors->first('url') }}
								</strong>
							</span>
							@endif
						</div>
					</div>

					<div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
						<label for="icon" class="col-md-4 control-label">
							icon
						</label>

						<div class="col-md-6">
							<input id="icon" type="text" class="form-control" name="icon" value="{{ old('icon')?old('icon'):'imgicon' }}">
							@if ($errors->has('icon'))
							<span class="help-block">
								<strong>
									{{ $errors->first('icon') }}
								</strong>
							</span>
							@endif
						</div>
					</div>

					<div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}"> {{-- weight field --}}
						<label for="weight" class="col-md-4 control-label">
							weight
						</label>

						<div class="col-md-6">
							<input id="weight" type="text" class="form-control" name="weight" value="{{ old('weight')?old('weight'):1 }}" required>
							@if ($errors->has('weight'))
							<span class="help-block">
								<strong>
									{{ $errors->first('weight') }}
								</strong>
							</span>
							@endif
						</div>
					</div> {{-- end weight field --}}

					<div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}"> {{-- position field --}}
						<label for="position" class="col-md-4 control-label">
							position
						</label>

						<div class="col-md-6">
							<select class="form-control" name="position" >
								<option>topmenu</option>
								<option>sidebar</option>
								<option>adminmenu</option>
							</select>
							@if ($errors->has('position'))
							<span class="help-block">
								<strong>
									{{ $errors->first('position') }}
								</strong>
							</span>
							@endif
						</div>
					</div> {{-- end position field --}}

					<div class="form-group{{ $errors->has('parent') ? ' has-error' : '' }}"> {{-- parent field --}}
						<label for="parent" class="col-md-4 control-label">
							parent
						</label>

						<div class="col-md-6">

							<select class="form-control" name="parent" >
								{{-- @foreach($parents as $parent)
								<option>{{ $parent->title }}</option>
								@endforeach--}}
							</select>

							@if ($errors->has('parent'))
							<span class="help-block">
								<strong>
									{{ $errors->first('parent') }}
								</strong>
							</span>
							@endif
						</div>
					</div> {{-- end parent field --}}

					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<div class="checkbox">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" name="published" value="">
									Опубликовать
								</label>
							</div>
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
	</div>

</div> {{-- end content --}}
@endsection