<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
  public function register()
    {
        $this->app['request']->server->set('HTTPS', true);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        if (config('app.force_https')) {
            $url->forceScheme('https');
}}
}
