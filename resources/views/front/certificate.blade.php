@extends('layouts.layout')
@section('title')
    {{ __('Сертификат') }}
@stop
@section('style-link')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages.css') }}" />
@stop

@section('content')
<div class="page-container">
    <div class="certificate-info">
        <div class="certificate-image">
            <img src="{{ asset($certificate->path) }}" alt="">
        </div>
        <div class="certificate-description">
            <p>
                {{ $certificate->{'text_'.app()->getLocale()} }}
            </p>
            <div class="description-images">
                @foreach($certificateImages as $certificateImage)
                    <img data-enlargable src="{{ asset($certificateImage->path) }}" alt="">
                @endforeach
            </div>
        </div>
    </div>
{{--    TO DELETE--}}
    <div class="certificate-images">

    </div>
</div>

@endsection
@section('slick')

    <script type="text/javascript" src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('slick/slick.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.certificates-screen').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.certificates-nav'
            });
            $('.certificates-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.certificates-screen',
                dots: true,
                centerMode: true,
                focusOnSelect: true
            });
        });
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
