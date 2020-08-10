<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public const HOME = '/';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::group([
            "middleware" => "web",
            "namespace" => $this->namespace,
        ], function ($router) {
            require base_path("routes/users.php");
            require base_path("routes/pages.php");
            require base_path("routes/entries.php");
            require base_path("routes/categories.php");
        });
    }

}
