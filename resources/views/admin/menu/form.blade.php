<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	<label for="title" class="col-md-4 control-label">Заголовок меню</label>

	<div class="col-md-6">
		<input id="title" type="text" class="form-control" name="title" value="{{ $viewdata->title or old('title') }}" required>

		@if ($errors->has('title'))
		<span class="help-block">
			<strong>
				{{ $errors->first('title') }}
			</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		<div class="checkbox">
			<label class="form-check-label">
				@if(isset($viewdata))
				@if($viewdata->is_category)
				<input class="form-check-input" type="checkbox" name="is_category" checked>
				@else
				<input class="form-check-input" type="checkbox" name="is_category">
				@endif
				@else
				<input class="form-check-input" type="checkbox" name="is_category">
				@endif
					Признак категории
			</label>
		</div>
	</div>
</div>


<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
	<label for="url" class="col-md-4 control-label">Адрес</label>

	<div class="col-md-6">
		<input id="url" type="text" class="form-control" name="url" value="{{ $viewdata->url or old('url') }}">
		@if ($errors->has('url'))
		<span class="help-block">
			<strong>
				{{ $errors->first('url') }}
			</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}"> {{-- icon field --}}
	<label for="icon" class="col-md-4 control-label">Иконка</label>

	<div class="col-md-6">
		<input id="icon" type="text" class="form-control" name="icon" value="{{$viewdata->icon or old('icon') }}">
		@if ($errors->has('icon'))
		<span class="help-block">
			<strong>
				{{ $errors->first('icon') }}
			</strong>
		</span>
		@endif
	</div>
</div> {{-- end icon field --}}

<div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}"> {{-- weight field --}}
	<label for="weight" class="col-md-4 control-label">Сортировка</label>

	<div class="col-md-6">
		<input id="weight" type="text" class="form-control" name="weight" value="{{ $viewdata->weight or old('weight')  }}" required>
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
	<label for="position" class="col-md-4 control-label">Позиция</label>

	<div class="col-md-6">
		<select class="form-control" name="position" >

			@foreach($positions as $position)
				@if(isset($viewdata))
					@if($viewdata->position == $position)
						<option selected>{{ $viewdata->position }}</option>
					@else
						<option>{{ $position }}</option>
					@endif						
				@else				
					<option>{{ $position }}</option>
				@endif
			@endforeach
			
			
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

<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}"> {{-- category field --}}
	<label for="category" class="col-md-4 control-label">Категория</label>

	<div class="col-md-6">

		<select class="form-control" name="category" >
		
			@foreach($categories as $category)
				@if(isset($viewdata))
					@if($viewdata->category == $category->id)
						<option selected>{{ $category->title }}</option>
					@else
						<option>{{ $category->title }}</option>
					@endif						
				@else				
					<option>{{ $category->title }}</option>
				@endif
			@endforeach
			
		</select>

		@if ($errors->has('category'))
		<span class="help-block">
			<strong>
				{{ $errors->first('category') }}
			</strong>
		</span>
		@endif
	</div>
</div> {{-- end category field --}}

<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
		<div class="checkbox">
			<label class="form-check-label">
				@if(isset($viewdata))
				@if($viewdata->published)
				<input class="form-check-input" type="checkbox" name="published" checked>
				@else
				<input class="form-check-input" type="checkbox" name="published">
				@endif
				@else
				<input class="form-check-input" type="checkbox" name="published">
				@endif
				Опубликовано
			</label>
		</div>
	</div>
</div>