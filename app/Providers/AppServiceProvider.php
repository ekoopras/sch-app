<?php

namespace App\Providers;

use App\Models\Navigation;
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
            // Ambil data navigasi header dari database
            $headerMenu = Navigation::where('key', 'header_menu')->first();

            // Kirim array items-nya ke Blade dengan nama variabel $customNavbar
            $view->with('customNavbar', $headerMenu ? $headerMenu->items : []);
        });

        View::share('navActions', config('content.navlink.actions'));

        View::share('statistic', config('content.statistic.statistic'));
    }
}
