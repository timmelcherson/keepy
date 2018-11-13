<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //

        view()->composer(
            'keylist', 'App\Http\ViewComposers\KeylistComposer'
        );

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
