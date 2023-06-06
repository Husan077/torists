<div class="body_overlay"></div>
<header class="header-wrap style2">
    <div class="header-bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-5">
                    <div class="logo v2">
{{--                        <a class="" href="/">--}}
{{--                            <img src="{{ asset('./images/site/logo.png') }}" alt="Image"/>--}}
{{--                        </a>--}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-9 col-7 order-lg-1 order-md-2 order-2">
                    <div class="main-menu-wrap">
                        <div class="menu-close xl-none"><a><i class="las la-times"></i></a></div>
                        <div id="menu">
                            <ul class="main-menu">
                                <li><a href="{{ route('home') }}">@lang('main.main')</a>
                                    <span class="menu-expand">
                                                <i class="las la-angle-down"></i>
                                    </span>
                                </li>
                                <li class="has-children">
                                    <a>@lang('main.attractions') </a>
                                    <span class="menu-expand">
                                                <i class="las la-angle-down"></i>
                                            </span>
                                    <ul class="sub-menu">
                                        @foreach($attractions as $attraction)
                                            <li>
                                                <a href="{{ route('attractions_details', $attraction->slug) }}">{{ $attraction->{'title_' . $locale} }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="has-children"><a>@lang('main.hotels')</a>
                                    <span class="menu-expand">
                                                <i class="las la-angle-down"></i>
                                            </span>
                                    <ul class="sub-menu">
                                        @foreach($hotels as $hotel)
                                            <li>
                                                <a href="{{ route('hotels_details', $hotel->slug) }}">{{ $hotel->{'title_' . $locale} }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a>@lang('main.restaurants')</a>
                                    <span class="menu-expand">
                                        <i class="las la-angle-down"></i>
                                    </span>
                                    <ul class="sub-menu">
                                        @foreach($restaurants as $restaurant)
                                            <li>
                                                <a href="{{ route('restaurants_details', $restaurant->slug) }}">{{ $restaurant->{'title_' . $locale} }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a>@lang('main.bazaars')</a>
                                    <span class="menu-expand">
                                                <i class="las la-angle-down"></i>
                                            </span>
                                    <ul class="sub-menu">
                                        @foreach($bazaars as $bazaar)
                                            <li>
                                                <a href="{{ route('bazaars_details', $bazaar->slug) }}">{{ $bazaar->{'title_' . $locale} }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a class="">{{ LaravelLocalization::getCurrentLocaleName() }}</a>
                                    <span class="menu-expand">
                                        <i class="las la-angle-down"></i>
                                    </span>
                                    <ul class="sub-menu">
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode)
                                            <li>
                                                <a hreflang="{{ $localeCode['link'] }}"
                                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode['link'], null, [], true) }}">{{ $localeCode['native'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-bar-wrap">
                        <div class="sidebar-menu xl-none"><span class="ri-menu-3-line"></span></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 order-lg-2 order-md-1 md-none">
                    <div class="header-bottom-right">
                        <div class="sidebar-menu"><span class="ri-menu-3-line"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="contact-popup">
    <div class="contact-popup-title">
        <h2>@lang('main.contact')</h2>
        <button type="button" class="close-popup"><i class="ri-close-fill"></i></button>
    </div>
    <div class="contact-popup-wrap">
        <div class="contact-address">
            <div class="contact-info">
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
                <h5 class="mt-30 mb-20">@lang('main.follow')</h5>
                <ul class="social-profile v1">
                    @isset($settings->facebook)
                        <li>
                            <a target="_blank" href="https://facebook.com/{{$settings->facebook}}">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                    @endisset
                    @isset($settings->instagram)
                        <li><a target="_blank" href="https://instagram.com/{{$settings->instagram}}"><i
                                    class="ri-instagram-line"></i></a></li>
                    @endisset
                    @isset($settings->telegram)
                        <li><a target="_blank" href="https://telegram.org/{{$settings->telegram}}"><i
                                    class="ri-telegram-fill"></i></a></li>
                    @endisset
                    @isset($settings->youtube)
                        <li><a target="_blank" href="https://youtube.com/{{$settings->youtube}}"><i
                                    class="ri-youtube-fill"></i></a></li>
                    @endisset
                </ul>
            </div>
        </div>
    </div>
</div>
