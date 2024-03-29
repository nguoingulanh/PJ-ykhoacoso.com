<?php

namespace App\Providers;


use App\Breadcrumbs\Breadcrumbs;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Website\WebsiteController;
use App\Service\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Request::macro('breadcrumbs', function () {
            return new Breadcrumbs($this);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer(['*'], function($view) {
            $view->with('category', (new WebsiteController())->getCategory());
        });
        view()->composer(['*'], function($view) {
            $view->with('blog', (new WebsiteController())->getBlog());
        });
        view()->composer(['*'], function($view) {
            $view->with('cart', (new WebsiteController())->getCountCart());
        });
        view()->composer(['*'], function($view) {
            $view->with('order', (new OrderService())->getCountOrder());
        });
    }
}
