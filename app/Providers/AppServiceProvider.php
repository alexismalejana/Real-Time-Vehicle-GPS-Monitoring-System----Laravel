<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('view-user', function (User $user) {
            return $user->role === 'Super Admin';
        });

        Gate::define('delete-gps', function (User $user) {
            return $user->role === 'Super Admin';
        });

        Gate::define('delete-vehicle', function (User $user) {
            return $user->role === 'Super Admin';
        });

        Gate::define('delete-user', function (User $user) {
            return $user->role === 'Super Admin';
        });

        Gate::define('delete-user', function (User $user) {
            return $user->role === 'Super Admin';
        });

        Gate::define('update-user', function (User $user) {
            return $user->role === 'Super Admin';
        });
    }
}
