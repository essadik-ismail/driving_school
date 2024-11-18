<nav class="navbar navbar-light" style="z-index: 1;">
    <div class="navbar-left">
        <div class="logo-area">
            <a class="navbar-brand" href="/">
                <img class="dark" src="{{ asset('assets/img/logo/logo.svg') }}" alt="svg">
                <img class="light" src="{{ asset('assets/img/logo/logo.svg') }}" alt="img">
            </a>
            <a href="#" class="sidebar-toggle">
                <img class="svg" src="{{ asset('assets/img/svg/align-center-alt.svg') }}" alt="img"></a>
        </div>

    </div>
    <div class="navbar-right">
        <ul class="navbar-right__menu">

            <li>
                <a href="#" id="darkModeToggle">
                    <img src="{{ asset('assets/img/svg/moon.png') }}" width="20px" alt="">
                </a>
            </li>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const darkModeToggle = document.getElementById("darkModeToggle");
                    const body = document.body;

                    // Check local storage for layout preference
                    const layoutPreference = localStorage.getItem("layout");

                    // Apply saved layout preference
                    if (layoutPreference) {
                        body.classList.add(layoutPreference);
                    } else {
                        // Default to light mode if no preference is set
                        body.classList.add("layout-light");
                    }

                    // Toggle layout on click
                    darkModeToggle.addEventListener("click", function(e) {
                        e.preventDefault(); // Prevent default anchor behavior

                        if (body.classList.contains("layout-dark")) {
                            body.classList.remove("layout-dark");
                            body.classList.add("layout-light");
                            localStorage.setItem("layout", "layout-light");
                        } else {
                            body.classList.remove("layout-light");
                            body.classList.add("layout-dark");
                            localStorage.setItem("layout", "layout-dark");
                        }
                    });
                });
            </script>


            <li class="nav-notification">
                <div class="dropdown-custom">
                    <a href="javascript:;" class="nav-item-toggle icon-active">
                        <img class="svg" src="{{ asset('assets/img/svg/alarm.svg') }}" alt="img">
                    </a>
                    <div class="dropdown-wrapper">
                        <h2 class="dropdown-wrapper__title">Notifications
                            <span
                                class="badge-circle badge-warning ms-1">{{ auth()->user()->unreadNotifications->count() }}</span>
                        </h2>
                        <ul>
                            @foreach (notifications() as $notification)
                                <li
                                    class="nav-notification__single {{ $notification->read_at ? '' : 'nav-notification__single--unread' }} d-flex flex-wrap">
                                    <div class="nav-notification__type {{ $notification->type }}">
                                        <img src="{{ asset('assets/img/svg/inbox.svg') }}" alt="inbox"
                                            class="svg">
                                    </div>
                                    <div class="nav-notification__details">
                                        <p>
                                            <a href="{{ $notification->data['url'] }}"
                                                class="subject stretched-link text-truncate" style="max-width: 180px;">
                                                {{ $notification->data['message'] }}
                                            </a>
                                        </p>
                                        <p>
                                            <span
                                                class="time-posted">{{ $notification->created_at->diffForHumans() }}</span>
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('notifications.index') }}" class="dropdown-wrapper__more">See all incoming
                            activity</a>
                    </div>
                </div>
            </li>

            <li class="nav-flag-select">
                <div class="dropdown-custom">
                    @php
                        $currentLocale = app()->getLocale();
                        $flags = [
                            'en' => asset('assets/img/eng.png'),
                            'fr' => asset('assets/img/flags/france.png'),
                            'ar' => asset('assets/img/flags/morocco.png'),
                        ];
                    @endphp

                    <!-- Current Locale Flag -->
                    <a style="cursor: pointer;" href="#">
                        <img src="{{ $flags[$currentLocale] }}" alt="">
                    </a>

                    <!-- Dropdown for Changing Language -->
                    <div class="dropdown-wrapper dropdown-wrapper--small">
                        <a href="{{ route('changelog', 'en') }}">
                            <img src="{{ $flags['en'] }}" alt=""> English
                        </a>
                        <a href="{{ route('changelog', 'fr') }}">
                            <img src="{{ $flags['fr'] }}" alt=""> French
                        </a>
                        <a href="{{ route('changelog', 'ar') }}">
                            <img src="{{ $flags['ar'] }}" alt=""> Arabic
                        </a>
                    </div>
                </div>

            </li>
            <li class="nav-author">
                <div class="dropdown-custom">
                    <a href="javascript:;" class="nav-item-toggle">
                        @if (Auth::check())
                            <span class="nav-item__title">{{ Auth::user()->name }}<i
                                    class="las la-angle-down nav-item__arrow"></i></span>
                        @endif
                    </a>
                    <div class="dropdown-wrapper">
                        <div class="nav-author__info">
                            <div>
                                @if (Auth::check())
                                    <h6 class="text-capitalize">{{ Auth::user()->name }}</h6>
                                @endif
                                <span>{{ Auth::user()?->role ?? 'admin' }}</span>
                            </div>
                        </div>
                        <div class="nav-author__options">
                            <ul>
                                <li>
                                    <a href="{{ route('profile.index') }}">
                                        <img src="{{ asset('assets/img/svg/user.svg') }}" alt="user"
                                            class="svg"> Profile</a>
                                </li>
                                <li>
                                    <a href="https://spw-hub.com/contact/" target="_blank">
                                        <img src="{{ asset('assets/img/svg/bell.svg') }}" alt="bell"
                                            class="svg"> Help</a>
                                </li>
                            </ul>
                            <a href="" class="nav-author__signout"
                                onclick="event.preventDefault();document.getElementById('logout').submit();">
                                <img src="{{ asset('assets/img/svg/log-out.svg') }}" alt="log-out" class="svg">
                                Sign Out</a>
                            <form style="display:none;" id="logout" action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('post')
                            </form>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="navbar-right__mobileAction d-md-none">
            <a href="#" class="btn-search">
                <img src="{{ asset('assets/img/svg/search.svg') }}" alt="search" class="svg feather-search">
                <img src="{{ asset('assets/img/svg/x.svg') }}" alt="x" class="svg feather-x">
            </a>
            <a href="#" class="btn-author-action">
                <img src="{{ asset('assets/img/svg/more-vertical.svg') }}" alt="more-vertical" class="svg"></a>
        </div>
    </div>
</nav>
