<?php

namespace ftrotter\DURCCC;

use Illuminate\Support\ServiceProvider;

class DURCCServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__.'/../assets/js' => public_path('js'),
            __DIR__.'/../assets/css' => public_path('css'),
        ], 'public');
    }

    public function register()
    {
        // Load the durc config file and merge it with the user's
        $this->mergeConfigFrom( __DIR__.'/../config/durc.php', 'durc' );

        $this->publishes([
            __DIR__.'/../config/durc.php' => config_path('durc.php'),
        ]);

            $this->commands([
                DURCCCommand::class,
                DURCCMineCommand::class,
                DURCCWriteCommand::class,
            ]);

        // This will load routes file at yourproject/routes/web.durc.php
        // and prepend it with App\DURCC\Controllers namespace
        $this->app['router']->group(['middleware' => 'web', 'namespace' => 'App\Http\Controllers'], function () {
            if ( file_exists( base_path( 'routes/web.durc.php' ) ) ) {
                require base_path( 'routes/web.durc.php' );
            }

            if ( config( 'durc.use_durctest_route' ) == true  &&
                file_exists( base_path( 'routes/durc_test.php' ) ) ) {
                require base_path( 'routes/durc_test.php' );
            }
        });
    }

    public function provides()
    {
        return ['command.DURCC'];
    }


}
