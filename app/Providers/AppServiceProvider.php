<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

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
        Http::macro('apiClient', function () {
            return Http::withHeaders([
                'Content-type' => 'application/json',
            ])->withToken(env('PETSTORE_TOKEN'))
                ->baseUrl(env('PETSTORE_URL'));
        });
    }
}
