<style>
    .nav-second-level.nav > li > a {
        padding-left: 40px !important;
    }
</style>

<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metisMenu nav" id="side-menu">
                
                <li class="{{ Request::is('admin/menu*') ? 'active' : '' }}">
                    <a href="{{ url('admin/menu') }}" class="{{ Request::is('admin/menu*') ? 'active' : '' }}"><i class="dripicons-checklist"></i> <span> Menu </span></a>
                </li>

                <li class="{{ Request::is('admin/news*') ? 'active' : '' }}">
                    <a href="javascript: void(0);" aria-expanded="true"><i class="dripicons-to-do"></i> <span>Tin tức</span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level nav" aria-expanded="true">
                        <li class="{{ Request::is('admin/news-category*') ? 'active' : '' }}">
                            <a href="{{ url('admin/news-category') }}"><i class="dripicons-chevron-right"></i>Danh mục</a>
                        </li>
                        <li class="{{ Request::is('admin/news/*') ? 'active' : '' }}">
                            <a href="{{ url('admin/news') }}"><i class="dripicons-chevron-right"></i>Bài viết</a>
                        </li>
                        <li class="{{ Request::is('admin/news-comment*') ? 'active' : '' }}">
                            <a href="{{ url('admin/news-comment') }}"><i class="dripicons-chevron-right"></i>Bình luận</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ Request::is('admin/course*') ? 'active' : '' }}">
                    <a href="javascript: void(0);" aria-expanded="true"><i class="fa fa-list-ul"></i> <span>Khóa học</span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level nav" aria-expanded="true">
                        <li class="{{ Request::is('admin/course-category*') ? 'active' : '' }}">
                            <a href="{{ url('admin/course-category') }}"><i class="dripicons-chevron-right"></i><span>Danh mục</span></a>
                        </li>
                        <li class="{{ Request::is('admin/course/*') ? 'active' : '' }}">
                            <a href="{{ url('admin/course') }}"  ><i class="dripicons-chevron-right"></i><span>Khóa học</span></a>
                        </li>
                        <li  class="{{ Request::is('admin/course-comment*') ? 'active' : '' }}">
                            <a href="{{ url('admin/course-comment') }}" ><i class="dripicons-chevron-right"></i>Bình luận</a>
                        </li>
                    </ul>
                </li>

                 <li class="{{ Request::is('admin/teacher*') ? 'active' : '' }}">
                    <a href="{{ url('admin/teacher') }}" class="{{ Request::is('admin/teacher*') ? 'active' : '' }}"><i class="mdi mdi-account-star-variant"></i> <span>Giảng viên</span></a>
                </li>

                <li class="{{ Request::is('admin/student*') ? 'active' : '' }}">
                    <a href="{{ url('admin/student') }}" class="{{ Request::is('admin/student*') ? 'active' : '' }}"><i class="fa fa-user-circle-o"></i> <span>Học viên</span></a>
                </li>

                <li class="{{ Request::is('admin/user*') ? 'active' : '' }}">
                    <a href="{{ url('admin/user') }}" class="{{ Request::is('admin/user*') ? 'active' : '' }}"><i class="fa fa-user-o"></i> <span>Người dùng</span></a>
                </li>

                <li class="{{ Request::is('admin/partner*') ? 'active' : '' }}">
                    <a href="{{ url('admin/partner') }}" class="{{ Request::is('admin/partner*') ? 'active' : '' }}"><i class="mdi mdi-account-switch"></i> <span> Đối tác </span></a>
                </li>

                <li class="{{ Request::is('admin/banner*') ? 'active' : '' }}">
                    <a href="{{ url('admin/banner') }}" class="{{ Request::is('admin/banner*') ? 'active' : '' }}"><i class="fi-air-play"></i> <span>Banner</span></a>
                </li>

                <li class="{{ Request::is('admin/contact*') ? 'active' : '' }}">
                    <a href="{{ url('admin/contact') }}" class="{{ Request::is('admin/contact*') ? 'active' : '' }}"><i class="fa fa-envelope-open-o"></i> <span> Liên hệ </span></a>
                </li>

                <li class="{{ Request::is('admin/newsletter*') ? 'active' : '' }}">
                    <a href="{{ url('admin/newsletter') }}" class="{{ Request::is('admin/newsletter*') ? 'active' : '' }}"><i class="mdi mdi-message-processing"></i> <span> Đăng ký nhận bản tin </span></a>
                </li>

                <li class="{{ Request::is('admin/testimonial*') ? 'active' : '' }}">
                    <a href="{{ url('admin/testimonial') }}" class="{{ Request::is('admin/testimonial*') ? 'active' : '' }}"><i class="mdi mdi-message-processing"></i> <span> Quản Lý Nhận Xét </span></a>
                </li>

                <li class="{{ Request::is('admin/setting*') ? 'active' : '' }}">
                    <a href="{{ url('admin/setting') }}"><i class="fa fa-wrench"></i> <span>Thông tin cơ bản</span></a>
                </li>
            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
