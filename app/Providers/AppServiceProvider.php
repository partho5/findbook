<?php

namespace App\Providers;

use App\Menu;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        view()->composer('layout.base_layout', function ($view){

            $menu = Menu::all()->load('submenu');

            $view->with([
                'var1'      => "v11111",
                'menu'      => $menu,
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
