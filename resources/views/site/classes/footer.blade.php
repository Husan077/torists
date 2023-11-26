<footer class="footer-wrap style1">
    <div class="container">
        <div class="footer-top pt-100 pb-70">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">@lang('main.hotels')</h4>
                        <ul class="footer-menu">
                            @foreach($hotels as $hotel)
                                <li>
                                    <a href="{{ route('hotels_details', $hotel->slug) }}">{{ $hotel->{'title_' . $locale} }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">@lang('main.restaurants')</h4>
                        <ul class="footer-menu">
                            @foreach($restaurants as $restaurant)
                                <li>
                                    <a href="{{ route('restaurants_details', $restaurant->slug) }}">{{ $restaurant->{'title_' . $locale} }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">@lang('main.bazaars')</h4>
                        <ul class="footer-menu">
                            @foreach($bazaars as $bazaar)
                                <li>
                                    <a href="{{ route('bazaars_details', $bazaar->slug) }}">{{ $bazaar->{'title_' . $locale} }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">@lang('main.attractions')</h4>
                        <ul class="footer-menu">
                            @foreach($attractions as $attraction)
                                <li>
                                    <a href="{{ route('attractions_details', $attraction->slug) }}">{{ $attraction->{'title_' . $locale} }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-4">
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
                <div class="col-lg-6 col-md-8">
                    <div class="copyright-text">
                        <p><span class="las la-copyright"></span>Разработано <a href="https://turgunoff.uz">Turgunoff.uz"</a> " 2023 Tourists Attractions.
                            @lang('main.all_rights')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
