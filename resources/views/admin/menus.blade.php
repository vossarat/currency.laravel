@extends('admin.layouts.template')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"> {{-- content --}}
	<h1 class="page-header">Меню</h1>

	<form action="{{ route('menus.create') }}">
		<div class="form-group">
			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
		</div>
	</form>

	@if(Session::has('message'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{Session::get('message')}}
	</div>
	@endif

	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Заголовок меню</th>
					<th>Адрес</th>
					<th>Действие</th>
				</tr>
			</thead>
			<tbody>
				@foreach($viewdata as $menu)
				<tr>
					<td>{{ $menu->id }}</td>
					<td>{{ $menu->title }}</td>
					<td>{{ $menu->url }}</td>
					<td>
						<form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button type="submit" class="close"><i class="glyphicon glyphicon-remove"></i></button>
						</form>
					</td>
					<td>
						<form action="{{ route('menus.edit', $menu->id) }}">
							<button type="submit" class="close"><i class="glyphicon glyphicon-edit"></i></button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div> {{-- end content --}}
@endsection