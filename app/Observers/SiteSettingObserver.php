<?php

namespace App\Observers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;

class SiteSettingObserver
{
    /**
     * Handle the SiteSetting "saved" event.
     */
    public function saved(SiteSetting $siteSetting): void
    {
        Cache::forget('site_settings');
    }

    /**
     * Handle the SiteSetting "deleted" event.
     */
    public function deleted(SiteSetting $siteSetting): void
    {
        Cache::forget('site_settings');
    }
}
