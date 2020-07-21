<?php

namespace Chuckbe\ChuckcmsTemplateStarter;

use Chuckbe\ChuckcmsTemplateStarter\Commands\PublishStarter;

use Illuminate\Support\ServiceProvider;

class ChuckcmsTemplateStarterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {   
        if ($this->app->runningInConsole()) {
            $this->commands([
                PublishStarter::class,
            ]);
        }
        
        //php artisan vendor:publish --tag=chuckcms-template-starter-public --force
        $this->publishes([
            __DIR__.'/resources' => public_path('chuckbe/chuckcms-template-starter'),
        ], 'chuckcms-template-starter-public');

        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/chuckcms-template-starter'),
        ], 'chuckcms-template-starter-views');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'chuckcms-template-starter');
    }
}
