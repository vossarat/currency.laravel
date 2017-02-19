@extends('admin.layouts.template')

@section('content')
<h1 class="page-header">Пользователи</h1>

<form action="{{ route('users.create') }}">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            <i class="glyphicon glyphicon-plus"></i></button>
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
                <th>Имя пользователя</th>
                <th>Логин</th>
                <th>e-mail</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach($viewdata as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->login }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <button type="submit" class="btn-action"><i class="glyphicon glyphicon-remove"></i></button>
                    </form>
                </td>
                <td>
                <form action="{{ route('users.edit', $user->id) }}">
                	<button type="submit" class="btn-action"><i class="glyphicon glyphicon-edit"></i></button>
                </form>  
                </td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection