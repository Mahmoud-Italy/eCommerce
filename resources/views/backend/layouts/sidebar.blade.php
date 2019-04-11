<div class="left-side sticky-left-side">

        <!--logo-->
        <div class="logo">
            <a href="index.html"><img src="{{ url('backend/assets/images/logo.png') }}" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="{{ url('/') }}"><img src="{{ url('backend/assets/images/logo-icon.png') }}" alt=""></a>
        </div>
        <!--logo-->

        <div class="left-side-inner">
            <!--Sidebar nav-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="menu-list nav-active">
                    <a href="#"><i class="icon-home"></i> <span>Dashboard</span></a>
                </li>

                <li class="menu-list"><a href="#"><i class="icon-layers"></i> <span>Slides</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{ url('dashboard/slides') }}"> All Slides</a></li>
                        <li><a href="{{ url('dashboard/slides/create') }}"> Create New Slide</a></li>
                    </ul>
                </li>

                <li class="menu-list"><a href="#"><i class="icon-layers"></i> <span>Categories</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{ url('dashboard/categories') }}"> All Categories</a></li>
                        <li><a href="{{ url('dashboard/categories/create') }}"> Create New Category</a></li>
                    </ul>
                </li>
                
                <li class="menu-list"><a href="#"><i class="icon-grid"></i> <span>Products</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{ url('dashboard/products') }}"> All Products</a></li>
                        <li><a href="{{ url('dashboard/products/create') }}">Create New Product</a></li>
                    </ul>
                </li>



                <li class="menu-list"><a href="#"><i class="icon-grid"></i> <span>Orders</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{ url('dashboard/orders') }}"> All Orders</a></li>
                        <li><a href="{{ url('dashboard/orders/new') }}">New</a></li>
                        <li><a href="{{ url('dashboard/orders/pending') }}">Pending</a></li>
                        <li><a href="{{ url('dashboard/orders/completed') }}">Completed</a></li>
                    </ul>
                </li>


                <li class="menu-list"><a href="#"><i class="icon-grid"></i> <span>Users</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{ url('dashboard/members') }}"> All Users</a></li>
                    </ul>
                </li>


                <li class="menu-list"><a href="#"><i class="icon-grid"></i> <span>Settings</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="#"> Update Info</a></li>
                    </ul>
                </li>

                

            </ul>
            <!--End sidebar nav-->

        </div>
    </div>