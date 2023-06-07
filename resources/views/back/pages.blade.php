@extends('layouts.admin')
@section('title')
    Страницы
@stop

@section('content')

    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

    <script>tinymce.init({selector:'textarea'});</script>

{{--     MODAL --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 700px;">
            <div class="modal-content" style="border: none; padding: 20px;">
                <div class="modal-header" style="border: none; padding: 0 1rem 1rem;">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 700; font-size: 18pt;">Параметр</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <form class="form_style" action="{{ route('pages.store') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body" style="text-align: left;">
                        <div class="input-group input-group-sm">
                            <input name="id" id="id" type="hidden" class="form-control">
                        </div>

                        {{--Page Title--}}
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Заголовок RU</label>
                            <input name="title_ru" id="title_ru" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Заголовок EN</label>
                            <input name="title_en" id="title_en" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Заголовок UZ</label>
                            <input name="title_uz" id="title_uz" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Заголовок TR</label>
                            <input name="title_tr" id="title_tr" type="text" class="form-control" required>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Заголовок AR</label>
                            <input name="title_ar" id="title_ar" type="text" class="form-control" required>
                        </div>

                        {{--Page Content--}}
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Текст страницы RU</label>
                            <textarea name="text_ru" id="text_ru" type="text" class="form-control"></textarea>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Текст страницы EN</label>
                            <textarea name="text_en" id="text_en" type="text" class="form-control"></textarea>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Текст страницы UZ</label>
                            <textarea name="text_uz" id="text_uz" type="text" class="form-control"></textarea>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Текст страницы TR</label>
                            <textarea name="text_tr" id="text_tr" type="text" class="form-control"></textarea>
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Текст страницы AR</label>
                            <textarea name="text_ar" id="text_ar" type="text" class="form-control"></textarea>
                        </div>

                        {{--Download Button--}}

                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Текст кнопки RU</label>
                            <input name="btn_text_ru" id="btn_text_ru" type="text" class="form-control">
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Ссылка кнопки RU</label>
                            <input name="btn_url_ru" id="btn_url_ru" type="text" class="form-control">
                        </div>

                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Текст кнопки EN</label>
                            <input name="btn_text_en" id="btn_text_en" type="text" class="form-control">
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Ссылка кнопки EN</label>
                            <input name="btn_url_en" id="btn_url_en" type="text" class="form-control">
                        </div>

                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Текст кнопки UZ</label>
                            <input name="btn_text_uz" id="btn_text_uz" type="text" class="form-control">
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Ссылка кнопки UZ</label>
                            <input name="btn_url_uz" id="btn_url_uz" type="text" class="form-control">
                        </div>

                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Текст кнопки TR</label>
                            <input name="btn_text_tr" id="btn_text_tr" type="text" class="form-control">
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Ссылка кнопки TR</label>
                            <input name="btn_url_tr" id="btn_url_tr" type="text" class="form-control">
                        </div>

                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Текст кнопки AR</label>
                            <input name="btn_text_ar" id="btn_text_ar" type="text" class="form-control">
                        </div>
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">Ссылка кнопки AR</label>
                            <input name="btn_url_ar" id="btn_url_ar" type="text" class="form-control">
                        </div>

                        {{--Page SEO Title--}}
                        <div class="input-group input-group-sm">
                            <label style="margin-bottom: 10px;">SEO</label>
                            <input name="seo" id="seo" type="text" class="form-control" required>
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
            <h1>Управление страницами</h1>
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
                            <th scope='col' class='col-2 text-center'>Заголовок</th>
                            <th scope='col' class='col-2 text-center'>Текст</th>
                            <th scope='col' class='col-2 text-center'>SEO</th>
                            <th scope='col' class='col-2 text-center'>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <th scope='row' class='text-center'>{{ $loop->iteration }}</th>
                                <td class='text-center'>
                                    {{ $page->name }}
                                </td>
                                <td class='text-center'>
                                    {{ $page->title_ru }}
                                </td>
                                <td class='text-center'>
                                    {{ Illuminate\Support\Str::limit($page->text_ru, 10) }}
                                </td>
                                <td class='text-center'>
                                    {{$page->seo}}
                                </td>
                                <td class="text-center">
                                    <a title="Изменить товар" href='' type="button"
                                       data-bs-toggle="modal"
                                       data-bs-target="#exampleModal"
                                       data-id="{{ $page->id }}"
                                       data-title_ru="{{ $page->title_ru }}"
                                       data-title_en="{{ $page->title_en }}"
                                       data-title_uz="{{ $page->title_uz }}"
                                       data-title_tr="{{ $page->title_tr }}"
                                       data-title_ar="{{ $page->title_ar }}"
                                       data-text_ru="{{ $page->text_ru }}"
                                       data-text_en="{{ $page->text_en }}"
                                       data-text_uz="{{ $page->text_uz }}"
                                       data-text_tr="{{ $page->text_tr }}"
                                       data-text_ar="{{ $page->text_ar }}"
                                       data-btn_text_ru="{{ $page->btn_text_ru }}"
                                       data-btn_text_en="{{ $page->btn_text_en }}"
                                       data-btn_text_uz="{{ $page->btn_text_uz }}"
                                       data-btn_text_tr="{{ $page->btn_text_tr }}"
                                       data-btn_text_ar="{{ $page->btn_text_ar }}"
                                       data-btn_url_ru="{{ $page->btn_url_ru }}"
                                       data-btn_url_en="{{ $page->btn_url_en }}"
                                       data-btn_url_uz="{{ $page->btn_url_uz }}"
                                       data-btn_url_tr="{{ $page->btn_url_tr }}"
                                       data-btn_url_ar="{{ $page->btn_url_ar }}"
                                       data-seo="{{ $page->seo }}"
                                       class='btn btn-primary'><i class='fa fa-edit'></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <th scope='row' class='text-center'></th>
                                <td class='text-center'>
                                    certificates
                                </td>
                                <td class='text-center'>
                                    Сертификаты
                                </td>
                                <td class='text-center'>
                                    -
                                </td>
                                <td class='text-center'>
                                    -
                                </td>
                                <td class="text-center">
                                    <a title="Изменить товар" href='/admin/certificates' type="button"
                                       class='btn btn-primary'><i class='fa fa-edit'></i>
                                    </a>
                                </td>
                            </tr>
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
            var title_ru = button.data('title_ru')
            var title_en = button.data('title_en')
            var title_uz = button.data('title_uz')
            var title_tr = button.data('title_tr')
            var title_ar = button.data('title_ar')
            var text_ru = button.data('text_ru')
            var text_en = button.data('text_en')
            var text_uz = button.data('text_uz')
            var text_tr = button.data('text_tr')
            var text_ar = button.data('text_ar')
            var btn_text_ru = button.data('btn_text_ru')
            var btn_text_en = button.data('btn_text_en')
            var btn_text_uz = button.data('btn_text_uz')
            var btn_text_tr = button.data('btn_text_tr')
            var btn_text_ar = button.data('btn_text_ar')
            var btn_url_ru = button.data('btn_url_ru')
            var btn_url_en = button.data('btn_url_en')
            var btn_url_uz = button.data('btn_url_uz')
            var btn_url_tr = button.data('btn_url_tr')
            var btn_url_ar = button.data('btn_url_ar')
            var seo = button.data('seo')
            var modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #title_ru').val(title_ru)
            modal.find('.modal-body #title_en').val(title_en)
            modal.find('.modal-body #title_uz').val(title_uz)
            modal.find('.modal-body #title_tr').val(title_tr)
            modal.find('.modal-body #title_ar').val(title_ar)
            tinymce.get("text_ru").setContent(text_ru)
            tinymce.get("text_en").setContent(text_en)
            tinymce.get("text_uz").setContent(text_uz)
            tinymce.get("text_tr").setContent(text_tr)
            tinymce.get("text_ar").setContent(text_ar)
            modal.find('.modal-body #btn_text_ru').val(btn_text_ru)
            modal.find('.modal-body #btn_text_en').val(btn_text_en)
            modal.find('.modal-body #btn_text_uz').val(btn_text_uz)
            modal.find('.modal-body #btn_text_tr').val(btn_text_tr)
            modal.find('.modal-body #btn_text_ar').val(btn_text_ar)
            modal.find('.modal-body #btn_url_ru').val(btn_url_ru)
            modal.find('.modal-body #btn_url_en').val(btn_url_en)
            modal.find('.modal-body #btn_url_uz').val(btn_url_uz)
            modal.find('.modal-body #btn_url_tr').val(btn_url_tr)
            modal.find('.modal-body #btn_url_ar').val(btn_url_ar)
            modal.find('.modal-body #seo').val(seo)
            setTimeout(function () {
                $('#title').focus();
            }, 500);
        })
    </script>
@stop
