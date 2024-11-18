<div class="sidebar__menu-group">
    <ul class="sidebar_nav">
        <li>
            <a href="/" class="menu-item {{ Request::is('/') ? 'active' : '' }}">
                <span class="nav-icon uil uil-create-dashboard"></span>
                <span class="fs-5 custom-font-size menu-text">{{ trans('menu.dashboard') }}</span>
            </a>
        </li>

        @foreach ($menuItems as $item)
            @if (!empty($item['title']))
                <li class="menu-title mt-30">
                    <span class="fs-10">{{ $item['title'] }}</span>
                </li>
            @endif

            <li class="has-child {{ request()->is($item['url'] . '/*') ? 'open' : '' }}">
                <a href="{{ $item['route'] }}" class="menu-item {{ request()->is($item['url'] . '/*') ? 'active' : '' }}">
                    <span class="nav-icon {{ $item['icon'] }}"></span>
                    <span class="menu-text custom-font-size">{{ trans($item['translation_key']) }}</span>
                    @if (isset($item['subitems']) && count($item['subitems']))
                        <i class="uil uil-angle-right arrow-icon mx-1"></i>
                    @endif
                </a>

                @if (isset($item['subitems']) && count($item['subitems']))
                    <ul class="subMenu">
                        @foreach ($item['subitems'] as $subitem)
                            <li>
                                <a class="{{ request()->is($item['url'] . '/' . $subitem['url'] . '/*') || request()->is($item['url'] . '/' . $subitem['url']) || request()->is('/' . $subitem['url'] . '/*') ? 'active' : '' }}"
                                    href="{{ $subitem['route'] }}">
                                    <span class="custom-font-size">{{ trans($subitem['translation_key']) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
