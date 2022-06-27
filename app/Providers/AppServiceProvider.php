<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        Gate::define('admin', function (User $user) {
            return $user->role == 'superadmin' || $user->role == 'admin';
        });

        Gate::define('superadmin', function (User $user) {
            return $user->role === 'superadmin';
        });
    }
}
