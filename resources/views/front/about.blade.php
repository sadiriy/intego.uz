@extends('layouts.layout')
@section('title')
    {{ __('О нас') }}
@stop
@section('seo')
    <meta name="description" content="">
@endsection
@section('style-link')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages.css') }}" />
@stop

@section('content')
<div class="page-container container">
    <div class="img-container">
        <img src="{{ asset('img/about-us.jpg') }}" alt="">
    </div>
    <p id="main-content">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        <br><br>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </p>
</div>

@endsection
