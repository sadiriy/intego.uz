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
                            <th scope='col' class='col-2 text-center'>Файл</th>
                            <th scope='col' class='col-2 text-center'>Дата</th>
                            <th scope='col' class='col-2 text-center'>Принят</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($calculations as $calculation)
                            <tr>
                                <th scope='row' class='text-center'>{{ $loop->iteration }}</th>
                                <td class='text-center'>
                                    {{ $calculation->id }}
                                </td>
                                <td class='text-center'>
                                    {{ $calculation->name }}
                                </td>
                                <td class='text-center'>
                                    {{ $calculation->phone }}
                                </td>
                                <td class='text-center'>
                                    <a href="/{{ $calculation->file }}" download>{{ $calculation->file }}</a>
                                </td>
                                <td class='text-center'>
                                    {{$calculation->date}}
                                </td>
                                <td class='text-center'>
                                    <a href="{{ route('calculation.activate', $calculation) }}">
                                        @if ($calculation->is_checked == 1)
                                            <i style="font-size: 25pt; color: green;" class="fas fa-toggle-on"></i>
                                        @elseif ($calculation->is_checked == 0)
                                            <i style="font-size: 25pt; color: grey;" class="fas fa-toggle-off"></i>
                                        @else
                                            <p style="color: red;">Err:404</p>
                                        @endif
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
