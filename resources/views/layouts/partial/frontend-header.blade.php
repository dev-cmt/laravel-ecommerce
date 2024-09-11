<!-- pre loader area start -->
{{-- <div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <!-- loading content here -->
            <div class="tp-preloader-content">
                <div class="tp-preloader-logo">
                    <div class="tp-preloader-circle">
                        <svg width="190" height="190" viewBox="0 0 380 380" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round">
                            </circle>
                            <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round">
                            </circle>
                        </svg>
                    </div>
                    <img src="{{asset('public/frontend')}}/img/logo/preloader/preloader-icon.svg" alt="">
                </div>
                <h3 class="tp-preloader-title">Shofy</h3>
                <p class="tp-preloader-subtitle">Loading</p>
            </div>
        </div>
    </div>
</div> --}}
<!-- pre loader area end -->

<!-- back to top start -->
<div class="back-to-top-wrapper">
    <button id="back_to_top" type="button" class="back-to-top-btn">
        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </button>
</div>
<!-- back to top end -->

<!-- offcanvas area start -->
<div class="offcanvas__area">
    <div class="offcanvas__wrapper">
        <div class="offcanvas__close">
            <button class="offcanvas__close-btn offcanvas-close-btn">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
        <div class="offcanvas__content">
            <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
                <div class="offcanvas__logo logo">
                    <a href="index.html">
                        <img src="{{asset('public/frontend')}}/img/logo/logo.svg" alt="logo">
                    </a>
                </div>
            </div>
            <div class="offcanvas__category pb-40">
                <button class="tp-offcanvas-category-toggle">
                    <i class="fa-solid fa-bars"></i>
                    All Categories
                </button>
                <div class="tp-category-mobile-menu">

                </div>
            </div>
            <div class="tp-main-menu-mobile fix mb-40"></div>

            <div class="offcanvas__contact align-items-center d-none">
                <div class="offcanvas__contact-icon mr-20">
                    <span>
                        <img src="{{asset('public/frontend')}}/img/icon/contact.png" alt="">
                    </span>
                </div>
                <div class="offcanvas__contact-content">
                    <h3 class="offcanvas__contact-title">
                        <a href="tel:098-852-987">004524865</a>
                    </h3>
                </div>
            </div>
            <div class="offcanvas__btn">
                <a href="contact.html" class="tp-btn-2 tp-btn-border-2">Contact Us</a>
            </div>
        </div>
        <div class="offcanvas__bottom">
            <div class="offcanvas__footer d-flex align-items-center justify-content-between">
                <div class="offcanvas__currency-wrapper currency">
                    <span class="offcanvas__currency-selected-currency tp-currency-toggle"
                        id="tp-offcanvas-currency-toggle">Currency : USD</span>
                    <ul class="offcanvas__currency-list tp-currency-list">
                        <li>USD</li>
                        <li>ERU</li>
                        <li>BDT </li>
                        <li>INR</li>
                    </ul>
                </div>
                <div class="offcanvas__select language">
                    <div class="offcanvas__lang d-flex align-items-center justify-content-md-end">
                        <div class="offcanvas__lang-img mr-15">
                            <img src="{{asset('public/frontend')}}/img/icon/language-flag.png" alt="">
                        </div>
                        <div class="offcanvas__lang-wrapper">
                            <span class="offcanvas__lang-selected-lang tp-lang-toggle"
                                id="tp-offcanvas-lang-toggle">English</span>
                            <ul class="offcanvas__lang-list tp-lang-list">
                                <li>Spanish</li>
                                <li>Portugese</li>
                                <li>American</li>
                                <li>Canada</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="body-overlay"></div>
<!-- offcanvas area end -->

<!-- mobile menu area start -->
<div id="tp-bottom-menu-sticky" class="tp-mobile-menu d-lg-none">
    <div class="container">
        <div class="row row-cols-5">
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <a href="shop.html" class="tp-mobile-item-btn">
                        <i class="flaticon-store"></i>
                        <span>Store</span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <button class="tp-mobile-item-btn tp-search-open-btn">
                        <i class="flaticon-search-1"></i>
                        <span>Search</span>
                    </button>
                </div>
            </div>
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <a href="wishlist.html" class="tp-mobile-item-btn">
                        <i class="flaticon-love"></i>
                        <span>Wishlist</span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <a href="profile.html" class="tp-mobile-item-btn">
                        <i class="flaticon-user"></i>
                        <span>Account</span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <button class="tp-mobile-item-btn tp-offcanvas-open-btn">
                        <i class="flaticon-menu-1"></i>
                        <span>Menu</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mobile menu area end -->

<!-- search area start -->
<section class="tp-search-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="tp-search-form">
                    <div class="tp-search-close text-center mb-20">
                        <button class="tp-search-close-btn tp-search-close-btn"></button>
                    </div>
                    <form action="#">
                        <div class="tp-search-input mb-10">
                            <input type="text" placeholder="Search for product...">
                            <button type="submit"><i class="flaticon-search-1"></i></button>
                        </div>
                        <div class="tp-search-category">
                            <span>Search by : </span>
                            <a href="#">Men, </a>
                            <a href="#">Women, </a>
                            <a href="#">Children, </a>
                            <a href="#">Shirt, </a>
                            <a href="#">Demin</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- search area end -->

<!-- cart mini area start -->
<div class="cartmini__area">
    <div class="cartmini__wrapper d-flex justify-content-between flex-column">
        <div class="cartmini__top-wrapper">
            <div class="cartmini__top p-relative">
                <div class="cartmini__top-title">
                    <h4>Shopping cart</h4>
                </div>
                <div class="cartmini__close">
                    <button type="button" class="cartmini__close-btn cartmini-close-btn"><i
                            class="fal fa-times"></i></button>
                </div>
            </div>
            <div class="cartmini__shipping">
                <p> Free Shipping for all orders over <span>$50</span></p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        data-width="70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="cartmini__widget">
                <div class="cartmini__widget-item">
                    <div class="cartmini__thumb">
                        <a href="product-details.html">
                            <img src="{{asset('public/frontend')}}/img/product/product-1.jpg" alt="">
                        </a>
                    </div>
                    <div class="cartmini__content">
                        <h5 class="cartmini__title"><a href="product-details.html">Level Bolt Smart Lock</a></h5>
                        <div class="cartmini__price-wrapper">
                            <span class="cartmini__price">$46.00</span>
                            <span class="cartmini__quantity">x2</span>
                        </div>
                    </div>
                    <a href="#" class="cartmini__del"><i class="fa-regular fa-xmark"></i></a>
                </div>
            </div>
            <!-- for wp -->
            <!-- if no item in cart -->
            <div class="cartmini__empty text-center d-none">
                <img src="{{asset('public/frontend')}}/img/product/cartmini/empty-cart.png" alt="">
                <p>Your Cart is empty</p>
                <a href="shop.html" class="tp-btn">Go to Shop</a>
            </div>
        </div>
        <div class="cartmini__checkout">
            <div class="cartmini__checkout-title mb-30">
                <h4>Subtotal:</h4>
                <span>$113.00</span>
            </div>
            <div class="cartmini__checkout-btn">
                <a href="cart.html" class="tp-btn mb-10 w-100"> view cart</a>
                <a href="checkout.html" class="tp-btn tp-btn-border w-100"> checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- cart mini area end -->

<!-- header area start -->
<header>
    <div class="tp-header-area tp-header-style-primary tp-header-height">
        <!-- header top start  -->
        <div class="tp-header-top-2 p-relative z-index-11 tp-header-top-border d-none d-md-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="tp-header-info d-flex align-items-center">
                            <div class="tp-header-info-item">
                                <a href="#">
                                    <span>
                                        <svg width="8" height="15" viewBox="0 0 8 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 0H5.81818C4.85376 0 3.92883 0.383116 3.24688 1.06507C2.56493 1.74702 2.18182 2.67194 2.18182 3.63636V5.81818H0V8.72727H2.18182V14.5455H5.09091V8.72727H7.27273L8 5.81818H5.09091V3.63636C5.09091 3.44348 5.16753 3.25849 5.30392 3.1221C5.44031 2.98571 5.6253 2.90909 5.81818 2.90909H8V0Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span> 7500k Followers
                                </a>
                            </div>
                            <div class="tp-header-info-item">
                                <a href="tel:402-763-282-46">
                                    <span>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.359 2.73916C1.59079 2.35465 2.86862 0.958795 3.7792 1.00093C4.05162 1.02426 4.29244 1.1883 4.4881 1.37943H4.48885C4.93737 1.81888 6.22423 3.47735 6.29648 3.8265C6.47483 4.68282 5.45362 5.17645 5.76593 6.03954C6.56213 7.98771 7.93402 9.35948 9.88313 10.1549C10.7455 10.4679 11.2392 9.44752 12.0956 9.62511C12.4448 9.6981 14.1042 10.9841 14.5429 11.4333V11.4333C14.7333 11.6282 14.8989 11.8698 14.9214 12.1422C14.9553 13.1016 13.4728 14.3966 13.1838 14.5621C12.502 15.0505 11.6125 15.0415 10.5281 14.5373C7.50206 13.2784 2.66618 8.53401 1.38384 5.39391C0.893174 4.31561 0.860062 3.42016 1.359 2.73916Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M9.84082 1.18318C12.5534 1.48434 14.6952 3.62393 15 6.3358"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M9.84082 3.77927C11.1378 4.03207 12.1511 5.04544 12.4039 6.34239"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span> +(402) 763 282 46
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div
                            class="tp-header-top-right tp-header-top-black d-flex align-items-center justify-content-end">
                            <div class="tp-header-top-menu d-flex align-items-center justify-content-end">
                                <div class="tp-header-top-menu-item tp-header-lang">
                                    <span class="tp-header-lang-toggle" id="tp-header-lang-toggle">English</span>
                                    <ul>
                                        <li>
                                            <a href="#">Spanish</a>
                                        </li>
                                        <li>
                                            <a href="#">Russian</a>
                                        </li>
                                        <li>
                                            <a href="#">Portuguese</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tp-header-top-menu-item tp-header-currency">
                                    <span class="tp-header-currency-toggle" id="tp-header-currency-toggle">USD</span>
                                    <ul>
                                        <li>
                                            <a href="#">EUR</a>
                                        </li>
                                        <li>
                                            <a href="#">CHF</a>
                                        </li>
                                        <li>
                                            <a href="#">GBP</a>
                                        </li>
                                        <li>
                                            <a href="#">KWD</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tp-header-top-menu-item tp-header-setting">
                                    <span class="tp-header-setting-toggle" id="tp-header-setting-toggle">Setting</span>
                                    <ul>
                                        <li>
                                            <a href="profile.html">My Profile</a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html">Wishlist</a>
                                        </li>
                                        <li>
                                            <a href="cart.html">Cart</a>
                                        </li>
                                        <li>
                                            <a href="login.html">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- header bottom start -->
        <div id="header-sticky" class="tp-header-bottom-2 tp-header-sticky">
            <div class="container">
                <div class="tp-mega-menu-wrapper p-relative">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-5 col-md-5 col-sm-4 col-6">
                            <div class="logo">
                                <a href="{{route('home')}}">
                                    <img src="{{asset('public')}}/images/logo.png" height="50" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 d-none d-xl-block">
                            <div class="main-menu menu-style-2">
                                <nav class="tp-main-menu-content">
                                    <ul>
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        <li><a href="{{route('shop')}}">Shop</a></li>
                                        <li><a href="#">Coupons</a></li>
                                        <li class="has-dropdown">
                                            <a href="blog.html">Blog</a>
                                            <ul class="tp-submenu">
                                                <li><a href="blog.html">Blog Standard</a></li>
                                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                                <li><a href="blog-list.html">Blog List</a></li>
                                                <li><a href="blog-details-2.html">Blog Details Full Width</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-7 col-md-7 col-sm-8 col-6">
                            <div class="tp-header-bottom-right d-flex align-items-center justify-content-end pl-30">
                                <div class="tp-header-search-2 d-none d-sm-block">
                                    <form action="#">
                                        <input type="text" placeholder="Search for Products...">
                                        <button type="submit">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M18.9999 19L14.6499 14.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <div class="tp-header-action d-flex align-items-center ml-30">
                                    <div class="tp-header-action-item d-none d-lg-block">
                                        <a href="{{route('compare')}}" class="tp-header-action-btn">
                                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.8396 17.3319V3.71411" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M19.1556 13L15.0778 17.0967L11 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M4.91115 1.00056V14.6183" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M0.833496 5.09667L4.91127 1L8.98905 5.09667" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="tp-header-action-item d-none d-lg-block">
                                        <a href="{{route('wishlist')}}" class="tp-header-action-btn">
                                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.239 18.8538C13.4096 17.5179 15.4289 15.9456 17.2607 14.1652C18.5486 12.8829 19.529 11.3198 20.1269 9.59539C21.2029 6.25031 19.9461 2.42083 16.4289 1.28752C14.5804 0.692435 12.5616 1.03255 11.0039 2.20148C9.44567 1.03398 7.42754 0.693978 5.57894 1.28752C2.06175 2.42083 0.795919 6.25031 1.87187 9.59539C2.46978 11.3198 3.45021 12.8829 4.73806 14.1652C6.56988 15.9456 8.58917 17.5179 10.7598 18.8538L10.9949 19L11.239 18.8538Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7.26062 5.05302C6.19531 5.39332 5.43839 6.34973 5.3438 7.47501" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="tp-header-action-badge">4</span>
                                        </a>
                                    </div>
                                    <div class="tp-header-action-item">
                                        <button class="tp-header-action-btn cartmini-open-btn">
                                            <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.48626 20.5H14.8341C17.9004 20.5 20.2528 19.3924 19.5847 14.9348L18.8066 8.89359C18.3947 6.66934 16.976 5.81808 15.7311 5.81808H5.55262C4.28946 5.81808 2.95308 6.73341 2.4771 8.89359L1.69907 14.9348C1.13157 18.889 3.4199 20.5 6.48626 20.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M6.34902 5.5984C6.34902 3.21232 8.28331 1.27803 10.6694 1.27803V1.27803C11.8184 1.27316 12.922 1.72619 13.7362 2.53695C14.5504 3.3477 15.0081 4.44939 15.0081 5.5984V5.5984" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7.70365 10.1018H7.74942" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M13.5343 10.1018H13.5801" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="tp-header-action-badge">13</span>
                                        </button>
                                    </div>
                                    <div class="tp-header-action-item tp-header-hamburger mr-20 d-xl-none">
                                        <button type="button" class="tp-offcanvas-open-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" viewBox="0 0 30 16">
                                                <rect x="10" width="20" height="2" fill="currentColor" />
                                                <rect x="5" y="7" width="25" height="2" fill="currentColor" />
                                                <rect x="10" y="14" width="20" height="2" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area end -->
<!-- filter offcanvas area start -->
<div class="tp-filter-offcanvas-area">
    <div class="tp-filter-offcanvas-wrapper">
        <div class="tp-filter-offcanvas-close">
            <button type="button" class="tp-filter-offcanvas-close-btn filter-close-btn">
                <i class="fa-solid fa-xmark"></i>
                Close
            </button>
        </div>
        <div class="tp-shop-sidebar">
            <!-- filter -->
            <div class="tp-shop-widget mb-35">
                <h3 class="tp-shop-widget-title no-border">Price Filter</h3>

                <div class="tp-shop-widget-content">
                    <div class="tp-shop-widget-filter">
                        <div id="slider-range-offcanvas" class="mb-10"></div>
                        <div class="tp-shop-widget-filter-info d-flex align-items-center justify-content-between">
                            <span class="input-range">
                                <input type="text" id="amount-offcanvas" readonly>
                            </span>
                            <button class="tp-shop-widget-filter-btn" type="button">Filter</button>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
</div>
<!-- filter offcanvas area end -->