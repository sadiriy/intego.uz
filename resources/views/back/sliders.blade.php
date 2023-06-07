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
                                <input name="image_url_ru" id="image_url_ru" type="file" class="form-control">
                                <figure>
                                    <img width="120px" height="50px" id="image-icon" src="{{ $sliders->image_url_ru }}">
                                </figure>
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Изображение EN</label>
                                <input name="image_url_en" id="image_url_en" type="file" class="form-control">
                                <figure>
                                    <img width="120px" height="50px" id="image-icon" src="{{ $sliders->image_url_en }}">
                                </figure>
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Изображение UZ</label>
                                <input name="image_url_uz" id="image_url_uz" type="file" class="form-control">
                                <figure>
                                    <img width="120px" height="50px" id="image-icon" src="{{ $sliders->image_url_uz }}">
                                </figure>
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Изображение TR</label>
                                <input name="image_url_tr" id="image_url_tr" type="file" class="form-control">
                                <figure>
                                    <img width="120px" height="50px" id="image-icon" src="{{ $sliders->image_url_tr }}">
                                </figure>
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Изображение AR</label>
                                <input name="image_url_ar" id="image_url_ar" type="file" class="form-control">
                                <figure>
                                    <img width="120px" height="50px" id="image-icon" src="{{ $sliders->image_url_ar }}">
                                </figure>
                            </div>
                            <div class="input-group input-group-sm" style="flex-direction: column">
                                <label style="margin-bottom: 10px;">Видео баннер</label>
                                <a href="{{ route('sliders.is_video', $sliders) }}">
                                    @if ($sliders->is_video == 1)
                                        <i style="font-size: 25pt; color: green;" class="fas fa-toggle-on"></i>
                                    @elseif ($sliders->is_video == 0)
                                        <i style="font-size: 25pt; color: grey;" class="fas fa-toggle-off"></i>
                                    @else
                                        <p style="color: red;">Err:404</p>
                                    @endif
                                </a>
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Видео баннер RU</label>
                                <input name="video_url_ru" id="video_url_ru" type="file" class="form-control">
                                <figcaption><a target="_blank" href="{{ $sliders->video_url_ru }}" id="">{{ $sliders->video_url_ru }}</a></figcaption>
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Видео баннер EN</label>
                                <input name="video_url_uz" id="video_url_uz" type="file" class="form-control">
                                <figcaption><a target="_blank" href="{{ $sliders->video_url_en }}" id="">{{ $sliders->video_url_en }}</a></figcaption>
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Видео баннер UZ</label>
                                <input name="video_url_en" id="video_url_en" type="file" class="form-control">
                                <figcaption><a target="_blank" href="{{ $sliders->video_url_uz }}" id="">{{ $sliders->video_url_uz }}</a></figcaption>
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Видео баннер TR</label>
                                <input name="video_url_tr" id="video_url_tr" type="file" class="form-control">
                                <figcaption><a target="_blank" href="{{ $sliders->video_url_tr }}" id="">{{ $sliders->video_url_tr }}</a></figcaption>
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Видео баннер AR</label>
                                <input name="video_url_tr" id="video_url_tr" type="file" class="form-control">
                                <figcaption><a target="_blank" href="{{ $sliders->video_url_ar }}" id="">{{ $sliders->video_url_ar }}</a></figcaption>
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
