@extends('layouts.layout')
@section('title')
    {{ __("Контакты") }}
@stop
@section('seo')
    <meta name="description" content=">{{ $contacts->first()->seo }}">
@endsection
@section('style-link')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages.css') }}" />
@stop

@section('content')
    <div class="page-container contacts" style="display: flex; flex-wrap: wrap;">
        <section class="company-info">
            @foreach($contacts as $contact)
            <div class="contact-card">
                <div class="contact-text">
                    <div class="position">{{ $contact->{'position_'.app()->getLocale()} }}</div>
                    <div class="name">{{ $contact->{'name_'.app()->getLocale()} }}</div>
                    <div class="phone-number">{{ $contact->phone }}</div>
                </div>
                <div class="contact-image">
                    <img src="{{ asset($contact->image) }}" alt="">
                </div>
            </div>
            @endforeach
        </section>
        <section class="map">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ac8086eb3df35c18564ce335e066f14d97abc64d60f1fe2b7816228a291aa1a18&amp;width=100%&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
        </section>
        <section class="requisites">
            <h3>{{ __('Наши адреса') }}</h3>

            <p id="requisites-text" onclick="copyText()">
                {!!  $requisites->{'text_'.app()->getLocale()}  !!}
            </p>

        </section>
    {{--    {!! $contacts->first()->{'text_'.app()->getLocale()} !!}--}}
    </div>
    <script>
        function copyText(){
            var text = document.getElementById('requisites-text');
            navigator.clipboard.writeText(text.textContent).then(function(x) {
                alert("Copied");
            });
        }
    </script>
    {{--<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ac8086eb3df35c18564ce335e066f14d97abc64d60f1fe2b7816228a291aa1a18&amp;width=100%&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>--}}
@endsection
