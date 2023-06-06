@extends('layouts.admin')

@section('title')
    Баннер
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Настройка баннера</h1>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('banners.update', 1) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row">

                                <div class="col-xl-4 col-lg-4 col-md-4 form-group mb-3">
                                    <label>Заголовок 1 (uz)</label>
                                    <input class="form-control" name="title_1_uz"
                                           value="{{ $banners->title_1_uz ?? '' }}" type="text"
                                           placeholder="Введите заголовок на узбекском">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 form-group mb-3">
                                    <label>Заголовок 1 (ru)</label>
                                    <input class="form-control" name="title_1_ru"
                                           value="{{ $banners->title_1_ru ?? '' }}" type="text"
                                           placeholder="Введите заголовок на русском">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 form-group mb-3">
                                    <label>Заголовок 1 (en)</label>
                                    <input class="form-control" name="title_1_en"
                                           value="{{ $banners->title_1_en ?? '' }}" type="text"
                                           placeholder="Введите заголовок на английском">
                                </div>

                                <hr style="width: 95%; color: red">

                                <div class="col-xl-4 col-lg-4 col-md-4 form-group mb-3">
                                    <label>Заголовок 2 (uz)</label>
                                    <input class="form-control" name="title_2_uz"
                                           value="{{ $banners->title_2_uz ?? '' }}" type="text"
                                           placeholder="Введите заголовок на узбекском">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 form-group mb-3">
                                    <label>Заголовок 2 (ru)</label>
                                    <input class="form-control" name="title_2_ru"
                                           value="{{ $banners->title_2_ru ?? '' }}" type="text"
                                           placeholder="Введите заголовок на русском">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 form-group mb-3">
                                    <label>Заголовок 2 (en)</label>
                                    <input class="form-control" name="title_2_en"
                                           value="{{ $banners->title_2_en ?? '' }}" type="text"
                                           placeholder="Введите заголовок на английском">
                                </div>

                                <hr style="width: 95%; color: red">

                                <div class="col-xl-6 col-lg-6 col-md-6 col-12 form-group mb-3"
                                     style="padding-top:30px;">
                                    <strong>Выберите изображению:</strong>
                                    <br/>
                                    <input type="file" name="image">
                                </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 form-group mb-3">
{{--                                        <img src="{{ asset( 'storage/' . $banners->image) }}" class="img-fluid"--}}
{{--                                             style="width: 250px;" alt="Здесь должна быть изображения">--}}
                                        <img src="{{ asset('storage/banners/' . $banners->image) }}" class="img-fluid" style="width: 250px;" alt="{{ asset('storage/banners/' . $banners->image) }}">
                                    </div>

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
