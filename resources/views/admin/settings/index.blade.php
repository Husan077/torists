@extends('layouts.admin')

@section('title')
    Настройки сайта
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Настройки сайта</h1>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('settings.update', 1) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="row">

                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Мета теги</label>
                                    <input class="form-control" name="meta_keywords" value="{{ $setting->meta_keywords ?? ''}}" type="text" placeholder="Введите мета теги для сайта">
                                </div>

                                <hr style="width: 95%; color: red">

                                <div class="col-xl-4 col-lg-4 col-md-4 form-group mb-3">
                                    <label>Мета описание (uz)</label>
                                    <input class="form-control" name="meta_description_uz" value="{{ $setting->meta_description_uz ?? '' }}" type="text" placeholder="Введите мета описание для сайта на узбекском">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Мета описание (ru)</label>
                                    <input class="form-control" name="meta_description_ru" value="{{ $setting->meta_description_ru ?? '' }}" type="text" placeholder="Введите мета описание для сайта на русском">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Мета описание (en)</label>
                                    <input class="form-control" name="meta_description_en" value="{{ $setting->meta_description_en ?? '' }}" type="text" placeholder="Введите мета описание для сайта на английском">
                                </div>

                                <hr style="width: 95%; color: red">

                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Введите Email</label>
                                    <input class="form-control" name="email" value="{{ $setting->email ?? '' }}" type="email" placeholder="Введите email">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Номер 1</label>
                                    <input class="form-control" name="phone_1" value="{{ $setting->phone_1 ?? ''}}" type="text" placeholder="Введите 1-ый номер телефона">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Номер 2</label>
                                    <input class="form-control" name="phone_2" value="{{ $setting->phone_2 ?? ''}}" type="text" placeholder="Введите 2-ой номер телефона">
                                </div>

                                <hr style="width: 95%; color: red">

                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Instagram</label>
                                    <input class="form-control" name="instagram" value="{{ $setting->instagram ?? '' }}" type="text" placeholder="Введите Instagram аккаунт">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Telegram</label>
                                    <input class="form-control" name="telegram" value="{{ $setting->telegram ?? '' }}" type="text" placeholder="Введите Telegram аккаунт">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Facebook</label>
                                    <input class="form-control" name="facebook" value="{{ $setting->facebook ?? '' }}" type="text" placeholder="Введите Facebook аккаунт">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>YouTube</label>
                                    <input class="form-control" name="youtube" value="{{ $setting->youtube ?? '' }}" type="text" placeholder="Введите YouTube аккаунт">
                                </div>
{{--                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">--}}
{{--                                    <label>TikTok</label>--}}
{{--                                    <input class="form-control" name="youtube" value="{{ $setting->tiktok ?? '' }}" type="text" placeholder="Введите TikTok аккаунт">--}}
{{--                                </div>--}}

                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
