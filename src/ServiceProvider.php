<?php

namespace Xtodx\TelegramSocialite;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Laravel\Socialite\Contracts\Factory as Socialite;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $socialite = $this->app->make(Socialite::class);
        $socialite->extend(
            'telegram',
            function ($app) use ($socialite) {
                $config = $app['config']['services.telegram'];
                $provider = $socialite->buildProvider(Provider::class, $config);

                return $provider;
            }
        );
    }
}
