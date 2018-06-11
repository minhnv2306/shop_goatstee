<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    {{--<script src="js/app.js"></script>--}}
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
</head>
<body>
    <div id="app">
        <h1>Route Matching</h1>
        <ul>
            <li><router-link to="/">/</router-link></li>
            <li><router-link to="/params/foo/bar">/params/foo/bar</router-link></li>
            <li><router-link to="/optional-params">/optional-params</router-link></li>
            <li><router-link to="/optional-params/foo">/optional-params/foo</router-link></li>
            <li><router-link to="/params-with-regex/123">/params-with-regex/123</router-link></li>
            <li><router-link to="/params-with-regex/abc">/params-with-regex/abc</router-link></li>
            <li><router-link to="/asterisk/foo">/asterisk/foo</router-link></li>
            <li><router-link to="/asterisk/foo/bar">/asterisk/foo/bar</router-link></li>
            <li><router-link to="/optional-group/bar">/optional-group/bar</router-link></li>
            <li><router-link to="/optional-group/foo/bar">/optional-group/foo/bar</router-link></li>
        </ul>
        <p>Route context</p>
        <pre>@{{ JSON.stringify($route, null, 2) }}</pre>
    </div>
    <script>
        const User = {
            template: `<div>User @{{ $route.params.id }}</div>`
        }

        const router = new VueRouter({
            routes: [
                { path: '/' },
                // params are denoted with a colon ":"
                { path: '/params/:foo/:bar' },
                // a param can be made optional by adding "?"
                { path: '/optional-params/:foo?' },
                // a param can be followed by a regex pattern in parens
                // this route will only be matched if :id is all numbers
                { path: '/params-with-regex/:id(\\d+)' },
                // asterisk can match anything
                { path: '/asterisk/*' },
                // make part of the path optional by wrapping with parens and add "?"
                { path: '/optional-group/(foo/)?bar' }
            ]
        })

        const app = new Vue({ router }).$mount('#app')
    </script>
</body>
</html>
