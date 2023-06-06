<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('admin') }}">
                    <x-feathericon-circle style="color: #f4834a;"/>
                    <span class="nav-text">Админ панель</span></a>
            </li>

            <li class="nav-item"><a class="nav-item-hold" href="{{ route('banners.index') }}">
                    <x-feathericon-image style="font-size: 32px; color: #f4834a;"/>
                    <span class="nav-text">Баннеры</span></a>
            </li>

            <li class="nav-item"><a class="nav-item-hold" href="{{ route('achievements.index') }}">
                    <x-feathericon-award style="font-size: 32px; color: #f4834a;"/>
                    <span class="nav-text">Достижения</span></a>
            </li>

            <li class="nav-item"><a class="nav-item-hold" href="{{ route('tours.index') }}">
                    <x-feathericon-home style="font-size: 32px; color: #f4834a;"/>
                    <span class="nav-text">Гостиницы</span></a>
            </li>

            <li class="nav-item"><a class="nav-item-hold" href="{{ route('attractions.index') }}">
                    <x-feathericon-award style="font-size: 32px; color: #f4834a;"/>
                    <span class="nav-text">Достопри - <br> мечательности</span></a>
            </li>

            <li class="nav-item"><a class="nav-item-hold" href="{{ route('bazaars.index') }}">
                    <x-feathericon-truck style="font-size: 32px; color: #f4834a;"/>
                    <span class="nav-text">Базары</span></a>
            </li>

            <li class="nav-item"><a class="nav-item-hold" href="{{ route('restaurants.index') }}">
                    <x-feathericon-book-open style="font-size: 32px; color: #f4834a;"/>
                    <span class="nav-text">Рестораны</span></a>
            </li>

            <li class="nav-item"><a class="nav-item-hold" href="{{ route('settings.index') }}">
                    <x-feathericon-settings style="font-size: 32px; color: #f4834a;"/>
                    <span class="nav-text">Настройки сайта</span></a>
            </li>
        </ul>
    </div>

    <div class="sidebar-overlay"></div>
</div>
