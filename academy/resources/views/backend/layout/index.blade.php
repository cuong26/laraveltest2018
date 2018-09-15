<!DOCTYPE html>
<html>
    <head>
        @include('backend.layout._head')
        @include('backend.layout._style')
        @yield('style')
    </head>
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            @include('backend.layout._topbar')

            @include('backend.layout._sidebar')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">{{ $title or 'Vins Academy' }}</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{ url('admin') }}">Quản trị</a>
                                        </li>
                                        @if(isset($page) && isset($module) && !Request::is('admin/'.$page))
                                        <li>
                                            <a href="{{ url('admin/' . $page) }}">{{ $module }}</a>
                                        </li>
                                        @endif
                                        <li class="active">
                                            {{ $title or 'Vins Academy' }}
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('status') }}
                        </div>
                        @endif
                        
                        @yield('content')
                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 © <a href="http://vinsofts.com/" target="_blank">Vinsofts</a> 
                </footer>

            </div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <div id="loading"></div>
        <!-- END wrapper -->

        @include('backend.layout._script')
        @yield('script')
    </body>
</html>