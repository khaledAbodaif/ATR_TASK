<?php

namespace App\Providers;

use App\Http\Classes\CommissionTypes\Premium;
use App\Http\Interfaces\CommissionTypes;
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
        $this->app->bind('CommissionTypes', 'Free');
        $this->app->bind('CommissionTypes', 'Premium');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

    }
}
