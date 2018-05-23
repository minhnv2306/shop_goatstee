<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\Size;
use App\Models\User;
use App\Policies\ColorPolicy;
use App\Policies\OrderPolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use App\Policies\SizePolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\CategoryPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Category::class => CategoryPolicy::class,
        Color::class => ColorPolicy::class,
        Order::class => OrderPolicy::class,
        Product::class => ProductPolicy::class,
        Role::class => RolePolicy::class,
        Size::class => SizePolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('categories', 'App\Policies\CategoryPolicy');
        Gate::resource('colors', 'App\Policies\ColorPolicy');
        Gate::resource('orders', 'App\Policies\OrderPolicy');
        Gate::resource('products', 'App\Policies\ProductPolicy');
        Gate::resource('roles', 'App\Policies\RolePolicy');
        Gate::resource('sizes', 'App\Policies\SizePolicy');
        Gate::resource('users', 'App\Policies\UserPolicy');
    }
}
