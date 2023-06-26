<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Slider;
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
        $categories = (new Category)->getAllCategories();
        $pages = Pages::all();
        $settings = GeneralSettings::all()->firstOrFail();
        View::share([
            'categories' => $categories,
            'settings' => $settings,
            'pages' => $pages
            ]);
    }
}
