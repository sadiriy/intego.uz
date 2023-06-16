@extends('layouts.layout')
@section('title')
    {{ __('Каталог') }}
@stop
@section('style-link')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/categories.css') }}" />
@stop

@section('content')

    <section class="category-main container">
        <h4 class="breadcrumb">{{ __('Каталог') }}</h4>
        <h2 class="category-title">{{ $product->name_ru }}</h2>
        <div class="row" style="justify-content: center">
            <p class="category-description-text">{{ $product->description_ru }}</p>
            <div class="col-12 products-block">
                <div class="product-grid row">

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="product-container">
                                <div class="product-image">
                                    <a href="#" class="product-image-wrapper">
                                        <img src="{{ asset($product->image) }}" alt="">
                                    </a>
                                </div>
                                <div class="product-name">
                                    <a href="">
                                        {{ $product->name_ru }}
                                    </a>
                                </div>
                                <div class="product-price">{{ $product->price }} сум</div>
                                <div class="product-action">
                                    <button>Добавить в корзину</button>
                                </div>
                                @foreach($product->parameters as $parameters)
                                    <strong>{{ $parameters->attributes->name_ru }}</strong>: <span>{{ $parameters->value }}</span><br>
                                @endforeach
                            </div>
                        </div>

                </div>

            </div>
        </div>
        <div class="recommended-products">
            @foreach($recommended_products as $recommended_product)
                {{ $recommended_product->name_ru }}
            @endforeach
        </div>
    </section>

@endsection
