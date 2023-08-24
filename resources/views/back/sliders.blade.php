@extends('layouts.admin')
@section('title')
    Слайдер
@stop

@section('content')

    {{--TABLE--}}
    <div class="container" align="center">
        <div class="starter-template">
            <h1>Слайдер</h1>
            <div class='edit-opr' style="max-width: 600px">
                <div class='container'>
                    <div class='row'>
                        <div class='col'></div>
                        <div class='col'></div>
                        <div class='col' style='text-align: right; margin-right: 20px;'>
                            <a title="Назад" href='{{ route('settings.index') }}' class='btn btn-dark sub'><i
                                    class='fa fa-arrow-left'></i></a>
                        </div>
                    </div>
                    <form class="form_style" action="{{ route('sliders.store') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="modal-body" style="text-align: left;">
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Изображение RU</label>
                                <input name="slide_image" id="slide_image" type="file" class="form-control">
                                <figure>
                                    <img width="120px" height="50px" id="image-icon" src="{{ asset($sliders->slide_image) }}">
                                </figure>
                            </div>
                        </div>
                        <div class="modal-footer" style="border: none;">
                            <button type="submit" class="btn btn-success sub">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@stop
