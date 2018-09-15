<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('frontend.layout.head')

@yield('style')

<body class="header-sticky">

<div class="boxed">
@include('frontend.layout.header')

@yield('content')


@include('frontend.layout.footer')
@include('frontend.layout.bottom')
</div>
@include('frontend.layout.js')
@yield('script')
</body>
</html>


