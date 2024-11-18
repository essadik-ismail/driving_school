<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
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
        $locale = Session::get('locale', config('app.locale'));
        App::setLocale($locale);
        $languages = ['en', 'fr', 'ar'];

        foreach ($languages as $lang) {
            $this->loadTranslationsFrom(base_path("language/{$lang}"), "custom_{$lang}");
        }
        Paginator::useBootstrapFive();
    }
}
