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

class BlockResource extends Resource
{
    protected static ?string $model = Block::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        $locales = \App\Models\SiteSetting::query()->first()?->locales ?? ['ru','en','kk'];

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
                        return Tabs\Tab::make('Name ' . strtoupper(is_array($locale) ? ($locale['value'] ?? 'ru') : $locale))
                            ->schema([
                                TextInput::make('custom_name.' . (is_array($locale) ? ($locale['value'] ?? 'ru') : $locale))
                                    ->label('Custom Block Name')
                                    ->helperText('Оставьте пустым для использования названия по умолчанию')
                            ]);
                    })->toArray()),

                Tabs::make('Locales')
                    ->tabs(collect($locales)->map(function ($locale) use ($locales) {
                        $localeKey = is_array($locale) ? ($locale['value'] ?? 'ru') : $locale;
                        return Tabs\Tab::make(strtoupper($localeKey))
                            ->schema(function (Get $get) use ($localeKey) {
                                // Get type from form root
                                $type = $get('type');
                                
                                $fields = [];
                                switch ($type) {
                                    case 'hero':
                                        $fields = [
                                            TextInput::make("content.{$localeKey}.title")->label('Title'),
                                            Textarea::make("content.{$localeKey}.subtitle")->label('Subtitle'),
                                            Textarea::make("content.{$localeKey}.text")->label('Text under title'),
                                            TextInput::make("content.{$localeKey}.cta_text")->label('CTA Text'),
                                            TextInput::make("content.{$localeKey}.cta_href")->label('CTA Link'),
                                        ];
                                        break;
                                    case 'assortment':
                                    case 'supplies':
                                    case 'why_us':
                                    case 'stations':
                                    case 'advantages':
                                        $fields = [
                                            TextInput::make("content.{$localeKey}.title")->label('Title'),
                                            Textarea::make("content.{$localeKey}.description")->label('Description'),
                                            Textarea::make("content.{$localeKey}.text")->label('Text under title'),
                                            Repeater::make("content.{$localeKey}.items")->label('Items')->schema([
                                                TextInput::make('img')->label('Image file')->helperText('Optional'),
                                                TextInput::make('title')->label('Item title')->helperText('Optional'),
                                                Textarea::make('text')->label('Item text')->helperText('Optional'),
                                            ])->collapsed(),
                                            TextInput::make("content.{$localeKey}.cta_text")->label('CTA Text'),
                                            TextInput::make("content.{$localeKey}.cta_href")->label('CTA Link'),
                                        ];
                                        break;
                                    case 'model':
                                        $fields = [
                                            TextInput::make("content.{$localeKey}.title_1")->label('Title 1'),
                                            Textarea::make("content.{$localeKey}.text_1")->label('Text under title 1'),
                                            Repeater::make("content.{$localeKey}.images_1")->label('Images 1')->schema([
                                                TextInput::make('value')->label('Image file'),
                                            ])->collapsed(),
                                            TextInput::make("content.{$localeKey}.title_2")->label('Title 2'),
                                            Textarea::make("content.{$localeKey}.text_2")->label('Text under title 2'),
                                            Repeater::make("content.{$localeKey}.images_2")->label('Images 2')->schema([
                                                TextInput::make('value')->label('Image file'),
                                            ])->collapsed(),
                                        ];
                                        break;
                                    case 'office':
                                        $fields = [
                                            TextInput::make("content.{$localeKey}.title")->label('Title'),
                                            Textarea::make("content.{$localeKey}.text")->label('Text under title'),
                                            Repeater::make("content.{$localeKey}.images")->label('Images')->schema([
                                                TextInput::make('value')->label('Image file'),
                                            ])->collapsed(),
                                        ];
                                        break;
                                    case 'certificate':
                                        $fields = [
                                            TextInput::make("content.{$localeKey}.title")->label('Title'),
                                            Textarea::make("content.{$localeKey}.text")->label('Text under title'),
                                            Repeater::make("content.{$localeKey}.images")->label('Certificates')->schema([
                                                TextInput::make('value')->label('Image file'),
                                            ])->collapsed(),
                                        ];
                                        break;
                                    case 'partners':
                                        $fields = [
                                            TextInput::make("content.{$localeKey}.title")->label('Title'),
                                            Textarea::make("content.{$localeKey}.text")->label('Text under title'),
                                            Repeater::make("content.{$localeKey}.logos")->label('Logos')->schema([
                                                TextInput::make('img')->label('Logo image')->helperText('Optional'),
                                            ])->collapsed(),
                                        ];
                                        break;
                                    default:
                                        $fields = [
                                            TextInput::make("content.{$localeKey}.title")->label('Title'),
                                            Textarea::make("content.{$localeKey}.description")->label('Description'),
                                            Textarea::make("content.{$localeKey}.text")->label('Text under title'),
                                        ];
                                }
                                return $fields;
                            });
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


