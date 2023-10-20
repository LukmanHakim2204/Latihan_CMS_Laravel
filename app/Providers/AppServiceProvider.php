<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::useBootstrap();

        Gate::define('manage-categories', function ($user) {
            return $user->role === 'admin'; // Contoh: Hanya admin yang bisa mengelola kategori
        });

        Gate::define('manage-project', function ($user) {
            return $user->role === 'admin'; // Contoh: Hanya admin yang bisa mengelola berita
        });

        Gate::define('manage-dashboard', function ($user) {
            return $user->role === 'admin'; // Izin untuk mengakses dashboard
        });

        Gate::define('manage-managers', function ($user) {
            return $user->role === 'admin'; // Izin untuk mengelola pengguna
        });
    }
}
