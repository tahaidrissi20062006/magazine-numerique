<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; // 1. تأكد من إضافة هذا السطر في الأعلى
use Illuminate\Support\Facades\URL;

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
        Schema::defaultStringLength(191); // 2. أضف هذا السطر هنا بدقة
        if (config('app.env') === 'production' || env('APP_URL') !== 'http://localhost') {
            URL::forceScheme('https');
        }
    }
}