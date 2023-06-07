@extends('layouts.layout')
@section('title')
    {{ __("Партнерам") }}
@stop
@section('seo')
    <meta name="description" content=">{{ $partners->first()->seo }}">
@endsection
@section('style-link')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages.css') }}" />
@stop

@section('content')
<div class="page-container">
    <div class="tabSwitcher">
        <button class="btn-primary" onclick="openTab('partners')">{{ __('Партнеры') }}</button>
        <button class="btn-primary" onclick="openTab('reviews')">{{ __('Письма благодарности') }}</button>
    </div>
    <div id="partners" class="tab">
        {!! $partners->first()->{'text_'.app()->getLocale()} !!}

        @if($partner_logos != null)
            <section class="partners" style="flex-direction: column;">
                <h3>{{ __('Наши партнеры') }}</h3>
                <div class="partners-logo-block">
                    @foreach($partner_logos as $logo)
                        <div class="partner-logo">
                            <img src="{{ $logo->url }}" alt="{{ $logo->name }}">
                            <label>{{ $logo->name }}</label>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
    <div id="reviews" class="tab" style="display: none">

        @if($overviews != null)
            <section class="partners" style="flex-direction: column;">
                <h3>{{ __('Отзывы о нас') }}</h3>
                <div class="partners-logo-block">
                    @foreach($overviews as $overview)
                        <div class="partner-logo">
                            <img data-enlargable src="{{ $overview->url }}" alt="{{ $overview->name }}">
                            <label>{{ $overview->name }}</label>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
<script>
    function openTab(tabName) {
        var i;
        var x = document.getElementsByClassName("tab");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(tabName).style.display = "block";
    }
    $('img[data-enlargable]').addClass('img-enlargable').click(function(){
        var src = $(this).attr('src');
        $('<div>').css({
            background: 'RGBA(0,0,0,.5) url('+src+') no-repeat center',
            backgroundSize: 'contain',
            width:'100%', height:'100%',
            position:'fixed',
            zIndex:'10000',
            top:'0', left:'0',
            cursor: 'zoom-out'
        }).click(function(){
            $(this).remove();
        }).appendTo('body');
    });
</script>

@endsection

