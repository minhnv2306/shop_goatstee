<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title') </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    {!! Html::script(asset('js/app.js')) !!}
    {!! Html::style(asset('css/app.css')) !!}
    <!-- endif-->
    <!-- Admin LTE CSS -->
    {!! Html::style(asset('css/goatstee/adminlte/_all-skins.css')) !!}
    {!! Html::style(asset('css/goatstee/adminlte/AdminLTE.css')) !!}

    <!-- Admin LTE Js -->
    {!! Html::script(asset('js/goatstee/adminLTE.min.js')) !!}
</head>
