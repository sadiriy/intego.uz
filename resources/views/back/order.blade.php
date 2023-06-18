@extends('layouts.admin')
@section('title')
    Заказ
@stop

@section('content')

    {{--TABLE--}}
    <div class="container" align="center">
        <div class="starter-template">
            <h1>Заявка</h1>
            <div class='edit-opr'>
                <div class='container'>
                    <div class='row'>
                        <div class='col'></div>
                        <div class='col'></div>
                        <div class='col' style='text-align: right; margin-right: 20px;'>
                            <a title="Назад" href='{{ url()->previous() }}' class='btn btn-dark sub'><i
                                    class='fa fa-arrow-left'></i></a>
                        </div>
                    </div>
                    <table class='table table-hover'>
                        <thead>
                        <tr>
                            <th scope='col' class='col-1 text-center'>№</th>
                            <th scope='col' class='col-2 text-center'>Наименование</th>
                            <th scope='col' class='col-2 text-center'>Модель</th>
                            <th scope='col' class='col-2 text-center'>Цена</th>
                            <th scope='col' class='col-2 text-center'>Кол-во</th>
                            <th scope='col' class='col-2 text-center'>Итоговая цена</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order_products as $products)
                            <tr>
                                <th scope='row' class='text-center'>{{ $loop->iteration }}</th>
                                <td class='text-center'>
                                    {{ $products->name }}
                                </td>
                                <td class='text-center'>
                                    {{ $products->slug }}
                                </td>
                                <td class='text-center'>
                                    {{ number_format($products->price, 0, '', ' ') }} сум
                                </td>
                                <td class='text-center'>
                                    {{$products->amount}}
                                </td>
                                <td class='text-center'>
                                    {{number_format($products->price * $products->amount, 0, '', ' ')}} сум
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@stop
