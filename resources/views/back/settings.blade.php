@extends('layouts.admin')
@section('title')
    Параметры
@stop

@section('content')

    {{--TABLE--}}
    <div class="container" align="center">
        <div class="starter-template">
            <h1>Слайдер</h1>
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
                            <th scope='col' class='col-2 text-center'>Название</th>
                            <th scope='col' class='col-2 text-center'>Действие</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <th scope='row' class='text-center'>1</th>
                                <td class='text-center'>Основные</td>
                                <td class='text-center'><a class='btn btn-primary' href="{{ route('general.index') }}"><i class='fa fa-edit'></i></a></td>
                            </tr>
                            <tr>
                                <th scope='row' class='text-center'>2</th>
                                <td class='text-center'>Главная страница</td>
                                <td class='text-center'><a class='btn btn-primary' href="{{ route('mainpage.index') }}"><i class='fa fa-edit'></i></a></td>
                            </tr>
                            <tr>
                                <th scope='row' class='text-center'>3</th>
                                <td class='text-center'>Слайдер</td>
                                <td class='text-center'><a class='btn btn-primary' href="{{ route('sliders.index') }}"><i class='fa fa-edit'></i></a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@stop
