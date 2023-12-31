<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         /**
         * .envファイルの(APP_ENV=production)のとき、強制https化
         */
        if(\App::environment('production')) {
            \URL::forceScheme('https');
        }
        // ペジネーションリンクをhttps対応（.env APP_ENV=localでない場合https化）
        if (!$this->app->environment('local')) {
          $this->app['request']->server->set('HTTPS', 'on');
        }

    }
}
