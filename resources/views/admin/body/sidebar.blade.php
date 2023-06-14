<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="" width="40px" height="40px">
                        <h3><b>E-Commerce</b> Shop</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="index.html">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="ti-control-forward"></i>
                    <span>Brands</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('all.brand')}}"><i class="ti-more"></i>All Brands</a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sitemap" aria-hidden="true"></i>
                    <span>Categories </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Categories</a></li>
                    <li><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All Sub-Categories</a></li>
                    <li class=""><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All
                            Sub-Sub-Categories</a>
                    </li>


                </ul>
            </li>

            <li class="treeview ">
                <a href="#">
                    <i class="fa fa-sitemap" aria-hidden="true"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('add-product') }}"><i class="ti-more"></i>Add Products</a></li>
                    <li><a href="{{ route('manage-product') }}"><i class="ti-more"></i>Manage Products</a></li>

                </ul>
            </li>

            <li class="treeview ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Stock </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a></li>


                </ul>
            </li>

            <li class="treeview ">
                <a href="#">
                    <i class="ti-control-forward"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('manage-slider') }}"><i class="ti-more"></i>Manage Slider</a></li>

                </ul>
            </li>

            <li class="treeview ">
                <a href="#">
                    <i class="ti-control-forward"></i>
                    <span>Coupon</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('manage-coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>

                </ul>
            </li>

            <li class="treeview ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Shipping Area</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{ route('manage-division') }}"><i class="ti-more"></i>Ship Division</a></li>

                    <li class=""><a href="{{ route('manage-district') }}"><i class="ti-more"></i>Ship District</a></li>

                    <li class=""><a href="{{ route('manage-state') }}"><i class="ti-more"></i>Ship State</a></li>



                </ul>
            </li>

            <li class="treeview ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Orders </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('pending-orders') }}"><i class="ti-more"></i>Pending Orders</a></li>

                    <li><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>

                    <li><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Processing Orders</a></li>

                    <li><a href="{{ route('picked-orders') }}"><i class="ti-more"></i> Picked Orders</a></li>

                    <li><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Shipped Orders</a></li>

                    <li><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Delivered Orders</a></li>

                    <li><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i> Cancel Orders</a></li>



                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Return Order</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('return.request') }}"><i class="ti-more"></i>Return Request</a></li>

                    <li><a href="{{ route('all.request') }}"><i class="ti-more"></i>All Request</a></li>


                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>All Reports </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('all-reports') }}"><i class="ti-more"></i>All Reports</a></li>


                </ul>
            </li>

            <li class="treeview ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Setting</a></li>

                    <li><a href="{{ route('seo.setting') }}"><i class="ti-more"></i>Seo Setting</a></li>


                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Review</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending Review</a></li>

                    <li><a href="{{ route('publish.review') }}"><i class="ti-more"></i>Publish Review</a></li>


                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>All Users </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('all-users') }}"><i class="ti-more"></i>All Users</a></li>


                </ul>
            </li>

            <li class="treeview ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Admin User Role </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('all.admin.user') }}"><i class="ti-more"></i>All Admin User </a></li>


                </ul>
            </li>



            <li class="header nav-small-cap">User Interface</li>
        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
            aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>