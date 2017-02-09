@extends('admin.layouts.template')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"> {{-- content --}}
	<h1 class="page-header">Меню</h1>

	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading"> {{-- заголовок окна --}}
				Edit Пункты меню
				<a href="{{ route('menus.index') }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a> {{-- х закрыть --}}
			</div>

			<div class="panel-body">
				<form class="form-horizontal" role="form" method="POST" action="{{ route('menus.store') }}">
					{{ csrf_field() }}

					@include('admin.menu.form')
					
				</form>
			</div>
		</div>
	</div>

</div> {{-- end content --}}
@endsection