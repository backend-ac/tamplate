<?php

namespace App\Providers;

use App\Models\SiteSetting;
use App\Observers\SiteSettingObserver;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
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
        // Register observer for cache invalidation
        SiteSetting::observe(SiteSettingObserver::class);

        // Share site settings with all views
        View::composer('*', function ($view) {
            $settings = Cache::remember('site_settings', 3600, function () {
                return SiteSetting::query()->first();
            });
            $view->with('siteSettings', $settings);
        });
    }
}
