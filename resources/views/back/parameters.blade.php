@extends('layouts.admin')
@section('title')
    Параметры {{ $product->name }}
@stop

@section('content')

{{--     MODAL --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border: none; padding: 20px;">
                <div class="modal-header" style="border: none; padding: 0 1rem 1rem;">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700; font-size: 18pt;">Параметр</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <form class="form_style" action="{{ route('parameters.store', $product) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body" style="text-align: left;">
                        <div class="input-group input-group-sm">
                            <input name="id" id="id" type="hidden" class="form-control">
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Атрибут</label>
                            <select name="attribute_id" id="attribute_id" type="text" class="form-control">
                                <option>Не выбрано</option>
                                @foreach($attributes as $attribute)
                                    <option value="{{$attribute->id}}">{{$attribute->name_ru}} в {{$attribute->unit_ru}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Значение</label>
                            <input name="value" id="value" type="text" class="form-control" required>
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
            <h1>Управление параметрами</h1>
            <div class='edit-opr'>
                <div class='container'>
                    <div class='row'>
                        <div class='col'></div>
                        <div class='col'></div>
                        <div class='col' style='text-align: right; margin-right: 20px;'>
                            <a title="Назад" href='{{ url()->previous() }}' class='btn btn-dark sub'><i
                                    class='fa fa-arrow-left'></i></a>
                            <a title="Создать параметр" href='' type="button" data-bs-toggle="modal"
                               data-bs-target="#exampleModal" class='btn btn-success'><i class='fa fa-plus'></i></a>
                        </div>
                    </div>
                    <table class='table table-hover'>
                        <thead>
                        <tr>
                            <th scope='col' class='col-1 text-center'>№</th>
                            <th scope='col' class='col-2 text-center'>Название</th>
                            <th scope='col' class='col-2 text-center'>Значение</th>
                            <th scope='col' class='col-2 text-center'>Ед. измерения</th>
                            <th scope='col' class='col-2 text-center'>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($parameters as $parameter)
                            <tr>
                                <th scope='row' class='text-center'>{{ $loop->iteration }}</th>
                                <td class='text-center'>
                                    {{ $parameter->attributes->name_ru }}
                                </td>
                                <td class='text-center'>
                                    {{ $parameter->value }}
                                </td>
                                <td class='text-center'>
                                    {{$parameter->attributes->unit_ru}}
                                </td>
                                <td class="text-center">
                                    <a title="Изменить товар" href='' type="button"
                                       data-bs-toggle="modal"
                                       data-bs-target="#exampleModal"
                                       data-id="{{ $parameter->id }}"
                                       data-value="{{ $parameter->value }}"
                                       data-attribute="{{ $parameter->attribute_id }}"
                                       class='btn btn-primary'><i class='fa fa-edit'></i>
                                    </a>
                                    <form method="POST" action="{{ route('parameters.destroy', [$product, $parameter]) }}"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Удалить опрос"
                                                onclick="return confirm('Вы точно хотите удалить данный параметр?')"
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
            var value = button.data('value')
            var attribute_id = button.data('attribute')
            var modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #value').val(value)
            modal.find('.modal-body #attribute_id').val(attribute_id)
            setTimeout(function () {
                $('#name').focus();
            }, 500);
        })
    </script>
@stop
