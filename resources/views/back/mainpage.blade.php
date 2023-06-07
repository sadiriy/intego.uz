@extends('layouts.admin')
@section('title')
    Слайдер
@stop

@section('content')

{{-- MODAL Numbers --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border: none; padding: 20px;">
            <div class="modal-header" style="border: none; padding: 0 1rem 1rem;">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700; font-size: 18pt;">Товар</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <form class="form_style" action="{{ route('mainpage.store') }}" method="post"
          enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="modal-body" style="text-align: left;">
            <h2>Цифры</h2>
            <div class="input-group input-group-sm">
                <input name="type" id="type" type="hidden" value="number" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <input name="id" id="id" type="hidden" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Цифра</label>
                <input name="number" id="number" type="text" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Значение ru</label>
                <input name="unit_ru" id="unit_ru" type="text" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Текст ru</label>
                <input name="text_ru" id="text_ru" type="text" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Значение en</label>
                <input name="unit_en" id="unit_en" type="text" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Текст en</label>
                <input name="text_en" id="text_en" type="text" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Значение uz</label>
                <input name="unit_uz" id="unit_uz" type="text" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Текст uz</label>
                <input name="text_uz" id="text_uz" type="text" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Значение tr</label>
                <input name="unit_tr" id="unit_tr" type="text" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Текст tr</label>
                <input name="text_tr" id="text_tr" type="text" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Значение ar</label>
                <input name="unit_ar" id="unit_ar" type="text" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Текст ar</label>
                <input name="text_ar" id="text_ar" type="text" class="form-control">
            </div>
        </div>
        <div class="modal-footer" style="border: none;">
            <button type="submit" class="btn btn-success sub">Сохранить</button>
        </div>
    </form>
        </div>
    </div>
</div>

{{-- MODAL Privileges --}}
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border: none; padding: 20px;">
            <div class="modal-header" style="border: none; padding: 0 1rem 1rem;">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700; font-size: 18pt;">Товар</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <form class="form_style" action="{{ route('mainpage.store') }}" method="post"
          enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="modal-body" style="text-align: left;">
            <h2>Преимущества</h2>
            <div class="input-group input-group-sm">
                <input name="type" id="type" type="hidden" value="privilege" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <input name="id" id="id" type="hidden" class="form-control">
            </div>
            <div class="input-group input-group-sm" style="flex-direction: column">
                <label style="margin-bottom: 10px;">Иконка</label>
                <figure>
                    <img width="50px" height="50px" id="icon-preview" src=""  style="background-color: black; padding: 10px">
                </figure>
                <input name="icon" id="icon" type="file" class="form-control"><br>
            </div>

            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Текст ru</label>
                <input name="text_ru" id="pr_text_ru" type="text" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Текст en</label>
                <input name="text_en" id="pr_text_en" type="text" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Текст uz</label>
                <input name="text_uz" id="pr_text_uz" type="text" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Текст tr</label>
                <input name="text_tr" id="pr_text_tr" type="text" class="form-control">
            </div>
            <div class="input-group input-group-sm">
                <label style="margin-bottom: 10px;">Текст ar</label>
                <input name="text_ar" id="pr_text_ar" type="text" class="form-control">
            </div>
        </div>
        <div class="modal-footer" style="border: none;">
            <button type="submit" class="btn btn-success sub">Сохранить</button>
        </div>
    </form>
        </div>
    </div>
</div>

    {{--TABLE Numbers--}}
    <div class="container" align="center">
        <div class="starter-template">
            <h1>Цифры</h1>
            <div class='edit-opr'>
                <div class='container'>
                    <div class='row'>
                        <div class='col'></div>
                        <div class='col' style='text-align: right; margin-right: 20px;'>
                        </div>
                    </div>

                        <table class='table table-hover'>
                            <thead>
                            <tr>
                                <th scope='col' class='col-1 text-center'>№</th>
                                <th scope='col' class='col-2 text-center'>Цифра</th>
                                <th scope='col' class='col-2 text-center'>Значение</th>
                                <th scope='col' class='col-2 text-center'>Текст</th>
                                <th scope='col' class='col-2 text-center'>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($numbers as $number)
                                <tr>
                                    <th scope='row' class='text-center'>{{ $loop->iteration }}</th>
                                    <td class='text-center'>
                                        {{ $number->number }}
                                    </td>
                                    <td class='text-center'>
                                        {{$number->unit_ru}}
                                    </td>
                                    <td class='text-center'>
                                        {{$number->text_ru}}
                                    </td>
                                    <td class="text-center">
                                        <a title="Изменить товар" href='' type="button"
                                           data-bs-toggle="modal"
                                           data-bs-target="#exampleModal"
                                           data-id="{{ $number->id }}"
                                           data-number="{{ $number->number }}"
                                           data-unit_ru="{{ $number->unit_ru }}"
                                           data-unit_en="{{ $number->unit_en }}"
                                           data-unit_uz="{{ $number->unit_uz }}"
                                           data-unit_tr="{{ $number->unit_tr }}"
                                           data-unit_ar="{{ $number->unit_ar }}"
                                           data-text_ru="{{ $number->text_ru }}"
                                           data-text_en="{{ $number->text_en }}"
                                           data-text_uz="{{ $number->text_uz }}"
                                           data-text_tr="{{ $number->text_tr }}"
                                           data-text_ar="{{ $number->text_ar }}"
                                           class='btn btn-primary'><i class='fa fa-edit'></i>
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

    {{--TABLE Privileges--}}
    <div class="container" align="center">
        <div class="starter-template">
            <h1>Привелегии</h1>
            <div class='edit-opr'>
                <div class='container'>
                    <div class='row'>
                        <div class='col'></div>
                        <div class='col' style='text-align: right; margin-right: 20px;'>
                            <a title="Назад" href='{{ route('settings.index') }}' class='btn btn-dark sub'><i
                                    class='fa fa-arrow-left'></i></a>
                        </div>
                    </div>

                        <table class='table table-hover'>
                            <thead>
                            <tr>
                                <th scope='col' class='col-1 text-center'>№</th>
                                <th scope='col' class='col-2 text-center'>Иконка</th>
                                <th scope='col' class='col-2 text-center'>Текст</th>
                                <th scope='col' class='col-2 text-center'>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($privileges as $privilege)
                                <tr>
                                    <th scope='row' class='text-center'>{{ $loop->iteration }}</th>
                                    <td class='text-center'>
                                        <img width="70px" height="auto" style="background-color: black; padding: 10px"
                                             src="{{ asset('img' . $privilege->icon) }}">
                                    </td>
                                    <td class='text-center'>
                                        {{$privilege->text_ru}}
                                    </td>
                                    <td class="text-center">
                                        <a title="Изменить товар" href='' type="button"
                                           data-bs-toggle="modal"
                                           data-bs-target="#exampleModal2"
                                           data-id="{{ $privilege->id }}"
                                           data-icon="{{ $privilege->icon }}"
                                           data-text_ru="{{ $privilege->text_ru }}"
                                           data-text_en="{{ $privilege->text_en }}"
                                           data-text_uz="{{ $privilege->text_uz }}"
                                           data-text_tr="{{ $privilege->text_tr }}"
                                           data-text_ar="{{ $privilege->text_ar }}"
                                           class='btn btn-primary'><i class='fa fa-edit'></i>
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


<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var number = button.data('number')
        var unit_ru = button.data('unit_ru')
        var unit_en = button.data('unit_en')
        var unit_uz = button.data('unit_uz')
        var unit_tr = button.data('unit_tr')
        var unit_ar = button.data('unit_ar')
        var text_ru = button.data('text_ru')
        var text_en = button.data('text_en')
        var text_uz = button.data('text_uz')
        var text_tr = button.data('text_tr')
        var text_ar = button.data('text_ar')
        var modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #number').val(number)
        modal.find('.modal-body #unit_ru').val(unit_ru)
        modal.find('.modal-body #unit_en').val(unit_en)
        modal.find('.modal-body #unit_uz').val(unit_uz)
        modal.find('.modal-body #unit_tr').val(unit_tr)
        modal.find('.modal-body #unit_ar').val(unit_ar)
        modal.find('.modal-body #text_ru').val(text_ru)
        modal.find('.modal-body #text_en').val(text_en)
        modal.find('.modal-body #text_uz').val(text_uz)
        modal.find('.modal-body #text_tr').val(text_tr)
        modal.find('.modal-body #text_ar').val(text_ar)
        setTimeout(function () {
            $('#name').focus();
        }, 500);
    })
</script>

<script>
    $('#exampleModal2').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var icon = button.data('icon')
        var text_ru = button.data('text_ru')
        var text_en = button.data('text_en')
        var text_uz = button.data('text_uz')
        var text_tr = button.data('text_tr')
        var text_ar = button.data('text_ar')
        var modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #image-icon')
        modal.find('.modal-body #icon-preview').attr("src", "/img" + icon)
        modal.find('.modal-body #pr_text_ru').val(text_ru)
        modal.find('.modal-body #pr_text_en').val(text_en)
        modal.find('.modal-body #pr_text_uz').val(text_uz)
        modal.find('.modal-body #pr_text_tr').val(text_tr)
        modal.find('.modal-body #pr_text_ar').val(text_ar)
        setTimeout(function () {
            $('#name').focus();
        }, 500);
    })
</script>
@stop
