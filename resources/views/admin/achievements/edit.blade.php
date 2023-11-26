@extends('layouts.admin')

@section('title')
    Редактирование достижения
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Редактирование достижения</h1>
            <ul>
                <li><a href="{{ route('achievements.index') }}">Все достижении</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('achievements.update', $achievements->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row">

                                <div class="col-xl-4 col-lg-4 col-md-4 col-md-6 col-12 form-group mb-3">
                                    <label>Иконка (<a target="_blank" href="https://www.flaticon.com">Можете
                                            скачать или взять отсюда</a>)</label>
                                    <input class="form-control @error('icon') is-invalid @enderror"
                                           value="{{ $achievements->icon }}" autocomplete="off"
                                           placeholder="Введите код иконки" name="icon" type="text">
                                    @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <hr style="width: 95%; color: red">

                                <div class="col-xl-4 col-lg-4 col-md-4 col-md-6 col-12 form-group mb-3">
                                    <label>Заголовок (uz)</label>
                                    <input class="form-control @error('title_uz') is-invalid @enderror"
                                           value="{{ $achievements->title_uz }}" autocomplete="off"
                                           placeholder="Например: Напишите заголовок на узбекском языке" name="title_uz"
                                           type="text">
                                    @error('title_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-md-6 col-12 form-group mb-3">
                                    <label>Заголовок (ru)</label>
                                    <input class="form-control @error('title_ru') is-invalid @enderror"
                                           value="{{ $achievements->title_ru }}" autocomplete="off"
                                           placeholder="Например: Напишите заголовок на русском языке" name="title_ru"
                                           type="text">
                                    @error('title_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-md-6 col-12 form-group mb-3">
                                    <label>Заголовок (en)</label>
                                    <input class="form-control @error('title_en') is-invalid @enderror"
                                           value="{{ $achievements->title_en }}" autocomplete="off"
                                           placeholder="Например: Напишите заголовок на английском языке"
                                           name="title_en" type="text">
                                    @error('title_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <hr style="width: 95%; color: red">

                                <div class="col-xl-4 col-lg-4 col-md-4 col-md-6 col-12 form-group mb-3">
                                    <label>Описания (uz)</label>
                                    <textarea  placeholder="Напишите описания на узбекском языке"
                                              class="form-control @error('text_uz') is-invalid @enderror" name="text_uz"
                                              cols="30" rows="10">{{ $achievements->text_uz }}</textarea>
                                    @error('text_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-md-6 col-12 form-group mb-3">
                                    <label>Описания (ru)</label>
                                    <textarea  placeholder="Напишите описания на русском языке"
                                              class="form-control @error('text_ru') is-invalid @enderror" name="text_ru"
                                              cols="30" rows="10">{{ $achievements->text_uz }}</textarea>
                                    @error('text_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-md-6 col-12 form-group mb-3">
                                    <label>Описания (en)</label>
                                    <textarea placeholder="Напишите описания на английском языке"
                                              class="form-control @error('text_en') is-invalid @enderror" name="text_en"
                                              cols="30" rows="10">{{ $achievements->text_en }}</textarea>
                                    @error('text_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <hr style="width: 95%; color: red">

                                <div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-12 form-group mb-3" style="padding-top:30px;">
                                    <strong>Выберите изображению: <span style="color: red">(Если поставили иконку, то не надо загрузить фото !!!</span>)</strong>
                                    <br/>
                                    <input type="file" name="image">
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-12 form-group mb-3">
                                    <img src="{{ asset( 'storage/' . $achievements->image) }}" class="img-fluid"
                                         style="width: 250px;">
                                </div>

                                <hr style="width: 95%; color: red">


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

