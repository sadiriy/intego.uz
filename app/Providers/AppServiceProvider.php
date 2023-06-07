<?php

namespace App\Providers;

use App\Models\MainPageSliders;
use App\Models\Pages;
use App\Models\GeneralSettings;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $pages = Pages::all();
        $settings = GeneralSettings::all()->firstOrFail();
        View::share([
            'pages' => $pages,
            'settings' => $settings,
            ]);
    }
}
