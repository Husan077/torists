@extends('layouts.site')


{{--@section('meta')--}}
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
{{--@endsection--}}

@section('content')


@isset($banner)
    @foreach($banners as $banner)
        <div class="hero-wrap style2"
             @isset($banner->image) style="background-image: url('{{ 'storage/' . $banner->image }}');" @endisset>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-7 col-lg-8">
                        <div class="hero-content style2 text-left">
                            @isset($banner->{'title_1_' . $locale})
                                <h1>{{ $banner->{'title_1_' . $locale} }}
                                    <br/>
                                    <span>{{ $banner->{'title_2_' . $locale} }}</span>
                                </h1>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endisset
    <div class="promo-wrap pt-100 pb-70 z-0 undefined">
        <div class="container">
            <div class="row">
                @foreach($achievements as $achievement)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="promo-item style2">
                            @if($achievement->icon)
                                <div class="promo-icon">
                                    <i class="{{ $achievement->icon }}"></i>
                                </div>
                            @elseif($achievement->image)
                                <div class="promo-icon">
                                    <img src="{{ asset('storage/' . $achievement->image) }}"
                                         alt="{{ $achievement->{ 'title_' . $locale } }}">
                                </div>
                            @elseif($achievement->icon==null || $achievement->image=null)
                                <div class="promo-icon">
                                    <i class="flaticon-discount"></i>
                                </div>
                            @endif
                            <div class="promo-content">
                                <h4>{{ $achievement->{ 'title_' . $locale } }}</h4>
                                <p>{{ $achievement->{ 'text_' . $locale } }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <section class="recommend-tour-area bg-heath ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center style4 mb-40"><span>@lang('main.our_all')</span>
                        <h2>@lang('main.attractions')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="rec-wrap">
                        @foreach($attractions as $attraction)
                            <div class="recommend-tour-item style2">
                                <div class="recommend-tour-bg bg-f"
                                     style="background-image: url('{{ asset('storage/' . $attraction->image_1) }}');"></div>
                                <div class="recommend-tour-info">
                                    <h4>
                                        <a href="{{ route('attractions_details', $attraction) }}">{{ $attraction->{'title_' . $locale} }}</a>
                                    </h4>
                                    <p>
                                        <a href="{{ route('attractions_details', $attraction) }}">{!! \Illuminate\Support\Str::words($attraction->{'text_' . $locale}, 10) !!}</a>
                                    </p>
                                    <a class="link" href="{{ route('attractions_details', $attraction) }}">
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

    <div class="ptb-100">
        <section class="feature-wrap">
            <div class="container">
                <div class="row mb-40 align-items-end">
                    <div class="col-md-12">
                        <div class="section-title style4 text-center"><span>@lang('main.best')</span>
                            <h2>@lang('main.hotels')</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($hotels as $hotel)
                        <div class="col-xl-6 col-lg-12">
                            <div class="feature-tour-card style2">
                                <div class="row gx-0">
                                    <div class="col-md-6">
                                        <a href="{{ route('hotels_details', $hotel) }}">
                                            <div class="feature-tour-img feature-bg-1 bg-f"
                                                 style="background-image: url('{{ 'storage/' . $hotel->image_1 }}');"></div>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="feature-tour-info">
                                            <h4>
                                                <a href="{{ route('hotels_details', $hotel) }}">{{ $hotel->{'title_' . $locale} }}</a>
                                            </h4>
                                            <p>
                                                {!! \Illuminate\Support\Str::words($hotel->{'text_' . $locale}, 10) !!}
                                            </p>
                                            <span class="feature-tour-price">{{ $hotel->price }} UZS</span>
                                            <div class="feature-tour-option">
                                                <a class="link style1"
                                                   href="{{ route('hotels_details', $hotel) }}">
                                                    @lang('main.more')
                                                    <i class="ri-logout-circle-r-line"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row mt-30">
                    <div class="col-12 text-center">
                        <a class="btn v2" href="/tours/">
                            @lang('main.all_tours')
                            <i class="ri-logout-circle-r-line"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="adventure-tour-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title style4 text-center mb-40"><span>@lang('main.top')</span>
                        <h2>@lang('main.restaurants')</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="tour-slider-wrap pb-100">
        <div class="tour-slider-v3">
            <div class="tour-slider-v1 undefined owl-theme">
                <div class="owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                             style="transform: translate3d(-5128px, 0px, 0px); transition: all 0.5s ease 0s; width: 10256px;">
                            @foreach($restaurants as $restaurant)
                                <div class="owl-item tour-slide_item bg-f"
                                     style="background-image: url('{{ 'storage/' . $restaurant->image_1 }}'); width: 1262px; margin-right: 20px;">
                                    <div class="tour-slide-info">
                                        <div class="single-tour-info style3">
                                            <div class="tour-details">
                                                <h4>{{ $restaurant->{'title_' . $locale} }}</h4>
                                                <p>{!! $restaurant->{'text_' . $locale} !!}</p>
                                                <a class="link"
                                                   href="{{ route('restaurants_details', $restaurant) }}">
                                                    @lang('main.more')
                                                    <i class="ri-logout-circle-r-line"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <section class="adventure-tour-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title style4 text-center mb-40"><span>@lang('main.our_all1')</span>
                        <h2>@lang('main.bazaars')</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="tour-slider-v1 undefined owl-theme"></div>

    <div class="tour-slider-v1 undefined owl-theme pb-100">
        <div class="owl-carousel owl-theme owl-loaded owl-drag">
            <div class="owl-stage-outer">
                <div class="owl-stage"
                     style="transform: translate3d(-5128px, 0px, 0px); transition: all 0.5s ease 0s; width: 10256px;">
                    @foreach($bazaars as $bazaar)
                        <div class="owl-item" style="width: 1262px; margin-right: 20px;">
                            <div class="tour-details-item bg-f style1"
                                 style="background-image: url('{{ 'storage/' . $bazaar->image_1 }}');">
                                <div class="single-tour-info style4">
                                    <div class="tour-details">
                                        <a href="{{ route('bazaars_details', $bazaar) }}">
                                            <h4>{{ $bazaar->{'title_' . $locale} }}</h4>
                                        </a>
                                        <p> {!! \Illuminate\Support\Str::words($bazaar->{'text_' . $locale}, 10) !!}</p>
                                    </div>
                                    <div class="tour-btn">
                                        <a class="btn v3" href="{{ route('bazaars_details', $bazaar) }}">
                                            @lang('main.more')
                                            <i class="ri-logout-circle-r-line"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="owl-nav disabled">
                <div class="owl-prev">prev</div>
                <div class="owl-next">next</div>
            </div>
        </div>
    </div>



    <div class="container px-0 bg-heath newsletter">
        <div class="newsletter-wrap style2">
            <div class="dot-shape sm-none"><img src="{{ asset('./images/site/dot-shape.svg') }}" alt="Image"/>
            </div>
            <div class="curve-shape sm-none"><img src="{{ asset('./images/site/curve.png') }}" alt="Image"/>
            </div>
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
                            <div class="form-group mb-20">
                                <textarea style="border-radius: 5%" name="message" cols="30" rows="10"></textarea>
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

    {{--    <div class="preloader js-preloader"><img src="./images/site/preloader.gif" alt="Image" /></div>--}}
@endsection
