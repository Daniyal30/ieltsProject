<?php

namespace App\Providers;

use App\Models\Sidebar;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $sidebars = Sidebar::where('is_active', 0)
                ->orderBy('order')
                ->get();

            $view->with('sidebars', $sidebars);
        });
    }
}
