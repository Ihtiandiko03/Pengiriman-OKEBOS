<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        Gate::define('admin', function (User $user) {
            return $user->admin;
        });

        Gate::define('kurir', function (User $user) {
            if ($user->kurir_antar == 1 && $user->kurir_jemput == 1) {
                return $user->kurir_antar;
            } else if ($user->kurir_antar == 1 && $user->kurir_jemput == 0) {
                return $user->kurir_antar;
            } else if ($user->kurir_antar == 0 && $user->kurir_jemput == 1) {
                return $user->kurir_jemput;
            }
        });

        Gate::define('agen', function (User $user) {
            return $user->agen;
        });

        // Gate::define('kurir_jemput', function (User $user) {
        //     return $user->kurir_jemput;
        // });
    }
}
