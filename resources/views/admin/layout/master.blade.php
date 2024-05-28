<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Device Management</title>
    @include('admin.layout.style')
    @stack('style')
</head>

<body>

    @include('admin.layout.header')
    @stack('header')

    @include('admin.layout.menu')
    @stack('menu')

    <div class="main-container">
        <div class="pd-ltr-20">
            <!-- content-->
            @yield('content')

            <!-- end content-->
            <!-- footer-->
            @include('admin.layout.footer')
            @stack('footer')
        </div>
    </div>
    <!-- welcome modal start -->

    <!-- welcome modal end -->

    <!-- js -->
    @include('admin.layout.script')
    @stack('script')
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>
