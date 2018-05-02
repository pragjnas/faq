<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {        view()->composer('*', 'App\Http\ViewComposers\QuestionsComposer');
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
