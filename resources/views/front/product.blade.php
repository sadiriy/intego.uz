@extends('layouts.layout')
@section('title')
    {{ __('Каталог') }}
@stop
@section('style-link')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/categories.css') }}" />
@stop

@section('content')

    <section class="category-main container">
        <div class="row" style="justify-content: center">
            <div class="col-12 products-block">
                <div class="product-main">
                    <div class="product-image me-lg-5">
                        <img src="{{ asset($product->image) }}" alt="">
                    </div>
                    <div class="product-info ms-lg-5 ms-md-2 mt-2">
                        <div class="product-info-item"><span id="name">{{ $product->name_ru }}</span></div>
                        <div class="product-info-item"><span id="category"><a href="{{ route('front.category.index', $product->category) }}">{{ $product->category->name_ru }}</a></span></div>
                        <div class="product-info-item mt-3">
                            <h6>Рекомендованная розничная цена*</h6>
                            <span id="price">{{ number_format($product->price, 0, '', ' ') }} сум</span>
                        </div>
                        <div class="product-info-item">
                            <form class="cartAddForm" action="{{ route('cart.store')}}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->name_ru }}">
                                <input type="number" name="count" value="1" min="1" max="10" style="text-align: center">
                                <button type="submit">Добавить в корзину</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="attributes">

                    <div class="tabSwitcher">
                        <button class="btn-tab-switcher active" onclick="openTab('characteristics')">{{ __('Характеристики') }}</button>
                        <button class="btn-tab-switcher" onclick="openTab('description')">{{ __('Описание') }}</button>
                    </div>
                    <div id="characteristics" class="tab">
                        @if($product->parameters->count())
                        <ul class="properties">
                            @foreach($product->parameters as $parameter)
                                <li>
                                    <span class="name"><span>{{ $parameter->attributes->name_ru }}</span></span>
                                    <span class="value">{{ $parameter->value . ' ' . $parameter->attributes->unit_ru }}</span>
                                </li>
                            @endforeach
                        </ul>

                        @else
                            Характеристики отсутствуют
                        @endif
                    </div>
                    <div id="description" class="tab" style="display: none; margin-bottom: 30px">
                        {{ $product->description_ru ?? 'Описание товара отсутствует.' }}
                        {!! $product_description !!}
                    </div>
                </div>

            </div>
        </div>
        @if($recommended_products->count())
        <div class="recommended-products mt-5 mb-5 row">
            <h2>Рекомендуем посмотреть</h2>
            @foreach($recommended_products as $product)
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
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
                        <h6>Рекомендованная розничная цена*</h6>
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
        @endif
    </section>
    <script>
        const tabButtons = document.querySelectorAll('.btn-tab-switcher');
        const tabInactiveButtons = document.getElementsByClassName('.btn-tab-switcher')

        tabButtons.forEach(button => {
            button.addEventListener('click', event => {
                tabButtons.forEach(btn => btn.classList.remove('active'))
                console.log(tabButtons)
                event.target.classList.add('active')
            })
        })

        function openTab(tabName) {
            var i;
            var x = document.getElementsByClassName("tab");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(tabName).style.display = "block";
        }
    </script>
@endsection
