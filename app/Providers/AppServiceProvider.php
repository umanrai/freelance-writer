<?php

namespace App\Providers;

use App\Misc\Cache;
use App\Misc\Cacher;
use Illuminate\Pagination\Paginator;
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
        // Facad
        app()->bind('cacher', function(){
            return new Cacher();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Blade directive
        \Blade::directive('hello', function ($expression) {
            return "<?php echo 'Hello, '.$expression; ?>";
        });

        Paginator::useBootstrapFour();
    }
}
