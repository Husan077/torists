<div class="main-header">
    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>
{{--    <div class="logo">--}}
{{--        <a href="{{ route('admin') }}"><img src="{{ asset('images/admin/logo/logo.png') }}" style="width: 100px !important;"></a>--}}
{{--    </div>--}}
    <div class="header-part-right">
        <x-feathericon-move class="header-icon d-none d-sm-inline-block" style="color:#f4834a; width: 25px" data-fullscreen/>
        <div class="dropdown">
            <div class="user col align-self-end">
                <x-feathericon-user class="header-icon" style="color:#f4834a; width: 25px" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-header">
                        <x-feathericon-user class="mr-1" style="color:#f4834a; width: 25px" />
                        {{ auth()->user()->name ?? '' }}
                    </div>
{{--                    <a class="dropdown-item" href="{{ route('logout') }}">Выйти</a> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Выйти') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
