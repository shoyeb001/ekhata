<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="../images/logo-dark.png" alt="">
                        <h3><b>E</b>Khata</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{ route('user.dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
                <li class="treeview">
                    <a href="#">
                        <i class="ti-menu-alt"></i>
                        <span>Products</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route("add.product")}}"><i class="ti-more"></i>Add</a></li>
                        <li><a href="{{route("manage.product")}}"><i class="ti-more"></i>Manage</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route("view.order")}}">
                        <i data-feather="mail"></i> <span>Order</span></a>
                </li>
                <li>
                    <a href="{{route("order")}}">
                        <i data-feather="mail"></i> <span>Create Invoice</span></a>
                </li>
                <li>
                    <a href="{{route("change.email")}}">
                        <i data-feather="mail"></i> <span>Change Email</span></a>
                </li>
                <li>
                    <a href="{{route("change.password")}}">
                        <i data-feather="mail"></i> <span>Change Password</span></a>
                </li>
            <li>
                <a href="{{ route('user.logout') }}">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
