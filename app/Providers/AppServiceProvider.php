<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;  //posto por mim devido a (laravel-news.com/laravel-5-4-key-too-long-error)

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //posto por mim devido a (laravel-news.com/laravel-5-4-key-too-long-error)
        Schema::defaultStringLength(191);

        view()->composer('layouts.sidebar', function ($view) {
            $view->with('archives', \App\Post::archives());
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
