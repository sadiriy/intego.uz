@extends('layouts.admin')
@section('title')
    Страницы
@stop

@section('content')

    {{--TABLE--}}
    <div class="container" align="center">
        <div class="starter-template">
            <h1>Управление страницами</h1>
            <div class='edit-opr'>
                <div class='container'>
                    <div class='row'>
                        <div class='col'></div>
                        <div class='col'></div>
                        <div class='col' style='text-align: right; margin-right: 20px;'>
                            <a title="Назад" href='{{ url()->previous() }}' class='btn btn-dark sub'><i
                                        class='fa fa-arrow-left'></i></a>
                            <a title="Создать параметр" href='{{ route('back.page.create') }}' type="button" class='btn btn-success'><i class='fa fa-plus'></i></a>
                        </div>
                    </div>
                    <table class='table table-hover'>
                        <thead>
                        <tr>
                            <th scope='col' class='col-1 text-center'>№</th>
                            <th scope='col' class='col-2 text-center'>Адрес</th>
                            <th scope='col' class='col-2 text-center'>Заголовок</th>
                            <th scope='col' class='col-2 text-center'>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <th scope='row' class='text-center'>{{ $loop->iteration }}</th>
                                <td class='text-center'>
                                    {{ $page->url }}
                                </td>
                                <td class='text-center'>
                                    {{ $page->title_ru }}
                                </td>
                                <td class="text-center">
                                    <a title="Изменить товар" href='{{ route('back.page', $page) }}' class='btn btn-primary'>
                                        <i class='fa fa-edit'></i>
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
