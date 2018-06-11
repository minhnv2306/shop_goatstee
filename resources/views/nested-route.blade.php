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
        <p>
            <router-link to="/user/foo">/user/foo</router-link>
            <router-link to="/user/foo/profile">/user/foo/profile</router-link>
            <router-link to="/user/foo/posts">/user/foo/posts</router-link>
        </p>
        <router-view></router-view>
    </div>
<script>
    const User = {
        template: `
            <div class="user">
              <h2>User @{{ $route.params.id }}</h2>
              <router-view></router-view>
            </div>
          `
    }

    const UserHome = { template: '<div>Home</div>' }
    const UserProfile = { template: '<div>Profile</div>' }
    const UserPosts = { template: '<div>Posts</div>' }

    const router = new VueRouter({
        mode: 'history',
        routes: [
            {
                path: '/user/:id', component: User,
                children: [
                    // UserHome will be rendered inside User's <router-view>
                    // when /user/:id is matched
                    { path: '', component: UserHome },

                    // UserProfile will be rendered inside User's <router-view>
                    // when /user/:id/profile is matched
                    { path: 'profile', component: UserProfile },

                    // UserPosts will be rendered inside User's <router-view>
                    // when /user/:id/posts is matched
                    { path: 'posts', component: UserPosts }
                ]
            }
        ]
    })

    const app = new Vue({ router }).$mount('#app')
</script>
</body>
</html>
