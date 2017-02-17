@extends('admin.layouts.template')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"> {{-- content --}}
	<h1 class="page-header">Пользователи</h1>

	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>email</th>
				</tr>
			</thead>
			<tbody>
			 	@foreach($viewdata as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td><a href="users/edit/{{ $user->id }}">#</a></td>					
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div> {{-- end content --}}
@endsection