<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Page;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $settings = SiteSetting::query()->first();
        $defaultLocale = $settings?->default_locale ?? 'ru';
        $isMultilingual = $settings?->is_multilingual ?? true;

        $requestedLocale = $request->route('locale');
        if (! $isMultilingual) {
            $locale = $defaultLocale;
        } else {
            $locale = $requestedLocale ?: App::getLocale();
        }

        $page = Page::firstOrCreate(
            ['slug' => 'home'],
            ['title' => [
                'ru' => 'Главная',
                'en' => 'Home',
                'kk' => 'Басты бет',
            ]]
        );

        $blocks = $page->blocks()->where('enabled', true)->orderBy('sort')->get();

        $hasModal = $blocks->contains(function ($block) use ($locale, $defaultLocale) {
            $content = $block->content[$locale] ?? $block->content[$defaultLocale] ?? [];
            $ctaText = $content['cta_text'] ?? null;
            $ctaHref = $content['cta_href'] ?? null;
            
            return !empty($ctaText) && (empty($ctaHref) || $ctaHref === 'javascript:;');
        });

        return view('home_dynamic', [
            'page' => $page,
            'blocks' => $blocks,
            'locale' => $locale,
            'isMultilingual' => $isMultilingual,
            'hasModal' => $hasModal,
        ]);
    }
}


