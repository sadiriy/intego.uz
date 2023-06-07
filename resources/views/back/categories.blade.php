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
                            <label style="margin-bottom: 10px;">Название категории (EN)</label>
                            <input name="name_en" id="name_en" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Название категории (UZ)</label>
                            <input name="name_uz" id="name_uz" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Название категории (TR)</label>
                            <input name="name_tr" id="name_tr" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Название категории (AR)</label>
                            <input name="name_ar" id="name_ar" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label for="image" style="margin-bottom: 10px;">Изображение категории</label>
                            <figure>
                                <img width="50px" height="50px" id="image-icon" src="">
{{--                                <figcaption><a href="" id="option_eng"></a></figcaption>--}}
                            </figure>
                            <input name="image" id="image" type="file" class="form-control"><br>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Описание категории (RU)</label>
                            <input name="description_ru" id="description_ru" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Описание категории (EN)</label>
                            <input name="description_en" id="description_en" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Описание категории (UZ)</label>
                            <input name="description_uz" id="description_uz" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Описание категории (TR)</label>
                            <input name="description_tr" id="description_tr" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Описание категории (AR)</label>
                            <input name="description_ar" id="description_ar" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Текст категории (RU)</label>
                            <textarea name="text_ru" id="text_ru" type="text" class="form-control"></textarea>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Текст категории (EN)</label>
                            <textarea name="text_en" id="text_en" type="text" class="form-control"></textarea>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Текст категории (UZ)</label>
                            <textarea name="text_uz" id="text_uz" type="text" class="form-control"></textarea>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Текст категории (TR)</label>
                            <textarea name="text_tr" id="text_tr" type="text" class="form-control"></textarea>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Текст категории (AR)</label>
                            <textarea name="text_ar" id="text_ar" type="text" class="form-control"></textarea>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Позиция</label>
                            <input name="position" id="position" type="text" class="form-control" required>
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
                            <th scope='col' class='col-2 text-center'>Описание</th>
                            <th scope='col' class='col-2 text-center'>Текст</th>
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
                                         src="{{ asset('img/categories/' . $category->image) }}">
                                </td>
                                <td class='text-center'>
                                    {{$category->description_ru}}
                                </td>
                                <td class='text-center'>
                                    {{$category->text_ru}}
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
                                       data-name_en="{{ $category->name_en }}"
                                       data-name_uz="{{ $category->name_uz }}"
                                       data-name_tr="{{ $category->name_tr }}"
                                       data-name_ar="{{ $category->name_ar }}"
                                       data-image="{{ $category->image }}"
                                       data-description_ru="{{ $category->description_ru }}"
                                       data-description_en="{{ $category->description_en }}"
                                       data-description_uz="{{ $category->description_uz }}"
                                       data-description_tr="{{ $category->description_tr }}"
                                       data-description_ar="{{ $category->description_ar }}"
                                       data-text_ru="{{ $category->text_ru }}"
                                       data-text_en="{{ $category->text_en }}"
                                       data-text_uz="{{ $category->text_uz }}"
                                       data-text_tr="{{ $category->text_tr }}"
                                       data-text_ar="{{ $category->text_ar }}"
                                       data-position="{{ $category->position }}"
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
            var id = button.data('id')
            var name_ru = button.data('name_ru')
            var name_en = button.data('name_en')
            var name_uz = button.data('name_uz')
            var name_tr = button.data('name_tr')
            var name_ar = button.data('name_ar')
            var image = button.data('image')
            var description_ru = button.data('description_ru')
            var description_en = button.data('description_en')
            var description_uz = button.data('description_uz')
            var description_tr = button.data('description_tr')
            var description_ar = button.data('description_ar')
            var text_ru = button.data('text_ru')
            var text_en = button.data('text_en')
            var text_uz = button.data('text_uz')
            var text_tr = button.data('text_tr')
            var text_ar = button.data('text_ar')
            var position = button.data('position')
            var modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #name_ru').val(name_ru)
            modal.find('.modal-body #name_en').val(name_en)
            modal.find('.modal-body #name_uz').val(name_uz)
            modal.find('.modal-body #name_tr').val(name_tr)
            modal.find('.modal-body #name_ar').val(name_ar)
            modal.find('.modal-body #option_eng').text(image)
            modal.find('.modal-body #image-icon').attr("src", "/img/categories/" + image)
            modal.find('.modal-body #description_ru').val(description_ru)
            modal.find('.modal-body #description_en').val(description_en)
            modal.find('.modal-body #description_uz').val(description_uz)
            modal.find('.modal-body #description_tr').val(description_tr)
            modal.find('.modal-body #description_ar').val(description_ar)
            modal.find('.modal-body #text_ru').val(text_ru)
            modal.find('.modal-body #text_en').val(text_en)
            modal.find('.modal-body #text_uz').val(text_uz)
            modal.find('.modal-body #text_tr').val(text_tr)
            modal.find('.modal-body #text_ar').val(text_ar)
            modal.find('.modal-body #position').val(position)
            setTimeout(function () {
                $('#name').focus();
            }, 500);
        })
    </script>

@stop
