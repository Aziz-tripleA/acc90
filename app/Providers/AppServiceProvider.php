<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Acme\Core;
use Spatie\Flash\Flash;
use Illuminate\Pagination\Paginator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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
    public function boot(Core $core)
    {
        $this->extra();
        $this->modelObservers();
        $this->paginationView();

        $core->caching();
        $core->macros();
        $core->viewShares();
        $core->viewComposers();
    }

    protected function modelObservers()
    {
        \App\Models\User::observe(\App\Observers\UserObserver::class);

    }

    protected function extra()
    {
        Blade::withDoubleEncoding();

        // auto set the translation keys array for "nikaia/translation-sheet"
        config(['translation_sheet.locales' => LaravelLocalization::getSupportedLanguagesKeys()]);

        // set custom alert types for "spatie/laravel-flash"
        Flash::levels([
            'success' => 'alert-success',
            'warning' => 'alert-warning',
            'error' => 'alert-danger',
            'info' => 'alert-info',
        ]);
    }

    /**
     * https://laravel.com/docs/5.7/pagination#customizing-the-pagination-view.
     */
    protected function paginationView()
    {
        Paginator::defaultView('layouts.pagination.main');
        Paginator::defaultSimpleView('layouts.pagination.simple');
    }
}
