<header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ url('frontend/images/logo/logo.png') }}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <!-- Start MAinmenu Ares -->
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                                        
                        </div>
                        <!-- End MAinmenu Ares -->
                        <div class="col-md-2 col-sm-4 col-xs-3">  
                            <ul class="menu-extra">
                                <li class="search search__open hidden-xs"><span class="ti-search"></span></li>
                            @if(Auth::check())
                                <li><a><span class="ti-user">{{ Auth::user()->name }}</span></a></li>
                                <li><a href="{{ url('logout') }}">Logout</a></li>
                            @else
                                <li><a href="{{ url('login') }}">
                                    <span class="ti-user"></span></a>
                                </li>
                            @endif

                            <li><a href="{{ url('cart') }}"><span class="ti-shopping-cart"></span></span></li>
                            <li><a href="{{ url('wishlist') }}"><span class="ti-heart"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>