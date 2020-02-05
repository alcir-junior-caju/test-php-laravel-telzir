<?php

namespace Modules\Telzir\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class TelzirServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::namespace('Modules\Telzir\Http\Controllers')->group(__DIR__ . '/../Routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../Views', 'Telzir');
    }

    public function register()
    {

    }
}
