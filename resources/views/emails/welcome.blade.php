<!DOCTYPE html>
<html>
<head>
    <title> @lang('sites.emails.welcome') </title>
</head>
<body>
    <h1> @lang('sites.emails.hello') </h1>
    <a href="{{ 'http://goatstee.local/active?active=' . $user->hash }}"> @lang('sites.emails.active_account') </a>
</body>
</html>
