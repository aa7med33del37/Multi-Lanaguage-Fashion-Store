<?php

namespace App\Providers;

use App\Models\Admin\Setting;
use App\Models\Frontend\Cart;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Auth;
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
        $settings = Setting::first();
        $categories = Category::where('parent_id', '0')->get();
        View::share([
            'settings'   => $settings,
            'categories' => $categories,
        ]);
    }
}
