@extends('layouts.layout')
@section('title')
    {{ __('Сертификаты') }}
@stop
@section('seo')
    <meta name="description" content=">{{ $certificates->first()->seo }}">
@endsection
@section('style-link')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages.css') }}" />
@stop

@section('content')
<div class="page-container">

        <section class="certificates" style="flex-direction: column;">
            <h3>{{ __('Сертификаты') }}</h3>
            <div class="certificates-block">
                @foreach($certificates as $certificate)
                    <div class="certificate">
                        <a href="{{ route('single.certificate', $certificate) }}">
                            <img src="{{ $certificate->path }}" alt="{{ $certificate->name }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
{{--    <div class="certificates">--}}
{{--        @if($certificates != null)--}}
{{--        <div class="certificates-screen">--}}
{{--            @foreach($certificates as $certificate)--}}
{{--            <div><img src="{{ asset($certificate->path) }}" alt=""></div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

{{--        <div class="certificates-nav">--}}
{{--            @foreach($certificates as $certificate)--}}
{{--                <div><img src="{{ asset($certificate->path) }}" alt=""></div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        @endif--}}


{{--        {!! $certificates->first()->{'text_'.app()->getLocale()} !!}--}}

{{--        @if($certificates->first()->{'btn_url_'.app()->getLocale()} != null && $certificates->first()->{'btn_text_'.app()->getLocale()} != null)--}}
{{--            <div class="about-bottom">--}}
{{--                <a target="_blank" href="{{ $certificates->first()->{'btn_url_'.app()->getLocale()} }}" class="btn btn-primary btn-about-page">{{ $certificates->first()->{'btn_text_'.app()->getLocale()} }}</a>--}}
{{--            </div>--}}
{{--        @endif--}}
    </div>
</div>

@endsection
@section('slick')

    {{--    <script src="https://code.jquery.com/jquery-3.6.0.js"--}}
    {{--            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>--}}
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
    </script>
@endsection
