<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        view()->composer('Layout.layout', function ($view) {
            $sectorMenuGroups = DB::table('disciplines')
                ->whereNotNull('slug')
                ->whereNotNull('menu_group')
                ->orderBy('menu_group')
                ->orderBy('menu_title')
                ->get()
                ->groupBy('menu_group');

            $view->with('sectorMenuGroups', $sectorMenuGroups);
        });
    }
}
