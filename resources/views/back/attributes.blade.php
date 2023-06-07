@extends('layouts.admin')
@section('title')
    Атрибуты
@stop

@section('content')

    {{-- MODAL --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border: none; padding: 20px;">
                <div class="modal-header" style="border: none; padding: 0 1rem 1rem;">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700; font-size: 18pt;">Товар</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <form class="form_style" action="{{ route('attributes.store') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body" style="text-align: left;">
                        <div class="input-group input-group-sm">
                            <input name="id" id="id" type="hidden" class="form-control">
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Название атрибута RU</label>
                            <input name="name_ru" id="name_ru" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Название атрибута EN</label>
                            <input name="name_en" id="name_en" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Название атрибута UZ</label>
                            <input name="name_uz" id="name_uz" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Название атрибута TR</label>
                            <input name="name_tr" id="name_tr" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Название атрибута AR</label>
                            <input name="name_ar" id="name_ar" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Ед. измерения RU</label>
                            <input name="unit_ru" id="unit_ru" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Ед. измерения EN</label>
                            <input name="unit_en" id="unit_en" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Ед. измерения UZ</label>
                            <input name="unit_uz" id="unit_uz" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Ед. измерения TR</label>
                            <input name="unit_tr" id="unit_tr" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Ед. измерения AR</label>
                            <input name="unit_ar" id="unit_ar" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Категория</label>
                            <select name="category" id="category" type="text" class="form-control">
                                <option>Не выбрано</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name_ru}}</option>
                                @endforeach
                            </select>
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
            <h1>Управление атрибутами</h1>
            <div class='edit-opr'>
                <div class='container'>
                    <div class='row'>
                        <div class='col'></div>
                        <div class='col'></div>
                        <div class='col' style='text-align: right; margin-right: 20px;'>
                            <a title="Создать" href='' type="button" data-bs-toggle="modal"
                               data-bs-target="#exampleModal" class='btn btn-success'><i class='fa fa-plus'></i></a>
                        </div>
                    </div>
                    <table class='table table-hover'>
                        <thead>
                        <tr>
                            <th scope='col' class='col-1 text-center'>№</th>
                            <th scope='col' class='col-2 text-center'>Название</th>
                            <th scope='col' class='col-2 text-center'>Ед. измерения</th>
                            <th scope='col' class='col-2 text-center'>Категории</th>
                            <th scope='col' class='col-2 text-center'>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($attributes as $attribute)
                            <tr>
                                <th scope='row' class='text-center'>{{ $loop->iteration }}</th>
                                <td class='text-center'>
                                    {{ $attribute->name_ru }}
                                </td>
                                <td class='text-center'>
                                    {{ $attribute->unit_ru }}
                                </td>
                                <td class='text-center'>
                                    {{$attribute->categories->name_ru}}
                                </td>
                                <td class="text-center">
                                    <a title="Изменить товар" href='' type="button"
                                       data-bs-toggle="modal"
                                       data-bs-target="#exampleModal"
                                       data-id="{{ $attribute->id }}"
                                       data-name_ru="{{ $attribute->name_ru }}"
                                       data-name_en="{{ $attribute->name_en }}"
                                       data-name_uz="{{ $attribute->name_uz }}"
                                       data-name_tr="{{ $attribute->name_tr }}"
                                       data-name_ar="{{ $attribute->name_ar }}"
                                       data-unit_ru="{{ $attribute->unit_ru }}"
                                       data-unit_en="{{ $attribute->unit_en }}"
                                       data-unit_uz="{{ $attribute->unit_uz }}"
                                       data-unit_tr="{{ $attribute->unit_tr }}"
                                       data-unit_ar="{{ $attribute->unit_ar }}"
                                       data-category="{{ $attribute->category_id }}"
                                       class='btn btn-primary'><i class='fa fa-edit'></i>
                                    </a>
                                    <form method="POST" action="{{ route('attributes.destroy' , $attribute) }}"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Удалить опрос"
                                                onclick="return confirm('Вы точно хотите удалить атрибут?')"
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
            var unit_ru = button.data('unit_ru')
            var unit_en = button.data('unit_en')
            var unit_uz = button.data('unit_uz')
            var unit_tr = button.data('unit_tr')
            var unit_ar = button.data('unit_ar')
            var category_id = button.data('category')
            var modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #name_ru').val(name_ru)
            modal.find('.modal-body #name_en').val(name_en)
            modal.find('.modal-body #name_uz').val(name_uz)
            modal.find('.modal-body #name_tr').val(name_tr)
            modal.find('.modal-body #name_ar').val(name_ar)
            modal.find('.modal-body #unit_ru').val(unit_ru)
            modal.find('.modal-body #unit_en').val(unit_en)
            modal.find('.modal-body #unit_uz').val(unit_uz)
            modal.find('.modal-body #unit_tr').val(unit_tr)
            modal.find('.modal-body #unit_ar').val(unit_ar)
            modal.find('.modal-body #category').val(category_id)
            setTimeout(function () {
                $('#name').focus();
            }, 500);
        })
    </script>
@stop
