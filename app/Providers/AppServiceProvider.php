<?php

namespace App\Providers;

use App\Models\Notification;
use App\Repositories\CategoryRepository;
use App\Repositories\NotificationRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sites.components.header_body', function ($view) {
            $attribute = [
                'id',
                'name',
            ];
            $categoryRepository = new CategoryRepository();
            $view->with([
                'categories'=> $categoryRepository->getCategoryHasProduct($attribute),
            ]);
        });

        view()->composer('layouts.admin.components.header', function ($view) {
            $repository = new NotificationRepository();
            $notifications = $repository->getUnReadNotification();
            $totalNoti = count($notifications);
            $view->with([
                'notifications'=> $notifications,
                'totalNoti' => $totalNoti,
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\CartInterfaceRepository',
            'App\Repositories\CartRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\CartProductInterfaceRepository',
            'App\Repositories\CartProductRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\CategoryInterfaceRepository',
            'App\Repositories\CategoryRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\ColorInterfaceRepository',
            'App\Repositories\ColorRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\ImageInterfaceRepository',
            'App\Repositories\ImageRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\NotificationInterfaceRepository',
            'App\Repositories\NotificationRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\OrderInterfaceRepository',
            'App\Repositories\OrderRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\ProductInterfaceRepository',
            'App\Repositories\ProductRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\ProductOrderInterfaceRepository',
            'App\Repositories\ProductOrderRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\ReviewInterfaceRepository',
            'App\Repositories\ReviewRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\RoleInterfaceRepository',
            'App\Repositories\RoleRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\SizeInterfaceRepository',
            'App\Repositories\SizeRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\StoreProductInterfaceRepository',
            'App\Repositories\StoreProductRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\UserInterfaceRepository',
            'App\Repositories\UserRepository'
        );
    }
}
