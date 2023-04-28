<?php

namespace App\Providers;

use App\Models\Site;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
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
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

        $host = request()->getHttpHost();


        if (!Str::contains($host, 'admin')) {


           $this->app->singleton('site', function () use ($host) {
                return Site::where('fqdn', $host)->first();
            });

        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $host = request()->getHost();

        if (!Str::contains($host, 'admin')) {
            View::share('site', app('site'));

            Blade::directive('short_format', function ($expression) {
                return "<?php echo number_format_short($expression, app('site')->lang); ?>";
            });
        }
    }
}
