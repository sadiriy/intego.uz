@extends('layouts.admin')
@section('title')
    Страница
@stop

@section('content')

    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

    <script>tinymce.init({
            selector:'textarea',
            plugins: 'code',
            toolbar: 'code',});
    </script>

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
                    <form class="form_style" action="{{ route('pages.store') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="modal-body" style="text-align: left;">
                            <div class="input-group input-group-sm">
                                <input name="id" id="id" type="hidden" class="form-control" value="{{ $page_items->id ?? '' }}">
                            </div>

                            {{--Page Title--}}
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Заголовок RU</label>
                                <input name="title_ru" id="title_ru" type="text" class="form-control" required value="{{ $page_items->title_ru ?? '' }}">
                            </div>

                            {{--Page URL--}}
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Адрес страницы</label>
                                <input name="url" id="url" type="text" class="form-control" required value="{{ $page_items->url ?? '' }}">
                            </div>

                            {{--Page Content--}}
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Текст страницы RU</label>
                                <textarea name="text_ru" id="text_ru" type="text" class="form-control">{{ $content ?? '' }}</textarea>
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
    </div>

    <script>

        setTimeout(function () {
            $('#title_ru').focus();
            }, 500);
    </script>
@stop
