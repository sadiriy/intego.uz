@extends('layouts.admin')
@section('title')
    Категории
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
                <form class="form_style" action="{{ route('categories.store') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body" style="text-align: left;">
                        <div class="input-group input-group-sm">
                            <input name="id" id="id" type="hidden" class="form-control">
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Название категории (RU)</label>
                            <input name="name_ru" id="name_ru" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label for="image" style="margin-bottom: 10px;">Изображение категории</label>
                            <figure style="width: 100%">
                                <img width="50px" height="50px" id="image-icon" src="">
{{--                                <figcaption><a href="" id="option_eng"></a></figcaption>--}}
                            </figure>
                            <input name="image" id="image" type="file" class="form-control"><br>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Описание категории (RU)</label>
                            <textarea name="description_ru" id="description_ru" type="text" class="form-control" required></textarea>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Позиция</label>
                            <input name="position" id="position" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Популярный</label>
                            <input name="is_popular" id="is_popular" type="checkbox">
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
            <h1>Управление категориями</h1>
            <div class='edit-opr'>
                <div class='container'>
                    <div class='row'>
                        <div class='col'></div>
                        <div class='col'></div>
                        <div class='col' style='text-align: right; margin-right: 20px;'>
                            <a title="Создать категорию" href='' type="button" data-bs-toggle="modal"
                               data-bs-target="#exampleModal" class='btn btn-success'><i class='fa fa-plus'></i></a>
                        </div>
                    </div>
                    <table class='table table-hover'>
                        <thead>
                        <tr>
                            <th scope='col' class='col-1 text-center'>№</th>
                            <th scope='col' class='col-3 text-center'>Название</th>
                            <th scope='col' class='col-2 text-center'>Изображение</th>
                            <th scope='col' class='col-2 text-center'>Позиция</th>
                            <th scope='col' class='col-2 text-center'>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope='row' class='text-center'>{{ $loop->iteration }}</th>
                                <td class='text-center'>
                                    {{ $category->name_ru }}
                                </td>
                                <td class='text-center'>
                                    <img width="70px" height="auto" alt="{{ $category->name_ru }}"
                                         src="{{ asset($category->image) }}">
                                </td>
                                <td class='text-center'>
                                    {{$category->position}}
                                </td>
                                <td class="text-center">
                                    <a title="Изменить категорию" href='' type="button"
                                       data-bs-toggle="modal"
                                       data-bs-target="#exampleModal"
                                       data-id="{{ $category->id }}"
                                       data-name_ru="{{ $category->name_ru }}"
                                       data-image="{{ $category->image }}"
                                       data-description_ru="{{ $category->description_ru }}"
                                       data-position="{{ $category->position }}"
                                       data-is_popular="{{ $category->is_popular }}"
                                       class='btn btn-primary'><i class='fa fa-edit'></i>
                                    </a>
                                    <form method="POST" action="{{ route('categories.destroy' , $category) }}"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Удалить опрос"
                                                onclick="return confirm('Вы точно хотите удалить категорию?')"
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


    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var image = "/" + button.data('image')
            var modal = $(this)

            modal.find('.modal-body #id').val(button.data('id'))
            modal.find('.modal-body #name_ru').val(button.data('name_ru'))
            modal.find('.modal-body #option_eng').text(image)
            modal.find('.modal-body #image-icon').attr("src", image)
            modal.find('.modal-body #description_ru').val(button.data('description_ru'))
            modal.find('.modal-body #position').val(button.data('position'))
            modal.find('.modal-body #is_popular').prop('checked', button.data('is_popular'))
            setTimeout(function () {
                $('#name').focus();
            }, 500);
        })
    </script>

@stop
