@include('partials._header')

<body class="layout-light side-menu">
    <div class="mobile-search">
        <form action="/" class="search-form">
            <img src="{{ asset('assets/img/svg/search.svg') }}" alt="search" class="svg">
            <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
        </form>
    </div>
    <div class="mobile-author-actions"></div>
    <header class="header-top">
        @include('partials._top_nav')
    </header>
    <main class="main-content">
        <div class="sidebar-wrapper">
            <aside class="sidebar sidebar-collapse" id="sidebar">
                @include('partials._menu')
            </aside>
        </div>
        <div class="contents">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">
                    {{ $breadcrumbTitle ?? session('breadcrumbTitle') ?? 'dashboard' }}
                </h4>
                <div class="breadcrumb-action justify-content-center flex-wrap">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <span class="la la-home"></span>{{ trans('menu.dashboard') }}
                                </a>
                            </li>

                            @if (isset($breadcrumbs) || session('breadcrumbs'))
                                @foreach ($breadcrumbs ?? session('breadcrumbs') as $breadcrumb)
                                    @if (isset($breadcrumb['url']))
                                        <li class="breadcrumb-item">
                                            <a href="{{ $breadcrumb['url'] }}">
                                                {{ $breadcrumb['name'] }}
                                            </a>
                                        </li>
                                    @else
                                        <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['name'] }}
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ol>
                    </nav>
                </div>
            </div>
            @yield('content')
        </div>
        <footer class="footer-wrapper">
            @include('partials._footer')
        </footer>
    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <div class="dm-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>
    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>
    <div class="customizer-wrapper">
        @include('partials._customizer')
    </div>

    <script>
        var env = {
            iconLoaderUrl: "{{ asset('assets/js/json/icons.json') }}",
            googleMarkerUrl: "{{ asset('assets/img/markar-icon.png') }}",
            editorIconUrl: "{{ asset('assets/img/ui/icons.svg') }}",
            mapClockIcon: "{{ asset('assets/img/svg/clock-ticket1.svg') }}"
        }
    </script>
    <script src="{{ asset('assets/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @livewireScripts
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session()->has('alert'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var alertData = @json(session('alert'));
                Swal.fire({
                    title: alertData.title,
                    text: alertData.text,
                    icon: alertData.icon
                });
            });
        </script>
    @endif
</body>

</html>
