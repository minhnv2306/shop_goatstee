<!DOCTYPE html>
<html>
@include('layouts.admin.components.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('layouts.admin.components.header')
    @include('layouts.admin.components.sidenav')
    @yield('content')
    @include('layouts.admin.components.footer')
</div>
<!-- ./wrapper -->
</body>
@yield('scripts')
</html>
