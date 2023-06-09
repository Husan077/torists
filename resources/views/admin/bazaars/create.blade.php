@extends('layouts.admin')

@section('title')
    Добавить новый базар
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Добавить новый базар</h1>
            <ul>
                <li><a href="{{ route('bazaars.index') }}">Все базары</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('bazaars.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Заголовок (uz)</label>
                                    <input class="form-control @error('title_uz') is-invalid @enderror" name="title_uz"
                                           value="{{ old('title_uz') }}" type="text" placeholder="Введите название на узбекском">
                                    @error('title_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Заголовок (ru)</label>
                                    <input class="form-control @error('title_ru') is-invalid @enderror" name="title_ru"
                                           value="{{ old('title_ru') }}" type="text" placeholder="Введите название на русском">
                                    @error('title_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Заголовок (en)</label>
                                    <input class="form-control @error('title_en') is-invalid @enderror" name="title_en"
                                           value="{{ old('title_en') }}" type="text" placeholder="Введите название на английском">
                                    @error('title_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <hr style="width: 95%; color: red">

                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Описание (uz)</label>
                                    <script src="{{ asset('js/admin/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('text_uz') is-invalid @enderror" value="{{ old('text_uz') }}" name="text_uz"></textarea>
                                    <script>
                                        CKEDITOR.replace('text_uz', {
                                            filebrowserUploadUrl: "{{ route('admin.hotels.upload', ['_token' => csrf_token() ]) }}",
                                            filebrowserUploadMethod: 'form'
                                        }
                                        );
                                    </script>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Описание (ru)</label>
                                    <script src="{{ asset('js/admin/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('text_ru') is-invalid @enderror" value="{{ old('text_ru') }}" name="text_ru"></textarea>
                                    <script>
                                        CKEDITOR.replace('text_ru', {
                                            filebrowserUploadUrl: "{{ route('admin.hotels.upload', ['_token' => csrf_token() ]) }}",
                                            filebrowserUploadMethod: 'form'
                                        }
                                        );
                                    </script>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Описание (en)</label>
                                    <script src="{{ asset('js/admin/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control @error('text_en') is-invalid @enderror" value="{{ old('text_en') }}" name="text_en"></textarea>
                                    <script>
                                        CKEDITOR.replace('text_en', {
                                                filebrowserUploadUrl: "{{ route('admin.hotels.upload', ['_token' => csrf_token() ]) }}",
                                                filebrowserUploadMethod: 'form'
                                            }
                                        );
                                    </script>
                                </div>

                                <div class="col-xl-8 col-lg-8 col-md-8 col-12 form-group mb-3"></div>
                                <hr style="width: 95%; color: red">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-12 form-group mt-3"><h4>Яндекс карта <span style="font-size: 13px"> (если есть Google карта, то Яндекс карта не надо!!!)</span></h4></div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Latitude</label>
                                    <input class="form-control @error('ltd') is-invalid @enderror" name="ltd"
                                           value="{{ old('ltd') }}" type="text" placeholder="41.297122">
                                    @error('ltd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-12 form-group mb-3">
                                    <label>Longitude </label>
                                    <input class="form-control @error('lng') is-invalid @enderror" name="lng"
                                           value="{{ old('lng') }}" type="text" placeholder="69.216046">
                                    @error('lng')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <hr style="width: 95%; color: red">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-12 form-group mt-3"><h4>Google карта <span style="font-size: 13px"> (если есть Яндекс карта, то Google карта не надо!!!)</span></h4></div>


                                <div class="col-xl-12 col-lg-12 col-md-12 col-12 form-group mb-3">
                                    <textarea value="{{ old('location') }}" class="form-control @error('location') is-invalid @enderror" name="location" cols="30" rows="10"></textarea>
                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <hr style="width: 95%; color: red">

                                <div class="col-6 form-group mb-3" style="padding-top:30px;">
                                    <strong>Выберите изображению: (Для главного) <br> <span style="font-size: 11px; color: #967f7f">Изображения не должна превышать 5 MB</span></strong>
                                    <br/>
                                    <input class="request @error('image_1') is-invalid @enderror" type="file" name="image_1">
                                    @error('image_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="font-size: 12px">Изображения не должна превышать 5 MB</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-6 form-group mb-3" style="padding-top:30px;">
                                    <strong>Выберите изображению: (Для бекграунда) <br> <span style="font-size: 11px; color: #967f7f">Изображения не должна превышать 5 MB</span>  </strong>
                                    <br/>
                                    <input class="request @error('image_2') is-invalid @enderror" type="file" name="image_2">
                                    @error('image_2')
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
