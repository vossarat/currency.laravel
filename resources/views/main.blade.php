@extends('layouts.default')

@section('title', 'Main Page')

@section('top_menu')
	@parent
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center">
       {{ $content }}  
    </div>
</div>
@endsection

@section('footer')
	@parent
@endsection