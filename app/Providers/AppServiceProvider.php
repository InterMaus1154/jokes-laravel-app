<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::if("admin", function(){
           return auth()->check() && auth()->user()->is_admin;
        });

        Blade::directive("basecss", function(){
            return '<?php echo \'<link rel="stylesheet" href="\' . url("css/app.css") . \'" />\'; ?>';
        });

        Blade::if('restricted', function(){
           return auth()->check() && auth()->user()->is_restricted;
        });
    }
}
