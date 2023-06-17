@extends('layouts.layout')
@section('title')
    {{ __('Корзина') }}
@stop
@section('style-link')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/categories.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages.css') }}" />
@stop

@section('content')
{{--Modal window--}}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <form class="form_style" action="{{ route('cart.send') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="" style="text-align: left;">
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 5px;">{{ __('Ваше имя') }}*</label>
                                <input name="name" id="name" type="text" class="form-control">
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 5px;">{{ __('Номер телефона') }}*</label>
                                <input name="phone" id="phone" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-buttons">
                            <button style="width: 100%;" type="submit" class='checkout-button'>{{ __('Отправить заявку') }}</button>
                            <button style="width: 100%;" type="button" class="checkout-button" data-dismiss="modal">Закрыть</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
{{--Modal window END--}}

    <div class="cart-container">
        <h1>{{ __('Корзина') }}</h1>
        <div class="cart-header">
            <h3>{{ __('В корзине товаров') }}: {{Cart::count()}}</h3>
            <a class="btn btn-danger" onclick="return confirm({{ __('Вы точно хотите очистить корзину') }})" style="background-color: #c74c4c" href="{{ route('cart.clear') }}">{{ __('Очистить') }}</a>
        </div>
        <section class="cart-section row">
            <div class="col-md-12 col-lg-12 col-xl-12 cart-table">
                <table class="table table-hover products-table">
                    <thead>
                    <tr class="product-table-header">
                        <th class="product-column-name" scope="col">№</th>
                        <th class="product-column-name" scope="col">{{ __('Изображение') }}</th>
                        <th class="product-column-name" scope="col">{{ __('Наименование') }}</th>
                        <th class="product-column-name" scope="col">{{ __('Цена') }}</th>
                        <th class="product-column-name" scope="col">{{ __('Количество') }}</th>
                        <th class="product-column-name" scope="col">{{ __('Итого') }}</th>
                        <th class="product-column-name" scope="col">{{ __('Действие') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Cart::content() as $item)
                        <tr class="product-table-row">
                            <td class="product-table-value">{{ $loop->iteration }}</td>
                            <td class="product-table-value"><img width="100" src="{{$item->model->image }}" alt="{{$item->model->name_ru }}"></td>
                            <td class="product-table-value">{{$item->model->name_ru }}</td>
                            <td class="product-table-value">{{ number_format($item->model->price, 0, '', ' ') }} сум</td>
                            <td class="product-table-value" style="text-align: center">{{ $item->qty }}</td>
                            <td class="product-table-value">{{ number_format($item->total, 0, '', ' ') }} сум</td>
                            <td class="product-table-value">
                                <form method="POST" action="{{ route('cart.remove' , $item->rowId) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Удалить товар"
                                            onclick="return confirm({{ __('Вы точно хотите удалить товар с корзины') }} + '?')"
                                            class='btn btn-danger'><i class='fa fa-trash'></i></button>
                                </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="summary-box">
                    <div class="total-prices">
                        <div class="total-price-items">
                            <span>Итого:</span><span>{{ number_format(Cart::subtotal(), 0, '', ' ') }} сум.</span>
                        </div>
                        <div class="total-price-items">
                            <span>Скидка:</span><span>0 сум.</span>
                        </div>
                        <div class="total-price-items">
                            <span>Итого со скидкой:</span><span>{{ number_format(Cart::total(), 0, '', ' ') }} сум.</span>
                        </div>
                    </div>
                    <div class="action-box">
                        <a href="/" class="checkout-button">Вернуться назад</a>
                        <a type="button" data-toggle="modal" data-target="#myModal" class="checkout-button">Оформить</a>
                    </div>
                </div>
            </div>

{{--            <div class="col-md-12 col-lg-3 col-xl-3 order-form">--}}
{{--            </div>--}}
        </section>
    </div>


@endsection
