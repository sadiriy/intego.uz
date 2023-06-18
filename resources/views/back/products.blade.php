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
                            <label style="margin-bottom: 10px;">Модель товара</label>
                            <input name="slug" id="slug" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Описание товара RU</label>
                            <textarea name="description_ru" id="description_ru" type="text" class="form-control"></textarea>
                        </div>
                        <div class="input-group input-group-sm">
                            <label for="image" style="margin-bottom: 10px;">Изображение категории</label>
                            <figure style="width: 100%">
                                <img width="50px" height="50px" id="image-icon" src="">
                            </figure>
                            <input name="image" id="image" type="file" class="form-control"><br>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Цена товара</label>
                            <input name="price" id="price" type="text" class="form-control" required>
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
                            <th scope='col' class='col-2 text-center'>Изображение</th>
                            <th scope='col' class='col-2 text-center'>Название</th>
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
                                    <img width="70px" height="auto" alt="{{ $product->name_ru }}"
                                         src="{{ asset($product->image) }}">
                                </td>
                                <td class='text-center'>
                                    {{ $product->name_ru }}
                                </td>
                                <td class='text-center'>
                                    <a title="Изменить параметры" href='{{ route('parameters.index', $product) }}' type="button" class='btn btn-primary'>
                                        Изменить
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
                                       data-slug="{{ $product->slug }}"
                                       data-name_ru="{{ $product->name_ru }}"
                                       data-description_ru="{{ $product->description_ru }}"
                                       data-image="{{ $product->image }}"
                                       data-price="{{ $product->price }}"
                                       data-category="{{ $product->category_id }}"
                                       data-is_popular="{{ $product->is_popular }}"
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
            var image = "/" + button.data('image')
            var modal = $(this)

            modal.find('.modal-body #id').val(button.data('id'))
            modal.find('.modal-body #slug').val(button.data('slug'))
            modal.find('.modal-body #name_ru').val(button.data('name_ru'))
            modal.find('.modal-body #description_ru').val(button.data('description_ru'))
            modal.find('.modal-body #image-icon').attr("src", image)
            modal.find('.modal-body #price').val(button.data('price'))
            modal.find('.modal-body #category').val(button.data('category'))
            modal.find('.modal-body #is_popular').prop('checked', button.data('is_popular'))
            setTimeout(function () {
                $('#name').focus();
            }, 500);
        })
    </script>
@stop
