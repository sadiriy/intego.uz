@extends('layouts.admin')
@section('title')
    Заказ
@stop

@section('content')

    {{--TABLE--}}
    <div class="container" align="center">
        <div class="starter-template">
            <h1>Заявка</h1>
            <div class='edit-opr order-container'>
                <div class='container'>
                    <div class='row'>
                        <div class='col'></div>
                        <div class='col'></div>
                        <div class='col' style='text-align: right; margin-right: 20px;'>
                            <a title="Назад" href='{{ url()->previous() }}' class='btn btn-dark sub'><i
                                    class='fa fa-arrow-left'></i></a>
                        </div>
                    </div>
                    <div class="notes">
                        @foreach($order_details as $item)
                            <div class="note-item">
                                {{ $item }}
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

@stop
