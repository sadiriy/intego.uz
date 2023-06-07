@component('mail::message')
# Новый заказ от покупателя

Имя клиента: {{ $order->clientName }} <br>
Номер клиента: {{ $order->clientPhone }}

@foreach(json_decode($order->orderDetails) as $order_item)

{{$order_item}}

@endforeach


Спасибо,<br>
{{ config('app.name') }}
@endcomponent
