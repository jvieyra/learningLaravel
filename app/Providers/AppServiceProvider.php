<?php

namespace App\Providers;

use App\Repositories\Messages;
use App\Repositories\CacheMessages;
use App\Repositories\MessagesInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        $this->app->bind(MessagesInterface::class, CacheMessages::class);
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
