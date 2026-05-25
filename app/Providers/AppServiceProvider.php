<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ModelSetting;
use App\Models\ModelMenu;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('front.*', function ($view) {
            $setting = ModelSetting::first();

            $menus = ModelMenu::where('menu_is_active', true)
                ->orderBy('menu_sort_order')
                ->get();

            $view->with([
                'setting' => $setting,
                'menus' => $menus,
            ]);
        });

        View::composer('admin.*', function ($view) {
            $setting = ModelSetting::first();

            $view->with([
                'setting' => $setting,
            ]);
        });
    }
}