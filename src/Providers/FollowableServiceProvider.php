<?php

namespace Nuummite\Followable\Providers;

use Illuminate\Support\ServiceProvider;

class FollowableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishMigrations();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Publish the associated migrations
     *
     * @return void
     */
    protected function publishMigrations()
    {
        $this->publishes(
            [
                __DIR__.'/../Database/migrations/' => database_path('migrations')
            ], 
            'migrations'
        );
    }
}
