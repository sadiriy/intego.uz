@extends('layouts.layout')
@section('title')
    {{__('Главная')}}
@stop
@section('content')

    <img src="{{ asset('img/sliders/banner_1300_4k.jpg') }}" alt="banner" class="banner-img">

    <section class="popular-products">
        <div class="container">
            <h2>{{__('Популярные товары') }}</h2>
            <div class="row">
{{--                @foreach($pages as $page)--}}
{{--                    <a href="{{ route('front.page', $page->url) }}">{{ $page->title_ru }}</a>--}}
{{--                @endforeach--}}
                @foreach($products as $product)
                <div class="col-md-4 col-sm-6 col-xs-6">
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

    <section class="popular-categories">
        <div class="container">
            <h2>{{__('Популярные категории') }}</h2>
            <div class="row">
                @foreach($main_categories as $category)
                <div class="col-md-4 col-sm-6 col-xs-6">
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

