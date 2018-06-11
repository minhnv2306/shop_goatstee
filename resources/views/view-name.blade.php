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
    <h1>Named Views</h1>
    <ul>
        <li>
            <router-link to="/">/</router-link>
        </li>
        <li>
            <router-link to="/other">/other</router-link>
        </li>
    </ul>
    <router-view class="view one"></router-view>
    <router-view class="view two" name="a"></router-view>
    <router-view class="view three" name="b"></router-view>
</div>
<script>
    const Foo = { template: '<div>foo</div>' }
    const Bar = { template: '<div>bar</div>' }
    const Baz = { template: '<div>baz</div>' }

    const router = new VueRouter({
        mode: 'history',
        routes: [
            { path: '/',
                // a single route can define multiple named components
                // which will be rendered into <router-view>s with corresponding names.
                components: {
                    default: Foo,
                    a: Bar,
                    b: Baz
                }
            },
            {
                path: '/other',
                components: {
                    default: Baz,
                    a: Bar,
                    b: Foo
                }
            }
        ]
    })

    new Vue({
        router,
        el: '#app'
    })
</script>
</body>
</html>
