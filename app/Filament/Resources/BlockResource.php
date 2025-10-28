<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlockResource\Pages;
use App\Models\Block;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class BlockResource extends Resource
{
    protected static ?string $model = Block::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Контент';

    public static function form(Form $form): Form
    {
        $locales = ['ru', 'en', 'kk']; // Fixed locales
        
        // Try to get from settings, but validate
        $settingsLocales = \App\Models\SiteSetting::query()->first()?->locales;
        if (is_array($settingsLocales) && !empty($settingsLocales)) {
            // Check if all values are valid locale codes (2-3 letter strings)
            $valid = true;
            foreach ($settingsLocales as $locale) {
                $localeValue = is_array($locale) ? ($locale['value'] ?? '') : $locale;
                if (!is_string($localeValue) || strlen($localeValue) > 3 || !preg_match('/^[a-z]{2,3}$/', $localeValue)) {
                    $valid = false;
                    break;
                }
            }
            if ($valid) {
                $locales = $settingsLocales;
            }
        }

        return $form
            ->schema([
                Select::make('page_id')
                    ->label('Страница')
                    ->options(Page::query()->pluck('slug', 'id'))
                    ->searchable()
                    ->required(),

                Select::make('type')
                    ->label('Тип')
                    ->options([
                        'hero' => 'Главный баннер',
                        'assortment' => 'Ассортимент',
                        'supplies' => 'Поставки',
                        'why_us' => 'Почему мы',
                        'stations' => 'Станции',
                        'advantages' => 'Преимущества',
                        'model' => 'Модель',
                        'office' => 'Офис',
                        'certificate' => 'Сертификаты',
                        'partners' => 'Партнеры',
                    ])
                    ->live()
                    ->required(),

                Forms\Components\Toggle::make('enabled')->default(true),
                TextInput::make('sort')->numeric()->default(0)->required(),

                Tabs::make('Пользовательское название')
                    ->tabs(collect($locales)->map(function ($locale) {
                        $key = is_array($locale) ? ($locale['value'] ?? 'ru') : $locale;
                        return Tabs\Tab::make('Название ' . strtoupper($key))
                            ->schema([
                                TextInput::make("custom_name.$key")
                                    ->label('Пользовательское название блока')
                                    ->helperText('Оставьте пустым для использования названия по умолчанию'),
                            ]);
                    })->toArray()),

                Tabs::make('Локализации')
                    ->tabs(collect($locales)->map(function ($locale) {
                        $key = is_array($locale) ? ($locale['value'] ?? 'ru') : $locale;

                        return Tabs\Tab::make(strtoupper($key))
                            ->schema([
                                Group::make()
                                    ->statePath("content.$key")
                                    ->columns(2)
                                    ->schema(function (Get $get) use ($key) {
                                        // Use absolute path to get type from root of form
                                        $type = $get('type');
                                        
                                        if (!$type) {
                                            return [];
                                        }

                                        switch ($type) {
                                            case 'hero':
                                                return [
                                                    FileUpload::make('image')
                                                        ->label('Фоновое изображение')
                                                        ->image()
                                                        ->directory('blocks/hero')
                                                        ->visibility('public')
                                                        ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/webp', 'image/jpg'])
                                                        ->maxSize(5120)
                                                        ->helperText('Загрузите фоновое изображение (PNG, JPG, WEBP, макс 5МБ)')
                                                        ->columnSpanFull(),
                                                    TextInput::make('title')->label('Заголовок')->columnSpanFull(),
                                                    Textarea::make('subtitle')->label('Подзаголовок')->columnSpanFull(),
                                                    Textarea::make('text')->label('Текст под заголовком')->columnSpanFull(),
                                                    TextInput::make('cta_text')->label('Текст кнопки'),
                                                    TextInput::make('cta_href')->label('Ссылка кнопки'),
                                                ];

                                            case 'assortment':
                                            case 'supplies':
                                            case 'why_us':
                                            case 'stations':
                                            case 'advantages':
                                                return [
                                                    TextInput::make('title')->label('Заголовок')->columnSpanFull(),
                                                    Textarea::make('description')->label('Описание')->columnSpanFull(),
                                                    Textarea::make('text')->label('Текст под заголовком')->columnSpanFull(),
                                                    Repeater::make('items')
                                                        ->label('Элементы')
                                                        ->schema([
                                                            TextInput::make('img')->label('Файл изображения'),
                                                            TextInput::make('title')->label('Заголовок элемента'),
                                                            Textarea::make('text')->label('Текст элемента'),
                                                        ])
                                                        ->collapsed()
                                                        ->columnSpanFull(),
                                                    TextInput::make('cta_text')->label('Текст кнопки'),
                                                    TextInput::make('cta_href')->label('Ссылка кнопки'),
                                                ];

                                            case 'model':
                                                return [
                                                    TextInput::make('title_1')->label('Заголовок 1')->columnSpanFull(),
                                                    Textarea::make('text_1')->label('Текст 1')->columnSpanFull(),
                                                    Repeater::make('images_1')
                                                        ->label('Изображения 1')
                                                        ->schema([
                                                            TextInput::make('value')->label('Файл изображения'),
                                                        ])
                                                        ->collapsed()
                                                        ->columnSpanFull(),
                                                    TextInput::make('title_2')->label('Заголовок 2')->columnSpanFull(),
                                                    Textarea::make('text_2')->label('Текст 2')->columnSpanFull(),
                                                    Repeater::make('images_2')
                                                        ->label('Изображения 2')
                                                        ->schema([
                                                            TextInput::make('value')->label('Файл изображения'),
                                                        ])
                                                        ->collapsed()
                                                        ->columnSpanFull(),
                                                ];

                                            case 'office':
                                                return [
                                                    TextInput::make('title')->label('Заголовок')->columnSpanFull(),
                                                    Textarea::make('text')->label('Текст')->columnSpanFull(),
                                                    Repeater::make('images')
                                                        ->label('Изображения')
                                                        ->schema([
                                                            TextInput::make('value')->label('Файл изображения'),
                                                        ])
                                                        ->collapsed()
                                                        ->columnSpanFull(),
                                                ];

                                            case 'certificate':
                                                return [
                                                    TextInput::make('title')->label('Заголовок')->columnSpanFull(),
                                                    Textarea::make('text')->label('Текст')->columnSpanFull(),
                                                    Repeater::make('images')
                                                        ->label('Сертификаты')
                                                        ->schema([
                                                            TextInput::make('value')->label('Файл изображения'),
                                                        ])
                                                        ->collapsed()
                                                        ->columnSpanFull(),
                                                ];

                                            case 'partners':
                                                return [
                                                    TextInput::make('title')->label('Заголовок')->columnSpanFull(),
                                                    Textarea::make('text')->label('Текст')->columnSpanFull(),
                                                    Repeater::make('logos')
                                                        ->label('Логотипы')
                                                        ->schema([
                                                            TextInput::make('img')->label('Изображение логотипа'),
                                                        ])
                                                        ->collapsed()
                                                        ->columnSpanFull(),
                                                ];

                                            default:
                                                return [
                                                    TextInput::make('title')->label('Заголовок')->columnSpanFull(),
                                                    Textarea::make('description')->label('Описание')->columnSpanFull(),
                                                    Textarea::make('text')->label('Текст')->columnSpanFull(),
                                                ];
                                        }
                                    }),
                            ]);
                    })->toArray()),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('sort')
            ->columns([
                Tables\Columns\TextColumn::make('page.slug')->label('Страница')->sortable(),
                Tables\Columns\TextColumn::make('type')->label('Тип')->sortable(),
                Tables\Columns\IconColumn::make('enabled')->label('Включено')->boolean(),
                Tables\Columns\TextColumn::make('sort')->label('Сортировка')->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlocks::route('/'),
            'create' => Pages\CreateBlock::route('/create'),
            'edit' => Pages\EditBlock::route('/{record}/edit'),
        ];
    }
}


