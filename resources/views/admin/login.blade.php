
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @lang('sites.account.login') </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {!! Html::style(asset('css/app.css')) !!}
    <!-- Admin LTE CSS -->
    {!! Html::style(asset('css/goatstee/adminlte/_all-skins.css')) !!}
    {!! Html::style(asset('css/goatstee/adminlte/AdminLTE.css')) !!}
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b> @lang('admin.goatstee') </b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"> @lang('admin.login.start') </p>
        @if(!empty(session('error')))

            <div class="alert alert-danger">
                <p> {{ session('error') }}</p>
            </div>
        @endif
        {!! Form::open([
            'method' => 'POST',
            'route' => 'admin.login',
        ]) !!}
            <div class="form-group has-feedback">
                {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => trans('admin.email')]) }}
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => trans('sites.account.password')]) }}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-7 col-xs-offset-1">
                    <div class="checkbox icheck">
                        <label>
                            {{ Form::checkbox('remember') }} @lang('sites.account.remember')
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    {{ Form::submit(trans('sites.account.login'), ['class' => 'btn btn-primary btn-block btn-flat']) }}
                </div>
                <!-- /.col -->
            </div>
        {!! Form::close() !!}
        <a href="#"> @lang('sites.account.lost_password') </a><br>
    </div>
    <!-- /.login-box-body -->
</div>
</body>
</html>
