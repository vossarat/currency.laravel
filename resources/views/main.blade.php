@extends('layouts.default')

@section('title', $titlePage = 'Заголовок' )

@section('top_menu')
	@include('layouts.top_menu')
@endsection

@section('myfield', $content = 'Информация')

@section('footer')
	Подвал
@endsection