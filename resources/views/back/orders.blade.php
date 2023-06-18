@extends('layouts.admin')
@section('title')
    Заказы
@stop

@section('content')

    {{--TABLE--}}
    <div class="container" align="center">
        <div class="starter-template">
            <h1>Заявки</h1>
            <div class='edit-opr'>
                <div class='container'>
                    <div class='row'>
                        <div class='col'></div>
                        <div class='col'></div>
                        <div class='col' style='text-align: right; margin-right: 20px;'>
                        </div>
                    </div>
                    <table class='table table-hover'>
                        <thead>
                        <tr>
                            <th scope='col' class='col-1 text-center'>№</th>
                            <th scope='col' class='col-2 text-center'>ID</th>
                            <th scope='col' class='col-2 text-center'>Имя клиента</th>
                            <th scope='col' class='col-2 text-center'>Номер клиента</th>
                            <th scope='col' class='col-2 text-center'>Дата</th>
                            <th scope='col' class='col-2 text-center'>Принят</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th scope='row' class='text-center'>{{ $loop->iteration }}</th>
                                <td class='text-center'>
                                    {{ $order->id }}
                                </td>
                                <td class='text-center'>
                                    {{ $order->client_name }}
                                </td>
                                <td class='text-center'>
                                    <a href="tel:+{{ $order->client_phone }}">+{{ $order->client_phone }}</a>
                                </td>
                                <td class='text-center'>
                                    {{$order->created_at}}
                                </td>
                                <td class='text-center'>
                                    <a href="{{ route('orders.activate', $order) }}">
                                        @if ($order->status == 1)
                                            <i style="font-size: 25pt; color: green;" class="fas fa-toggle-on"></i>
                                        @elseif ($order->status == 0)
                                            <i style="font-size: 25pt; color: grey;" class="fas fa-toggle-off"></i>
                                        @else
                                            <p style="color: red;">Err:404</p>
                                        @endif
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a title="Открыть заказ" href='{{ route('order.index', $order) }}' type="button" class='btn btn-primary'>
                                        <i class='fa fa-arrow-right'></i>
                                    </a>
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
