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
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Log;

class BlockResource extends Resource
{
    protected static ?string $model = Block::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Content';

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
                    ->label('Page')
                    ->options(Page::query()->pluck('slug', 'id'))
                    ->searchable()
                    ->required(),

                Select::make('type')
                    ->label('Type')
                    ->options([
                        'hero' => 'Hero',
                        'assortment' => 'Assortment',
                        'supplies' => 'Supplies',
                        'why_us' => 'Why Us',
                        'stations' => 'Stations',
                        'advantages' => 'Advantages',
                        'model' => 'Model',
                        'office' => 'Office',
                        'certificate' => 'Certificate',
                        'partners' => 'Partners',
                    ])
                    ->live()
                    ->required(),

                Forms\Components\Toggle::make('enabled')->default(true),
                TextInput::make('sort')->numeric()->default(0)->required(),

                Tabs::make('Custom Name')
                    ->tabs(collect($locales)->map(function ($locale) {
                        $key = is_array($locale) ? ($locale['value'] ?? 'ru') : $locale;
                        return Tabs\Tab::make('Name ' . strtoupper($key))
                            ->schema([
                                TextInput::make("custom_name.$key")
                                    ->label('Custom Block Name')
                                    ->helperText('Оставьте пустым для использования названия по умолчанию'),
                            ]);
                    })->toArray()),

                Tabs::make('Locales')
                    ->tabs(collect($locales)->map(function ($locale) {
                        $key = is_array($locale) ? ($locale['value'] ?? 'ru') : $locale;

                        return Tabs\Tab::make(strtoupper($key))
                            ->schema([
                                Group::make()
                                    ->statePath("content.$key")
                                    ->columns(2)
                                    ->schema(function (Get $get) {
                                        $type = $get('../../type');
                                        Log::info('Block type: ' . $type);
                                        if (!$type) {
                                            return [];
                                        }

                                        switch ($type) {
                                            case 'hero':
                                                return [
                                                    TextInput::make('title')->label('Title')->columnSpanFull(),
                                                    Textarea::make('subtitle')->label('Subtitle')->columnSpanFull(),
                                                    Textarea::make('text')->label('Text under title')->columnSpanFull(),
                                                    TextInput::make('cta_text')->label('CTA Text'),
                                                    TextInput::make('cta_href')->label('CTA Link'),
                                                ];

                                            case 'assortment':
                                            case 'supplies':
                                            case 'why_us':
                                            case 'stations':
                                            case 'advantages':
                                                return [
                                                    TextInput::make('title')->label('Title')->columnSpanFull(),
                                                    Textarea::make('description')->label('Description')->columnSpanFull(),
                                                    Textarea::make('text')->label('Text under title')->columnSpanFull(),
                                                    Repeater::make('items')
                                                        ->label('Items')
                                                        ->schema([
                                                            TextInput::make('img')->label('Image file'),
                                                            TextInput::make('title')->label('Item title'),
                                                            Textarea::make('text')->label('Item text'),
                                                        ])
                                                        ->collapsed()
                                                        ->columnSpanFull(),
                                                    TextInput::make('cta_text')->label('CTA Text'),
                                                    TextInput::make('cta_href')->label('CTA Link'),
                                                ];

                                            case 'model':
                                                return [
                                                    TextInput::make('title_1')->label('Title 1')->columnSpanFull(),
                                                    Textarea::make('text_1')->label('Text 1')->columnSpanFull(),
                                                    Repeater::make('images_1')
                                                        ->label('Images 1')
                                                        ->schema([
                                                            TextInput::make('value')->label('Image file'),
                                                        ])
                                                        ->collapsed()
                                                        ->columnSpanFull(),
                                                    TextInput::make('title_2')->label('Title 2')->columnSpanFull(),
                                                    Textarea::make('text_2')->label('Text 2')->columnSpanFull(),
                                                    Repeater::make('images_2')
                                                        ->label('Images 2')
                                                        ->schema([
                                                            TextInput::make('value')->label('Image file'),
                                                        ])
                                                        ->collapsed()
                                                        ->columnSpanFull(),
                                                ];

                                            case 'office':
                                                return [
                                                    TextInput::make('title')->label('Title')->columnSpanFull(),
                                                    Textarea::make('text')->label('Text')->columnSpanFull(),
                                                    Repeater::make('images')
                                                        ->label('Images')
                                                        ->schema([
                                                            TextInput::make('value')->label('Image file'),
                                                        ])
                                                        ->collapsed()
                                                        ->columnSpanFull(),
                                                ];

                                            case 'certificate':
                                                return [
                                                    TextInput::make('title')->label('Title')->columnSpanFull(),
                                                    Textarea::make('text')->label('Text')->columnSpanFull(),
                                                    Repeater::make('images')
                                                        ->label('Certificates')
                                                        ->schema([
                                                            TextInput::make('value')->label('Image file'),
                                                        ])
                                                        ->collapsed()
                                                        ->columnSpanFull(),
                                                ];

                                            case 'partners':
                                                return [
                                                    TextInput::make('title')->label('Title')->columnSpanFull(),
                                                    Textarea::make('text')->label('Text')->columnSpanFull(),
                                                    Repeater::make('logos')
                                                        ->label('Logos')
                                                        ->schema([
                                                            TextInput::make('img')->label('Logo image'),
                                                        ])
                                                        ->collapsed()
                                                        ->columnSpanFull(),
                                                ];

                                            default:
                                                return [
                                                    TextInput::make('title')->label('Title')->columnSpanFull(),
                                                    Textarea::make('description')->label('Description')->columnSpanFull(),
                                                    Textarea::make('text')->label('Text')->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('page.slug')->label('Page')->sortable(),
                Tables\Columns\TextColumn::make('type')->sortable(),
                Tables\Columns\IconColumn::make('enabled')->boolean(),
                Tables\Columns\TextColumn::make('sort')->sortable(),
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


