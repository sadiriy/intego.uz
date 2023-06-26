@extends('layouts.layout')
@section('title')
    {{ $page->title_ru }}
@stop
@section('seo')
    <meta name="description" content="">
@endsection
@section('style-link')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages.css') }}" />
@stop
@section('content')
    <div class="container {{ $page->url }}">
        {!! $content !!}
    </div>
@stop