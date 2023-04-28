<?php

namespace App\Providers;

use App\Models\Site;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'admin._partials._aside-menu',
            'App\Http\View\Composers\AsideMenuComposer'
        );

        View::composer('admin._partials._dropdown-sites', function ($view) {
            $view->with('sites', Site::all());
        });

        View::composer('admin.*', function ($view) {
            $view->with('site', Site::findOrFail(session('site', 1)));
        });

        View::composer(
            'admin._partials._header-menu',
            'App\Http\View\Composers\HeaderMenuComposer'
        );
    }
}
