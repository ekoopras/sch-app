<?php

namespace App\Providers;

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
        View::share('navLinks', config('navlink.navbar'));
        View::share('navActions', config('navlink.actions'));
        View::share('prestasiSlides', config('component.slide-show.slides'));
        View::share('fasilitas', config('content.fasilitas.fasilitas'));
        View::share('statistic', config('content.statistic.statistic'));
    }
}
