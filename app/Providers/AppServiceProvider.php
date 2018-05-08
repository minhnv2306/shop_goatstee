<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
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
