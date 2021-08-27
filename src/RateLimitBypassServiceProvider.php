<?php

namespace RateLimitBypass;

use Illuminate\Support\ServiceProvider;

class RateLimitBypassServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('RateLimitBypass_IpRateLimitHelper', IpRateLimitHelper::class);
        $this->app->singleton('RateLimitBypass_ApiKeyLimitHelper', ApiKeyLimitHelper::class);
    }
}