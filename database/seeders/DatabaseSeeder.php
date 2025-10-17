<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\SiteSetting::query()->firstOrCreate([], [
            'is_multilingual' => true,
            'default_locale' => 'ru',
            'locales' => ['ru','en','kk'],
        ]);

        $page = \App\Models\Page::firstOrCreate([
            'slug' => 'home',
        ], [
            'title' => [
                'ru' => 'Главная',
                'en' => 'Home',
                'kk' => 'Басты бет',
            ],
        ]);

        $blocks = [
            ['type' => 'hero', 'sort' => 1, 'content' => [
                'ru' => [
                    'title' => 'Оптовая продажа дизельного топлива',
                    'subtitle' => 'С 2007 года надежно поставляем дизельное топливо оптом...',
                    'cta_text' => 'Позвонить нам',
                    'cta_href' => 'javascript:;',
                ],
            ]],
            ['type' => 'assortment', 'sort' => 2, 'content' => [
                'ru' => [
                    'title' => 'Наш ассортимент топлива',
                    'description' => 'Мы предлагаем широкий выбор российского и казахстанского дизельного топлива...',
                    'items' => [
                        ['img' => 'assortment-img.svg', 'title' => 'Зимнее дизельное топливо', 'text' => 'при -15 ... -35 °С'],
                    ],
                ],
            ]],
            ['type' => 'partners', 'sort' => 99, 'content' => [
                'ru' => [
                    'title' => 'Партнеры',
                    'logos' => [ ['img' => 'partners.png'], ['img' => 'partners.png'] ],
                ],
            ]],
        ];

        foreach ($blocks as $b) {
            \App\Models\Block::firstOrCreate([
                'page_id' => $page->id,
                'type' => $b['type'],
                'sort' => $b['sort'],
            ], [
                'enabled' => true,
                'content' => $b['content'],
            ]);
        }
    }
}
