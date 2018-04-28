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
<!-- Script for admin-->
<!-- Toastr -->
@if(!empty(session('message')))
    <script>
        toastr.success('{{ session('message') }}')
    </script>
@elseif(!empty(session('error')))
    <script>
        toastr.error('{{ session('error') }}')
    </script>
@elseif($errors->any())
    <script>
        toastr.error('{{ trans('admin.category.error') }}')
    </script>
@endif

<!-- Process when click button delete? -->
<script>
    $('.deleteElement').click(function (e) {
        if(!confirm('{{trans('admin.category.delete')}}')) {
            e.preventDefault();
        }
    })
</script>
<!-- End script -->
@yield('scripts')
</html>
