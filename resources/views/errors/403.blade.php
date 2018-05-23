<!DOCTYPE html>
<html>
<head>
    <title> 403 </title>
    {!! Html::style(asset('css/app.css')) !!}
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    @lang('error.403.error')
                </h2>
                <div class="error-details">
                    @lang('error.403.notification')
                </div>
            </div>
            <a href="{{ route('sites.home') }}"> @lang('error.go_home') </a>
        </div>
    </div>
</div>

</body>
</html>
