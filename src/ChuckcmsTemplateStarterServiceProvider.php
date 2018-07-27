<?php

namespace Chuckbe\ChuckcmsTemplateStarter;

use Chuckbe\ChuckcmsTemplateNairobi\Commands\PublishStarter;

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

        // $this->publishes([
        //     __DIR__ . '/config/chuckcms-template-starter.php' => config_path('chuckcms-template-starter'),
        // ], 'chuckcms-template-starter-config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'chuckcms-template-starter');

        // $this->mergeConfigFrom(
        //     __DIR__ . '/config/chuckcms-template-starter.php', 'chuckcms-template-starter-config'
        // );
    }
}
