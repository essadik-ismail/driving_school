<div class="customizer">
    <div class="customizer__head">
        <h4 class="customizer__title">Customizer</h4>
        <span class="customizer__sub-title">Customize your overview page layout</span>
        <a href="#" class="customizer-close">
            <img class="svg" src="{{ asset('assets/img/svg/close.svg') }}" alt="">
        </a>
    </div>
    <div class="customizer__body">
        <div class="customizer__single">
            <h4>Layout Type</h4>
            <ul class="customizer-list d-flex layout">
                <li class="customizer-list__item">
                    <a href="{{ Helper::get_translation_url( 'en' ) }}" class="{{ ! Helper::is_rtl() ? 'active' : '' }}">
                        <img src="{{ asset('assets/img/ltr.png') }}" alt="">
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
                <li class="customizer-list__item">
                    <a href="{{ Helper::get_translation_url( 'ar' ) }}" class="{{ Helper::is_rtl() ? 'active' : '' }}">
                        <img src="{{ asset('assets/img/rtl.png') }}" alt="">
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="customizer__single">
            <h4>Sidebar Type</h4>
            <ul class="customizer-list d-flex l_sidebar">
                <li class="customizer-list__item">
                    <a href="#" data-layout="light" class="dark-mode-toggle active">
                        <img src="{{ asset('assets/img/light.png') }}" alt="">
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
                <li class="customizer-list__item">
                    <a href="#" data-layout="dark" class="dark-mode-toggle">
                        <img src="{{ asset('assets/img/dark.png') }}" alt="">
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="customizer__single">
            <h4>Navbar Type</h4>
            <ul class="customizer-list d-flex l_navbar">
                <li class="customizer-list__item">
                    <a href="#" data-layout="side" class="active">
                        <img src="{{ asset('assets/img/side.png') }}" alt="">
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
                <li class="customizer-list__item top">
                    <a href="#" data-layout="top">
                        <img src="{{ asset('assets/img/top.png') }}" alt="">
                        <i class="fa fa-check-circle"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
