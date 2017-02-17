@extends('default.layouts.template')

@section('title', 'Main Page')

@section('top_menu')
@parent
@endsection

@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    {{ $content }}
</div>
@endsection

@section('footer')
@parent
@endsection