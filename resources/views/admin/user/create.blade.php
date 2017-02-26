@extends('admin.layouts.template')

@section('content')

<h1 class="page-header">Пользователи</h1>

<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">

		<div class="panel-heading">
			Добавить пользователя
			<a href="{{ route('users.index') }}" class="close" data-dismiss="alert" aria-hidden="true">&times;</a> {{-- х закрыть --}}
		</div>

		<div class="panel-body">
			<form class="form-horizontal" role="form" method="POST" action="{{ route('users.store') }}">
				{{ csrf_field() }}
				
				<div class="form-group">

					<ul class="nav nav-tabs">
						<li class="active"><a href="#login" data-toggle="tab">Логин</a></li>
						<li><a href="#profile" data-toggle="tab">Пункт обмена</a></li>
					</ul>

				</div>

				<div class="tab-content">
					<div class="tab-pane active fade in" id="login">
						@include('admin.user.form_tab_1')
					</div>
					<div class="tab-pane fade" id="profile">
						@include('admin.user.form_tab_2')
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">Добавить</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
