<?php

namespace Modules\Plans\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class PlanServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::namespace('Modules\Plans\Http\Controllers')->group(__DIR__ . '/../Routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../Views', 'Plan');
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');
    }

    public function register()
    {

    }
}
