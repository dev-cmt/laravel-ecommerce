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
                    <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
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




                <!-- Ecommerce Menu -->
                <li class="menu-title"><span data-key="t-menu">Ecommerce</span></li>

                <!-- Order Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Orders</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">All Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Pending Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Completed Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Declined Orders</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Manage Country Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Manage Country</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Country</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Manage Tax</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Products Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Products</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Add New Product</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">All Products</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Deactivated Product</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Product Catalogs</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Product Settings</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Affiliate Products Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Affiliate Products</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Add Affiliate Product</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">All Affiliate Products</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Bulk Product Upload Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="https://products.geniusocean.com/eCommerce/admin/products/import">
                        <i class="ri-product-hunt-line"></i> <span data-key="t-widgets">Bulk Product Upload</span>
                    </a>
                </li>

                <!-- Product Discussion Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Product Discussion</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Product Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Comments</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Reports</a>
                            </li>
                        </ul>
                    </div>                    
                </li>
                
                <!-- Set Coupons Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="https://products.geniusocean.com/eCommerce/admin/coupon">
                        <i class="ri-product-hunt-line"></i> <span data-key="t-widgets">Set Coupons</span>
                    </a>
                </li>
                
                <!-- Customers Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Customers</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Customers List</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Withdraws</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Customer Default Image</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Customer Deposits Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Customer Deposits</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Completed Deposits</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Pending Deposits</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Transactions</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Messages Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Messages</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Tickets</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Disputes</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Blog Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Blog</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Blog Settings</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- General Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">General Settings</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Favicon</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Loader</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Shipping Methods</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Packagings</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Pickup Locations</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Website Contents</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Affiliate Program</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Popup Banner</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Breadcrumb Banner</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Error Banner</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Error Banner</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Website Maintenance</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Home Page Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Home Page Settings</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Sliders</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Arrival Section</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Deal of the day</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Partners</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Home Page Customization</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Menu Page Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Menu Page Settings</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">FAQ Page</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Contact Us Page</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Other Pages</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Other Page Banner</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Customize Menu Links</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Email Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Email Template</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Email Configurations</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Group Email</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Payment Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Home Page Settings</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Payment Information</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Payment Gateways</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Currencies</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Reward Information</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Social Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Social Settings</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Social Links</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Facebook Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Google Login</a>
                            </li>
                        </ul>
                    </div>                    
                </li>
                
                <!-- Language Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Language Settings</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Website Language</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Admin Panel Language</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Language Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">Language Settings</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Website Language</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Admin Panel Language</a>
                            </li>
                        </ul>
                    </div>                    
                </li>
                
                <!-- Font Option Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('home') ? 'active' : '' }}" href="#">
                        <i class="ri-product-hunt-line"></i> <span data-key="t-widgets">Font Option</span>
                    </a>
                </li>

                <!-- SEO Tools Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">SEO Tools</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Popular Products</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Google Analytics</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Website Meta Keywords</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <!-- Manage Staffs Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('home') ? 'active' : '' }}" href="#">
                        <i class="ri-product-hunt-line"></i> <span data-key="t-widgets">Manage Staffs</span>
                    </a>
                </li>

                <!-- Subscribers Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('home') ? 'active' : '' }}" href="#">
                        <i class="ri-product-hunt-line"></i> <span data-key="t-widgets">Subscribers</span>
                    </a>
                </li>

                <!-- Addon Manager Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('home') ? 'active' : '' }}" href="#">
                        <i class="ri-product-hunt-line"></i> <span data-key="t-widgets">Addon Manager</span>
                    </a>
                </li>

                <!-- Clear Cache Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('home') ? 'active' : '' }}" href="#">
                        <i class="ri-product-hunt-line"></i> <span data-key="t-widgets">Clear Cache</span>
                    </a>
                </li>

                <!-- System Activation -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-list-settings-line"></i> <span data-key="t-apps">System Activation</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('home') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" data-key="t-chat">Generate Backup</a>
                            </li>
                        </ul>
                    </div>                    
                </li>


                <!-- System Activation -->
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
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="ri-user-follow-line"></i> <span data-key="t-widgets">Customers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="ri-team-line"></i> <span data-key="t-widgets">Sellers</span>
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

                


                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li>
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
