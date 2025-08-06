<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class SocialiteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Socialite::extend('kemenkeuid', function ($app) {
            $config = $app['config']['services.kemenkeuid'];

            return Socialite::buildProvider(KemenkeuIDProvider::class, $config);
        });


    }
}