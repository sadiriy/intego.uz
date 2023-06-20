@extends('layouts.layout')
@section('title')
    {{ __('Каталог') }}
@stop
@section('style-link')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/categories.css') }}" />
@stop

@section('content')

    <section class="category-main container">
        <h2 class="category-title">{{ $products->first()->category->name_ru }}</h2>
        <div class="row" style="justify-content: center">
            <p class="category-description-text">{{ $products->first()->category->description_ru }}</p>
{{--            <div class="filters-block col-md-12 col-lg-3 col-xl-3">--}}
{{--                <h4>Ширина</h4>--}}
{{--                <form class="filters">--}}
{{--                    <label for="from">{{ __('От') }}:</label>--}}
{{--                    <input class="filter-field" type="text">--}}
{{--                    <label for="to">{{ __('До') }}:</label>--}}
{{--                    <input class="filter-field" type="text">--}}
{{--                    <input class="btn btn-success btn-filter" type="button" value="{{ __('Фильтр') }}">--}}
{{--                </form>--}}
{{--            </div>--}}
            <div class="col-12 products-block">
                <div class="product-grid row">

                    @foreach($products as $product)
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                            <div class="product-container">
                                <div class="product-image">
                                    <a href="{{ route('front.product.index', $product) }}" class="product-image-wrapper">
                                        <img src="{{ asset($product->image) }}" alt="">
                                    </a>
                                </div>
                                <div class="product-name">
                                    <a href="{{ route('front.product.index', $product) }}">
                                        {{ $product->name_ru }}
                                    </a>
                                </div>
                                <div class="product-price">{{ number_format($product->price, 0, '', ' ') }} сум</div>
                                <div class="product-action">
                                    <form class="cartAddForm" action="{{ route('cart.store')}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->name_ru }}">
                                        <input type="hidden" name="count" value="1">
                                        <button type="submit">Добавить в корзину</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </section>

@endsection
