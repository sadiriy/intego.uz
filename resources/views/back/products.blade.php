@extends('layouts.admin')
@section('title')
    Продукты
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
                <form class="form_style" action="{{ route('products.store') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body" style="text-align: left;">
                        <div class="input-group input-group-sm">
                            <input name="id" id="id" type="hidden" class="form-control">
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Название товара RU</label>
                            <input name="name_ru" id="name_ru" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Название товара EN</label>
                            <input name="name_en" id="name_en" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Название товара UZ</label>
                            <input name="name_uz" id="name_uz" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Название товара TR</label>
                            <input name="name_tr" id="name_tr" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Название товара AR</label>
                            <input name="name_ar" id="name_ar" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Описание товара RU</label>
                            <input name="description_ru" id="description_ru" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Описание товара EN</label>
                            <input name="description_en" id="description_en" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Описание товара UZ</label>
                            <input name="description_uz" id="description_uz" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Описание товара TR</label>
                            <input name="description_tr" id="description_tr" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Описание товара AR</label>
                            <input name="description_ar" id="description_ar" type="text" class="form-control" required>
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
            <h1>Управление товарами</h1>
            <div class='edit-opr'>
                <div class='container'>
                    <div class='row'>
                        <div class='col'>
                            <form action="{{ route('product.search') }}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="text" name="search" placeholder="Поиск по названию">
                                <input type="submit" class="btn btn-success" value="Поиск">
                            </form>
                        </div>
                        <div class='col'></div>
                        <div class='col' style='text-align: right; margin-right: 20px;'>
                            <a title="Создать товар" href='' type="button" data-bs-toggle="modal"
                               data-bs-target="#exampleModal" class='btn btn-success'><i class='fa fa-plus'></i></a>
                        </div>
                    </div>
                    <table class='table table-hover'>
                        <thead>
                        <tr>
                            <th scope='col' class='col-1 text-center'>№</th>
                            <th scope='col' class='col-2 text-center'>Название</th>
                            <th scope='col' class='col-2 text-center'>Описание</th>
                            <th scope='col' class='col-2 text-center'>Параметры</th>
                            <th scope='col' class='col-2 text-center'>Категория</th>
                            <th scope='col' class='col-2 text-center'>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope='row' class='text-center'>{{ $loop->iteration }}</th>
                                <td class='text-center'>
                                    {{ $product->name_ru }}
                                </td>
                                <td class='text-center'>
                                    {{$product->description_ru}}
                                </td>
                                <td class='text-center'>
                                    @foreach($product->parameters as $parameter)
                                        {{ $parameter->attributes->name_ru ?? 'не задано' }}: {{ $parameter->value ?? 'не задано' }} {{ $parameter->attributes->unit_ru ?? 'не задано' }}<br>
                                    @endforeach
                                        <a title="Изменить параметры" href='{{ route('parameters.index', $product) }}' type="button" class='btn btn-primary'>Изменить</i>
                                        </a>
                                </td>
                                <td class='text-center'>
                                    {{$product->category->name_ru}}
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-secondary" href="{{ route('product.duplicate', $product) }}"><i class="fa-solid fa-clone"></i></a>
                                    <a title="Изменить товар" href='' type="button"
                                       data-bs-toggle="modal"
                                       data-bs-target="#exampleModal"
                                       data-id="{{ $product->id }}"
                                       data-name_ru="{{ $product->name_ru }}"
                                       data-name_en="{{ $product->name_en }}"
                                       data-name_uz="{{ $product->name_uz }}"
                                       data-name_tr="{{ $product->name_tr }}"
                                       data-name_ar="{{ $product->name_ar }}"
                                       data-description_ru="{{ $product->description_ru }}"
                                       data-description_en="{{ $product->description_en }}"
                                       data-description_uz="{{ $product->description_uz }}"
                                       data-description_tr="{{ $product->description_tr }}"
                                       data-description_ar="{{ $product->description_ar }}"
                                       data-category="{{ $product->category->id }}"
                                       class='btn btn-primary'><i class='fa fa-edit'></i>
                                    </a>
                                    <form method="POST" action="{{ route('products.destroy' , $product) }}"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Вы точно хотите удалить товар?')"
                                                class='btn btn-danger'><i class='fa fa-trash'></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if($showPagination)
                    {!! $products->links() !!}
                    @endif
                </div>
            </div>
            <div class="page-navigation">

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
            var description_ru = button.data('description_ru')
            var description_en = button.data('description_en')
            var description_uz = button.data('description_uz')
            var description_tr = button.data('description_tr')
            var description_ar = button.data('description_ar')
            var category = button.data('category')
            var modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #name_ru').val(name_ru)
            modal.find('.modal-body #name_en').val(name_en)
            modal.find('.modal-body #name_uz').val(name_uz)
            modal.find('.modal-body #name_tr').val(name_tr)
            modal.find('.modal-body #name_ar').val(name_ar)
            modal.find('.modal-body #description_ru').val(description_ru)
            modal.find('.modal-body #description_en').val(description_en)
            modal.find('.modal-body #description_uz').val(description_uz)
            modal.find('.modal-body #description_tr').val(description_tr)
            modal.find('.modal-body #description_ar').val(description_ar)
            modal.find('.modal-body #category').val(category)
            setTimeout(function () {
                $('#name').focus();
            }, 500);
        })
    </script>
@stop
