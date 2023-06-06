@extends('layouts.site')

@section('meta')
    {{--    <title>Rollo.uz - @lang('main.jalyuzi')</title>--}}
    {{--    <meta name="robots" content="index, follow">--}}
    {{--    <meta property="keywords" content="{{ $settings->meta_keywords }}"/>--}}
    {{--    <meta property="description" content="{{ $settings->{ 'meta_description_' . $locale} }}"/>--}}
    {{--    <meta property="og:title" content="Rollo.uz - @lang('main.jalyuzi')"/>--}}
    {{--    <meta property="og:keywords" content="{{ $settings->meta_keywords }}"/>--}}
    {{--    <meta property="og:description" content="{{ $settings->{ 'meta_description_' . $locale} }}"/>--}}
    {{--    <meta property="og:type" content="website"/>--}}
    {{--    <meta property="og:image" content="{{ asset('images/logo/logo_blue.png') }}"/>--}}
    {{--    <link rel="image_src" href="{{ asset('images/logo/logo_blue.png') }}"/>--}}
    {{--    <script src="https://api-maps.yandex.ru/2.1/?apikey=563b2f5b-d161-4fd9-a856-d9492d0ba468&lang=ru_RU"--}}
    {{--            type="text/javascript">--}}
    {{--    </script>--}}
    <script src="https://api-maps.yandex.ru/2.1/?apikey=563b2f5b-d161-4fd9-a856-d9492d0ba468&lang=ru_RU"
            type="text/javascript"></script>

@endsection

@section('content')

    <section class="breadcrumb-wrap style2 bg-heath">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                    <div class="breadcrumb-title">
                        <h2>{{ $bazaar->{'title_' . $locale} }}</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{ route('home') }}">@lang('main.main') </a>
                                <i class="las la-angle-double-right"></i>
                            </li>
                            <li>@lang('main.bazaars')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tour-details-wrap pb-100">
        <div class="container pt-100">
            <div class="row gx-5">
                <div class="col-xl-2 col-lg-2 col-md-12 col-12"></div>
                <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                    <div class="tour-details-info">
                        <div class="single-img">
                            <img src="{{ asset('storage/' . $bazaar->image_2) }}"/>
                        </div>
                        <p>{!! $bazaar->{'text_' . $locale} !!}</p>

                        @if($bazaar->location)
                            {!!  $bazaar->location  !!}
                        @elseif($bazaar->lng || $bazaar->ltd)
                            <div class="map" id="map"
                                 style="position:relative;overflow:hidden; width: 100%; height: 400px"></div>
                            <script>
                                var placemarks = [
                                    {
                                        latitude: {{$bazaar->ltd}},
                                        longitude: {{$bazaar->lng}},
                                        {{--hintContent: '{{$bazaar->{'address_' . $locale} }}',--}}
                                        {{--balloonContent: '{{$bazaar->phone }}',--}}
                                    },
                                ];

                                ymaps.ready(init);

                                function init() {
                                    var Map = new ymaps.Map("map", {
                                        center: [41.316096, 69.263496],
                                        zoom: 10,
                                        controls: ['zoomControl', 'geolocationControl', 'routeEditor', 'fullscreenControl']
                                    });
                                    placemarks.forEach(function (obj) {
                                        var placemark = new ymaps.Placemark([obj.latitude, obj.longitude], {
                                                // hintContent: obj.hintContent,
                                                // balloonContent: obj.balloonContent,
                                            },
                                            {
                                                preset: 'islands#redIcon',
                                            });
                                        Map.geoObjects.add(placemark);
                                    });
                                }
                            </script>
                        @else

                        @endif
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-12 col-12"></div>
            </div>
        </div>
    </section>
    <!-- <div class="preloader js-preloader"><img src="/images/preloader.gif" alt="Image" /></div> -->
@endsection
