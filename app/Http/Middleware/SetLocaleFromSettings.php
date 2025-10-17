<?php

namespace App\Http\Middleware;

use App\Models\SiteSetting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocaleFromSettings
{
    public function handle(Request $request, Closure $next)
    {
        $settings = SiteSetting::query()->first();
        $defaultLocale = $settings?->default_locale ?? 'ru';
        $isMultilingual = $settings?->is_multilingual ?? true;
        $availableLocales = $settings?->locales ?: ['ru','en','kk'];

        $segment = $request->segment(1);

        if ($isMultilingual) {
            if (in_array($segment, $availableLocales, true)) {
                App::setLocale($segment);
            } else {
                App::setLocale($defaultLocale);
            }
        } else {
            App::setLocale($defaultLocale);
        }

        return $next($request);
    }
}


