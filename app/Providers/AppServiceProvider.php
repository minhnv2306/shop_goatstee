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
        //
    }
}
