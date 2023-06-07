@extends('layouts.admin')
@section('title')
    Основные
@stop

@section('content')

    {{--TABLE--}}
    <div class="container" align="center">
        <div class="starter-template">
            <h1>Основные</h1>
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
                    <form class="form_style" action="{{ route('general.store') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="modal-body" style="text-align: left;">
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Номер телефона</label>
                                <input name="phone" id="phone" type="text" class="form-control" value="{{ $general->phone }}">
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Электронная почта</label>
                                <input name="email" id="email" type="text" class="form-control" value="{{ $general->email }}">
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Логотип</label>
                                <input name="logo" id="logo" type="file" class="form-control">
                                <figure>
                                    <img width="220px" height="50px" id="image-icon" src="/{{ $general->logo }}">
                                </figure>
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Логотип (белый)</label>
                                <input name="logo_white" id="logo_white" type="file" class="form-control">
                                <figure>
                                    <img width="220px" height="50px" id="image-icon" style="background-color: black; padding: 10px" src="/{{ $general->logo_white }}">
                                </figure>
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Facebook</label>
                                <input name="fb_link" id="fb_link" type="text" class="form-control" value="{{ $general->fb_link }}">
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Telegram</label>
                                <input name="tg_link" id="tg_link" type="text" class="form-control" value="{{ $general->tg_link }}">
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">WhatsApp</label>
                                <input name="wa_link" id="wa_link" type="text" class="form-control" value="{{ $general->wa_link }}">
                            </div>
                            <div class="input-group input-group-sm">
                                <label style="margin-bottom: 10px;">Linked In</label>
                                <input name="li_link" id="li_link" type="text" class="form-control" value="{{ $general->li_link }}">
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
