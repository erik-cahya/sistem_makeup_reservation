<!--==============================
    Mobile Menu
  ============================== -->
<div class="vs-menu-wrapper">
    <div class="vs-menu-area text-center">
        <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="index.html"><img src="{{ asset('vendor/landing_page') }}/assets/img/logo-mobile.png"
                    alt="Haarino"></a>
        </div>
        <div class="vs-mobile-menu">
            <ul>
                <li class="menu-item-has-children">
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="about">About</a>
                </li>

                <li>
                    <a href="#services">Services</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--==============================
    Header Area
==============================-->
<header class="vs-header header-layout1">
    <!-- Header Top Area -->
    <div class="header-top py-15 d-none d-sm-block">
        <div class="container">
            <div class="row align-items-center justify-content-center justify-content-lg-between">
                <div class="col-sm-auto d-none d-lg-block">

                </div>
                <div class="col-auto">
                    <div class="header-info-list text-white">
                        <ul>
                            <li><i class="fas fa-phone-alt"></i>Phone: <a class="text-reset" href="tel:02073885619">020
                                    7388 5619</a></li>
                            <li><i class="fal fa-envelope"></i>Email: <a class="text-reset"
                                    href="mailto:info@example.com">info@example.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <div class="sticky-active">
            <!-- Main Menu Area -->
            <div class="header-inner">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-7 col-sm-auto order-1">
                            <div class="header-logo py-2 py-lg-0">
                                <a href="/"><img src="{{ asset('vendor/landing_page') }}/assets/img/logo.png"
                                        alt="Haarino"></a>
                            </div>
                        </div>
                        <div class="col-auto order-3 order-sm-2">
                            <nav class="main-menu menu-style1 d-none d-lg-block">
                                <ul>
                                    <li>
                                        <a href="/">Home</a>
                                    </li>
                                    <li>
                                        <a href="#about">About</a>
                                    </li>


                                    <li>
                                        <a href="#services">Services</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-5 col-sm-auto order-2 order-sm-3 text-end">
                            <div class="header-btn">
                                <a href="/login" class="vs-btn d-none d-xl-inline-block">Book Now</a>
                                <button class="vs-menu-toggle d-inline-block d-lg-none"><i
                                        class="fas fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
