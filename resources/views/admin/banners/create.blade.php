@extends('layouts.admin')

@section('title')
    Добавить новый баннер
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Добавить новый баннер</h1>
            <ul>
                <li><a href="{{ route('banners.index') }}">Все баннеры</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <h5>Выберите только одну баннер</h5>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-xl-4 col-lg-4 col-md-4 form-group mb-3">
                                    <label>Заголовок 1 (uz)</label>
                                    <input class="form-control" name="title_1_uz"
                                           value="{{ old('title_1_uz') }}" type="text"
                                           placeholder="Введите заголовок на узбекском">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 form-group mb-3">
                                    <label>Заголовок 1 (ru)</label>
                                    <input class="form-control" name="title_1_ru"
                                           value="{{ old('title_1_ru') }}" type="text"
                                           placeholder="Введите заголовок на русском">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 form-group mb-3">
                                    <label>Заголовок 1 (en)</label>
                                    <input class="form-control" name="title_1_en"
                                           value="{{ old('title_1_en') }}" type="text"
                                           placeholder="Введите заголовок на английском">
                                </div>

                                <hr style="width: 95%; color: red">

                                <div class="col-xl-4 col-lg-4 col-md-4 form-group mb-3">
                                    <label>Заголовок 2 (uz)</label>
                                    <input class="form-control" name="title_2_uz"
                                           value="{{ old('title_2_uz') }}" type="text"
                                           placeholder="Введите заголовок на узбекском">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 form-group mb-3">
                                    <label>Заголовок 2 (ru)</label>
                                    <input class="form-control" name="title_2_ru"
                                           value="{{ old('title_2_ru') }}" type="text"
                                           placeholder="Введите заголовок на русском">
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 form-group mb-3">
                                    <label>Заголовок 2 (en)</label>
                                    <input class="form-control" name="title_2_en"
                                           value="{{ old('title_2_en') }}" type="text"
                                           placeholder="Введите заголовок на английском">
                                </div>

                                <hr style="width: 95%; color: red">

                                <div class="col-xl-6 col-lg-6 col-md-6 col-12 form-group mb-3" style="padding-top:30px;">
                                    <strong>Выберите изображению:<br> <span style="font-size: 11px; color: #967f7f">Изображения не должна превышать 5 MB</span>  </strong>
                                    <br/>
                                    <input class="request @error('image') is-invalid @enderror" type="file" name="image">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="font-size: 12px">Изображения не должна превышать 5 MB</strong>
                                    </span>
                                    @enderror
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

