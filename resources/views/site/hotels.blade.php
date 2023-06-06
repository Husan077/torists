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
    <script src="https://api-maps.yandex.ru/2.1/?apikey=563b2f5b-d161-4fd9-a856-d9492d0ba468&lang=ru_RU"
            type="text/javascript">
    </script>
@endsection

@section('content')

    <section class="breadcrumb-wrap style2 bg-heath">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                    <div class="breadcrumb-title">
                        <h2>@lang('main.hotels')</h2>
                        <ul class="breadcrumb-menu">
                            <li><a href="{{ route('home') }}">@lang('main.main') </a>
                                <i class="las la-angle-double-right"></i>
                            </li>
                            <li>@lang('main.hotels')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="recommend-tour-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="rec-wrap">
                        @foreach($hotels as $hotel)
                            <div class="recommend-tour-item style2">
                                <div class="recommend-tour-bg bg-f"
                                     style="background-image: url('{{ asset('storage/' . $hotel->image_1) }}');"></div>
                                <div class="recommend-tour-info">
                                    <h4>
                                        <a href="{{ route('hotels_details', $hotel) }}">{{ $hotel->{'title_' . $locale} }}</a>
                                    </h4>
                                    <p>
                                        <a href="{{ route('hotels_details', $hotel) }}">{!! \Illuminate\Support\Str::words($hotel->{'text_' . $locale}, 10) !!}</a>
                                    </p>
                                    <a class="link" href="{{ route('hotels_details', $hotel) }}">
                                        @lang('main.more')
                                        <i class="ri-logout-circle-r-line"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container px-0 bg-heath newsletter">
        <div class="newsletter-wrap style2">
            <div class="dot-shape sm-none"><img src="{{ asset('./images/site/dot-shape.svg') }}" alt="Image"/></div>
            <div class="curve-shape sm-none"><img src="{{ asset('./images/site/curve.png') }}" alt="Image"/></div>
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-5 col-md-5">
                    <div class="newsletter-img"><img src="{{ asset('./images/site/newsletter-img-1.png') }}"
                                                     alt="Image"/></div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-7 offset-lg-0 col-md-7">
                    <div class="newsletter-form style1">
                        <h3>
                            @lang('main.leave_request')
                        </h3>
                        <p>@lang('main.contact_you')</p>
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <div class="form-group mb-20">
                                <input name="name" type="text" placeholder="@lang('main.full_name')"/>
                            </div>
                            <div class="form-group mb-20">
                                <input name="phone" type="tel" placeholder="@lang('main.phone_number')"/>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn v5">@lang('main.send')
                                    <i class="ri-logout-circle-r-line"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    <div class="preloader js-preloader"><img src="/images/preloader.gif" alt="Image"/></div>--}}
@endsection
