<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('home')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('public')}}/images/logo1.png" alt="" height="40">
                {{-- <img src="{{asset('public/backend')}}/images/logo-sm.png" alt="" height="22"> --}}
            </span>
            <span class="logo-lg">
                <img src="{{asset('public')}}/images/logo.png" alt="" height="40">
                {{-- <img src="{{asset('public/backend')}}/images/logo-dark.png" alt="" height="17"> --}}
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('home')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('public')}}/images/logo1.png" alt="" height="40">
                {{-- <img src="{{asset('public/backend')}}/images/logo-sm.png" alt="" height="22"> --}}
            </span>
            <span class="logo-lg">
                <img src="{{asset('public')}}/images/logo.png" alt="" height="40">
                {{-- <img src="{{asset('public/backend')}}/images/logo-light.png" alt="" height="17"> --}}
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div class="dropdown sidebar-user m-1 rounded">
        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center gap-2">
                <img class="rounded header-profile-user" src="{{asset('public/backend')}}/images/users/avatar-1.jpg" alt="Header Avatar">
                <span class="text-start">
                    <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
                    <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-line fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
                </span>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">Welcome Anna!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Messages</span></a>
            <a class="dropdown-item" href="apps-tasks-kanban.html"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
            <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance : <b>$5971.67</b></span></a>
            <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
            <a class="dropdown-item" href="auth-lockscreen-basic.html"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
            <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
        </div>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <!-- Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboard</span>
                    </a>
                </li>

                <!-- Working Activation -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('products.index')}}">
                        <i class="ri-product-hunt-line"></i> <span data-key="t-widgets">Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('products.create')}}">
                        <i class="ri-file-add-line"></i> <span data-key="t-widgets">Create Product</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('orders.index')}}">
                        <i class="ri-shopping-cart-2-line"></i> <span data-key="t-widgets">Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Product Setting</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('categories.index', 'brands.index', 'colors.index') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}" data-key="t-chat">Category</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('brands.index') }}" class="nav-link {{ request()->routeIs('brands.index') ? 'active' : '' }}" data-key="t-chat">Brand</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('colors.index') }}" class="nav-link {{ request()->routeIs('colors.index') ? 'active' : '' }}" data-key="t-chat">Color</a>
                            </li>
                        </ul>
                    </div>                    
                </li>




                <!-- Ecommerce Menu -->
                <li class="menu-title"><span data-key="t-menu">Ecommerce</span></li>

                <!-- Order Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#Orders" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class=" ri-shopping-cart-line"></i> <span data-key="t-orders">Orders</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="Orders">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-orders">All Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-orders">Pending Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-orders">Completed Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-orders">Declined Orders</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Manage Country Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#manageCountry" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-global-line"></i><span data-key="t-country">Manage Country</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="manageCountry">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-country">Country</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-country">Manage Tax</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Products Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#Products" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-product-hunt-line"></i> <span data-key="t-products">Products</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="Products">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-products">Add New Product</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-products">All Products</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-products">Deactivated Product</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-products">Product Catalogs</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-products">Product Settings</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Affiliate Products Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#affiliate" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-xing-line"></i> <span data-key="t-affiliate">Affiliate Products</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="affiliate">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-affiliate">Add Affiliate Product</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-affiliate">All Affiliate Products</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Bulk Product Upload Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="https://products.geniusocean.com/eCommerce/admin/products/import">
                        <i class="ri-file-upload-line"></i> <span data-key="t-bulk-upload">Bulk Product Upload</span>
                    </a>
                </li>

                <!-- Product Discussion Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#Discussion" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-discuss-line"></i> <span data-key="t-discussion">Product Discussion</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="Discussion">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-discussion">Product Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-discussion">Comments</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-discussion">Reports</a>
                            </li>
                        </ul>
                    </div>                    
                </li>
                
                <!-- Set Coupons Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="https://products.geniusocean.com/eCommerce/admin/coupon">
                        <i class="ri-coupon-3-line"></i> <span data-key="t-coupons">Set Coupons</span>
                    </a>
                </li>
                
                <!-- Customers Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#Customers" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-customer-service-line"></i> <span data-key="t-customers">Customers</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="Customers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-customers">Customers List</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-customers">Withdraws</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-customers">Customer Default Image</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Customer Deposits Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#Deposits" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-money-dollar-circle-line"></i> <span data-key="t-deposits">Customer Deposits</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="Deposits">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-deposits">Completed Deposits</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-deposits">Pending Deposits</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-deposits">Transactions</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Messages Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#messages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-message-3-line"></i> <span data-key="t-messages">Messages</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="messages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-messages">Tickets</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-messages">Disputes</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Blog Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#Blog" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-brush-line"></i> <span data-key="t-blog">Blog</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="Blog">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-blog">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-blog">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-blog">Blog Settings</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- General Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#General" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-general">General Settings</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('shipping.methods.index', 'home') ? 'show' : '' }}" id="General">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-general">Favicon</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-general">Loader</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('shipping.methods.index')}}" class="nav-link {{ request()->routeIs('shipping.methods.index') ? 'active' : '' }}" data-key="t-general">Shipping Methods</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-general">Packagings</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-general">Pickup Locations</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-general">Website Contents</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-general">Affiliate Program</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-general">Popup Banner</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-general">Breadcrumb Banner</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-general">Error Banner</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-general">Error Banner</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-general">Website Maintenance</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Home Page Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#homePage" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-file-settings-line"></i> <span data-key="t-home-page">Home Page Settings</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="homePage">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-home-page">Sliders</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-home-page">Arrival Section</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-home-page">Deal of the day</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-home-page">Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-home-page">Partners</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-home-page">Home Page Customization</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Menu Page Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#menuPage" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-menu-add-line"></i> <span data-key="t-menu-page">Menu Page Settings</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="menuPage">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-menu-page">FAQ Page</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-menu-page">Contact Us Page</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-menu-page">Other Pages</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-menu-page">Other Page Banner</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-menu-page">Customize Menu Links</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Email Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#Email" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-mail-star-line"></i> <span data-key="t-email">Email Template</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="Email">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-email">Email Configurations</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-email">Group Email</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Payment Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#Payment" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-secure-payment-line"></i> <span data-key="t-payment">Payment Settings</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="Payment">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-payment">Payment Information</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-payment">Payment Gateways</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-payment">Currencies</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-payment">Reward Information</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Social Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#Social" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-send-plane-line"></i> <span data-key="t-social">Social Settings</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="Social">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-social">Social Links</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-social">Facebook Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-social">Google Login</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Language Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#Language" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-translate"></i> <span data-key="t-language">Language Settings</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="Language">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-language">Website Language</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-language">Admin Panel Language</a>
                            </li>
                        </ul>
                    </div>                    
                </li>
                
                <!-- Font Option Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('home') ? 'active' : '' }}" href="#">
                        <i class="ri-font-size"></i> <span data-key="t-font">Font Option</span>
                    </a>
                </li>

                <!-- SEO Tools Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#SEO" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-tools-line"></i> <span data-key="t-seo">SEO Tools</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="SEO">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-seo">Popular Products</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-seo">Google Analytics</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-seo">Website Meta Keywords</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Manage Staffs Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('home') ? 'active' : '' }}" href="#">
                        <i class="ri-user-settings-line"></i> <span data-key="t-widgets">Manage Staffs</span>
                    </a>
                </li>

                <!-- Subscribers Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('home') ? 'active' : '' }}" href="#">
                        <i class="ri-user-heart-line"></i> <span data-key="t-subscribers">Subscribers</span>
                    </a>
                </li>

                <!-- Addon Manager Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('home') ? 'active' : '' }}" href="#">
                        <i class="ri-bilibili-line"></i> <span data-key="t-addon">Addon Manager</span>
                    </a>
                </li>

                <!-- Clear Cache Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('home') ? 'active' : '' }}" href="#">
                        <i class="ri-leaf-line"></i> <span data-key="t-clear">Clear Cache</span>
                    </a>
                </li>

                <!-- System Activation -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#System" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-line"></i> <span data-key="t-system">System Activation</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="System">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-system">Generate Backup</a>
                            </li>
                        </ul>
                    </div>                    
                </li>


                <li class="menu-title"><i class="ri-more-line"></i> <span data-key="t-pages">Pages</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn" data-key="t-signin"> Sign In
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSignIn">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-signin-basic.html" class="nav-link" data-key="t-basic"> Basic
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-signin-cover.html" class="nav-link" data-key="t-cover"> Cover
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i class="ri-share-line"></i> <span data-key="t-multi-level">Multi Level</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-level-1.1"> Level 1.1 </a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Level
                                    1.2
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarAccount">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-key="t-level-2.1"> Level 2.1 </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrm" data-key="t-level-2.2"> Level 2.2
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebarCrm">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="{{ route('categories.index') }}" class="nav-link" data-key="t-level-3.1" data-target="colors"> Level 3.1 categories
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link" data-key="t-level-3.2"> Level 3.2
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
