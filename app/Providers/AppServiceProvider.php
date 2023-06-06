<?php

namespace App\Providers;

use App\Models\Admin;
use App\Services\PostProcessor;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Dashboard;
use Orchid\Platform\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('Computer', PostProcessor::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Log sql
        DB::listen(function ($query) {
            Log::info(sprintf(str_replace('?', '"' . '%s' . '"', $query->sql), ...$query->bindings));
        });

        // Default pagination template
        Paginator::defaultView('vendor.pagination.tailwind');

        Dashboard::useModel(
            User::class,
            Admin::class
        );
    }
}
