<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('/')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('public/backend')}}/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('public/backend')}}/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ auth()->check() ? route('dashboard') : route('/') }}" class="logo logo-light">
            <span class="logo-sm">
                <h4 class="text-black py-4">my<span class="text-success">HEALTH</span>Line</h4>
                {{-- <img src="{{asset('public/backend')}}/images/logo-sm.png" alt="" height="22"> --}}
            </span>
            <span class="logo-lg">
                <h4 class="text-white py-4">my<span class="text-success">HEALTH</span>Line</h4>
                {{-- <img src="{{asset('public/backend')}}/images/logo-light.png" alt="" height="17"> --}}
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>

            <ul class="navbar-nav" id="navbar-nav">
                @auth
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('dashboard')}}">
                        <i class="bx bxs-dashboard"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                @endauth

                <li class="menu-title"><span data-key="t-menu">Patients Information</span></li>
                <li class="nav-item">
                    <a href="{{route('info-general')}}" class="nav-link menu-link {{ Request::routeIs('info-general') ? 'active' : '' }}">
                        <i class="bx bx-layer"></i> <span data-key="t-dashboards">General Profile</span>
                    </a>
                </li>
                @auth
                <li class="nav-item">
                    <a href="{{route('info-cases-list')}}" class="nav-link menu-link {{ Request::routeIs('info-cases-list') ? 'active' : '' }}">
                        <i class="bx bx-layer"></i> <span data-key="t-dashboards">Case(s)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('info-profiling-tool')}}" class="nav-link menu-link {{ Request::routeIs('info-profiling-tool') ? 'active' : '' }}">
                        <i class="bx bx-layer"></i> <span data-key="t-dashboards">Profiling Tool</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('info-vaccination-record')}}" class="nav-link menu-link {{ Request::routeIs('info-vaccination-record') ? 'active' : '' }}">
                        <i class="bx bx-layer"></i> <span data-key="t-dashboards">Vaccination Record</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('info-random-uploader')}}" class="nav-link menu-link {{ Request::routeIs('info-random-uploader') ? 'active' : '' }}">
                        <i class="bx bx-layer"></i> <span data-key="t-dashboards">Random Uploader Tool</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('info-doctor-appointment')}}" class="nav-link menu-link {{ Request::routeIs('info-doctor-appointment') ? 'active' : '' }}">
                        <i class="bx bx-layer"></i> <span data-key="t-dashboards">Doctor's Appointment</span>
                    </a>
                </li>


                <!-- Report Menu -->
                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Report Information</span></li>
                <li class="nav-item">
                    <a href="{{route('report-user.index')}}" class="nav-link menu-link {{ Request::routeIs('report-user.index') ? 'active' : '' }}">
                        <i class="bx bx-layer"></i> <span data-key="t-dashboards">Report Download</span>
                    </a>
                </li>
                <!-- End Report Menu -->

                {{-- <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Web Setting</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="bx bx-user-circle"></i> <span data-key="t-authentication">Authentication</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn" data-key="t-signin"> Sign In
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSignIn">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a href="auth-signin-basic.html" class="nav-link" data-key="t-basic"> Basic </a></li>
                                        <li class="nav-item"><a href="auth-signin-cover.html" class="nav-link" data-key="t-cover"> Cover </a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarErrors" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarErrors" data-key="t-errors"> Errors
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarErrors">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-404-basic.html" class="nav-link" data-key="t-404-basic"> 404 Basic </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-404-cover.html" class="nav-link" data-key="t-404-cover"> 404 Cover </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-404-alt.html" class="nav-link" data-key="t-404-alt"> 404 Alt </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-500.html" class="nav-link" data-key="t-500"> 500 </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-offline.html" class="nav-link" data-key="t-offline-page"> Offline Page </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <!-- end Web Portal Menu -->
                @endauth
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
