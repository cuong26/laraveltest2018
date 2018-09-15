<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <!--<a href="index.html" class="logo"><span>Code<span>Fox</span></span><i class="mdi mdi-layers"></i></a>-->
        <!-- Image logo -->
        <a href="{{ url('admin') }}" class="logo">
            <span>
                <img src="assets/images/logo.png" alt="" height="25">
            </span>
            <i>
                <img src="assets/images/logo_sm.png" alt="" height="28">
            </i>
        </a>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">

            <!-- Navbar-left -->
            <ul class="nav navbar-nav navbar-left nav-menu-left">
                <li>
                    <button type="button" class="button-menu-mobile open-left waves-effect">
                        <i class="dripicons-menu"></i>
                    </button>
                </li>

            </ul>

            <!-- Right(Notification) -->
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown user-box">
                    <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                        @if(Auth::check())
                        <img src="{{ Auth::user()->image ?: 'assets/images/no-user.png' }}" alt="user-img" class="img-circle user-img">
                        @endif
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                        <li><a href="javascript:void(0)">Thông tin người dùng</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('admin/logout') }}">Đăng xuất</a></li>
                    </ul>
                </li>

            </ul> <!-- end navbar-right -->

        </div><!-- end container -->
    </div><!-- end navbar -->
</div>
<!-- Top Bar End -->