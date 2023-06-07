@extends('layouts.layout')
@section('title')
    {{ __('Каталог') }}
@stop
@section('style-link')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/categories.css') }}" />
@stop

@section('content')

    <section class="category-main">
        <h4 class="breadcrumb">{{ __('Каталог') }}</h4>
        <h2 class="category-title">{{ $category->{'name_'.app()->getLocale()} }}</h2>
        <div class="row" style="justify-content: center">
            <p class="category-description-text">{{ $category->{'text_'.app()->getLocale()} }}</p>
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
            <div class="col-md-12 col-lg-11 col-xl-11 products-block">
                <h3 class="products-count">{{ __('Найдено позиций') }}: {{ $products->count() }} </h3>
                <table class="table table-hover products-table">
                    <thead>
                    <tr class="product-table-header">
                        <th class="product-column-name" scope="col">№</th>
                        <th class="product-column-name" scope="col">{{ __('Наименование') }}</th>
                        @foreach($attributes as $attribute)
                        <th class="product-column-name" scope="col">{{ $attribute->{'name_'.app()->getLocale()} }}</th>
                        @endforeach
                        <th class="product-column-name" scope="col">{{ __('Ед. измерения') }}</th>
                        <th class="product-column-name" scope="col">{{ __('Получить') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="product-table-row">
                            <td class="product-table-value">{{ $loop->iteration }}</td>
                            <td class="product-table-value">{{ $product->{'name_'.app()->getLocale()} }}</td>
                            @foreach($product->parameters as $parameter)
                                <td class="product-table-value">{{ $parameter->value ?? 'не задано' }} {{ $parameter->attributes->{'unit_'.app()->getLocale()} ?? 'не задано' }}</td>
                            @endforeach
                            <td class="product-table-value">{{ $product->{'description_'.app()->getLocale()} }}</td>
                            <td class="product-table-value">
                                <form action="{{ route('cart.store')}}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->{'name_'.app()->getLocale()} }}">
                                    <button type="submit" class="btn"><i style="color: white;" class="fa-solid fa-cart-shopping"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
