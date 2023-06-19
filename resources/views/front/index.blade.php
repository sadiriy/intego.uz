@extends('layouts.layout')
@section('title')
    {{__('Главная')}}
@stop
@section('content')

    {{-- MODAL --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border: none; padding: 20px;">
                <div class="modal-header" style="border: none; padding: 0 1rem 1rem;">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700; font-size: 18pt;">{{ __('Запрос прайс-листа') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <form class="form_style" action="{{ route('priceList') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body" style="text-align: left;">
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">{{ __('Имя') }}</label>
                            <input name="name" id="name" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">{{ __('Номер телефона') }}</label>
                            <input name="phone" id="phone" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">{{ __('Категория') }}</label>
                            <select name="category" id="category" type="text" class="form-control">
                                <option>{{ __('Не выбрано') }}</option>
                                @foreach($main_categories as $category)
                                    <option value="{{$category->id}}">{{ $category->{'name_'.app()->getLocale()} }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="border: none;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Закрыть') }}</button>
                        <button type="submit" class="btn btn-success sub">{{ __('Отправить') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <img src="{{ asset('img/sliders/banner_1300_4k.jpg') }}" alt="banner" class="banner-img">

    <section class="popular-products">
        <div class="container">
            <h2>{{__('Популярные товары') }}</h2>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="popular-product-container">
                        <a href="{{ route('front.product.index', $product) }}">
                            <div class="popular-product-image" style="background-image: url({{ asset($product->image) }})"></div>
                        </a>
                        <a href="{{ route('front.product.index', $product) }}">
                            <span class="popular-product-name">{{ $product->name_ru }}</span>
                        </a>
                        <a href="{{ route('front.category.index', $product->category) }}">
                            <span class="popular-product-category">{{ $product->category->name_ru }}</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

{{--    <div class="category-bottom">--}}
{{--        <a href="/" class="btn btn-primary"--}}
{{--           data-bs-toggle="modal"--}}
{{--           data-bs-target="#exampleModal"--}}
{{--        ><i class="fas fa-list"></i>&nbsp;{{__('Запросить прайс-лист') }}</a>--}}
{{--    </div>--}}

    <section class="popular-categories">
        <div class="container">
            <h2>{{__('Популярные категории') }}</h2>
            <div class="row">
                @foreach($main_categories as $category)
                <div class="col-md-4">
                    <a href="{{ route('front.category.index', $category) }}">
                        <div class="popular-category-container">
                            <p class="popular-category-name">{{ $category->name_ru }}</p>
                            <button class="popular-category-button">Подробнее</button>
                            <img src="{{ asset($category->image) }}" alt="{{ $category->name_ru }}">
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
{{--    <section class="services">--}}
{{--        <div class="container">--}}
{{--            <h2 class="title text-center">{{__('Преимущества работы с нами') }}</h2>--}}
{{--            <div class="row text-center">--}}
{{--                @foreach($privileges as $privilege)--}}
{{--                <div data-aos="fade-up" class="col-md-2 col-sm-12 col-xs-12 service">--}}
{{--                    <img src="/img{{ $privilege->icon }}" class="service-img" alt="FIRST" />--}}
{{--                    <h6 class="title text-center">--}}
{{--                        {{ $privilege->{'text_'.app()->getLocale()} }}--}}
{{--                    </h6>--}}
{{--                </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="forms">--}}

{{--        <div class="row">--}}

{{--            <div class="forms-container col-12 col-xl-5">--}}
{{--                <h2 class="title">--}}
{{--                    {{ __('Получить расчёт стоимости') }}--}}
{{--                </h2>--}}
{{--                <p class="forms-text">--}}
{{--                    {{ __('Оставьте заявку, и мы с вами свяжемся') }}--}}
{{--                </p>--}}
{{--            </div>--}}
{{--            <div class="col-12 col-xl-6 form">--}}
{{--                <form action="{{ route('index.calculation') }}" method="POST" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                    @method('POST')--}}
{{--                    <div class="div-container calculation-form">--}}
{{--                        <div class="form-container">--}}
{{--                            <div class="form-floating form-calc">--}}
{{--                                <input type="text" id="name" name="name" placeholder="{{ __('Ваше имя') }}*" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-floating form-calc">--}}
{{--                                <input type="text" id="message" name="message" placeholder="{{ __('Ваше сообщение') }}" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-container">--}}
{{--                            <div class="form-floating form-calc">--}}
{{--                                <input type="text" id="phone" name="phone" placeholder="{{ __('Номер телефона') }}*" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-calc" style="display: flex; flex-direction: column;">--}}
{{--                                <input type="file" id="file" name="download uploaded_file" style="padding: 0" class="download" />--}}
{{--                                <label for="file">{{ __('Выбрать файл') }}</label>--}}
{{--                                --}}{{--                            <button class="download"> {{ __('Загрузить файл') }}</button>--}}
{{--                                <div class="form-calc">--}}
{{--                                    <button class="send">{{ __('Отправить') }}</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </section>--}}

{{--    @if(! $partners->isEmpty())--}}
{{--    <section class="partners">--}}
{{--        <h2>{{ __('Нам доверяют') }}</h2>--}}
{{--        <div class="partnercarousel">--}}
{{--            @foreach($partners as $partner)--}}
{{--            <div class="partner">--}}
{{--                <img src="{{ asset($partner->url) }}">--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    @endif--}}

    <script>
        var inputs = document.querySelectorAll( '.download' );
        Array.prototype.forEach.call( inputs, function( input )
        {
            var label	 = input.nextElementSibling,
                labelVal = label.innerHTML;

            input.addEventListener( 'change', function( e )
            {
                var fileName = '';
                if( this.files && this.files.length > 1 )
                    fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                else
                    fileName = e.target.value.split( '\\' ).pop();

                if( fileName )
                    label.innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
            });
        });
    </script>

@endsection
@section('slick')
    <script type="text/javascript" src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('slick/slick.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.slickcarousel').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                variableWidth: true
            });
            $('.partnercarousel').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                variableWidth: true
            });
        });
    </script>
@endsection

