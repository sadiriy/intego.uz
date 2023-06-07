@extends('layouts.admin')
@section('title')
    Отзывы и благодарственные письма
@stop

@section('content')
    {{-- MODAL --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border: none; padding: 20px;">
                <div class="modal-header" style="border: none; padding: 0 1rem 1rem;">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700; font-size: 18pt;">Опрос</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <form class="form_style" action="{{ route('overviews.upload') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body" style="text-align: left;">
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Название фотографии</label>
                            <input name="name" id="name" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label for="image" style="margin-bottom: 10px;">Изображение</label>
                            <input name="image" id="image" type="file" class="form-control" required><br>
                        </div>
                    </div>
                    <div class="modal-footer" style="border: none;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-success sub">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--TABLE--}}
    <div class="container" align="center">
        <div class="starter-template">
            <h1>Управление отзывами</h1>
            <div class='edit-opr'>
                <div class='container'>
                    <div class='row'>
                        <div class='col'></div>
                        <div class='col'></div>
                        <div class='col' style='text-align: right; margin-right: 20px;'>
                            <a title="Добавить отзыв" href='' type="button" data-bs-toggle="modal"
                               data-bs-target="#exampleModal" class='btn btn-success'><i class='fa fa-plus'></i></a>
                        </div>
                    </div>
                    <table class='table table-hover'>
                        <thead>
                        <tr>
                            <th scope='col' class='col-1 text-center'>№</th>
                            <th scope='col' class='col-3 text-center'>Название фотографии</th>
                            <th scope='col' class='col-2 text-center'>Изображение</th>
                            <th scope='col' class='col-2 text-center'>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($overviews as $overview)
                            <tr>
                                <th scope='row' class='text-center'>{{ $loop->iteration }}</th>
                                <td class='text-center'>
                                    {{ $overview->name }}
                                </td>
                                <td class='text-center'>
                                    <img width="70px" height="auto"
                                         src="{{ asset($overview->url) }}">
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('overviews.delete' , $overview) }}"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Удалить отзыв"
                                                onclick="return confirm('Вы точно хотите удалить отзыв?')"
                                                class='btn btn-danger'><i class='fa fa-trash'></i></button>
                                    </form>
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
