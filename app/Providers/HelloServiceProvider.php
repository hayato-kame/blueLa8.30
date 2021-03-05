<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Http\Composers\HelloComposer;


class HelloServiceProvider extends ServiceProvider
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
        // View::composer(
        //     'hello.index', function($view){
        //         $view->with('view_message', 'composer message!');
        //     }
        // );

        View::composer(
            'hello.index', HelloComposer::class
        );

    }
}