<?php

namespace App\Providers;

use App\Models\Task;
use Illuminate\Support\Facades\App;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if (! App::runningInConsole()) {
            // 
            $tasks = Task::orderBy('id','DESC')->get();
            \view()->share([
                'tasks'=> $tasks
            ]);
        }
    }
}
