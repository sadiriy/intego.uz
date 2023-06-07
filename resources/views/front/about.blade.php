@extends('layouts.layout')
@section('title')
    {{ __('О нас') }}
@stop
@section('seo')
    <meta name="description" content=">{{ $about->first()->seo }}">
@endsection
@section('style-link')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages.css') }}" />
@stop

@section('content')
<div class="page-container">
    {!! $about->first()->{'text_'.app()->getLocale()} !!}

    @if($about->first()->{'btn_url_'.app()->getLocale()} != null && $about->first()->{'btn_text_'.app()->getLocale()} != null)
    <div class="about-bottom">
        <a target="_blank" href="{{ $about->first()->{'btn_url_'.app()->getLocale()} }}" class="btn btn-primary btn-about-page">{{ $about->first()->{'btn_text_'.app()->getLocale()} }}</a>
    </div>
    @endif
</div>

@endsection
