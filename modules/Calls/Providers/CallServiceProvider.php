<?php

namespace Modules\Calls\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class CallServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::namespace('Modules\Calls\Http\Controllers')->group(__DIR__ . '/../Routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../Views', 'Call');
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');
    }

    public function register()
    {

    }
}
