<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;  //posto por mim devido a (laravel-news.com/laravel-5-4-key-too-long-error)

use \App\Billing\Stripe;

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
            $archives= \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');

            $view->with(compact('archives','tags'));
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Stripe::class, function() {
            return new Stripe(config('services.stripe.secret'));
        });
    }

}
