<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $label = 'Site Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Toggle::make('is_multilingual')->label('Multilingual')->default(true),
                TextInput::make('default_locale')->label('Default locale')->default('ru')->required(),
                FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->directory('logos')
                    ->visibility('public')
                    ->acceptedFileTypes(['image/svg+xml', 'image/png', 'image/jpeg', 'image/webp'])
                    ->maxSize(2048)
                    ->helperText('Upload site logo (SVG, PNG, JPG, WEBP, max 2MB)'),
                Repeater::make('locales')
                    ->label('Available locales')
                    ->schema([
                        TextInput::make('value')->label('Locale code (e.g. ru, en, kk)')->required(),
                    ])
                    ->collapsed()
                    ->itemLabel('Locale')
                    ->columns(1),
                
                Section::make('Metric Tags')
                    ->description('Add analytics and tracking scripts')
                    ->schema([
                        Repeater::make('head_metrics')
                            ->label('Head Metrics (Google Analytics, Meta Pixel, etc.)')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Name')
                                    ->placeholder('e.g., Google Analytics, Yandex Metrika')
                                    ->required(),
                                Textarea::make('code')
                                    ->label('Code')
                                    ->placeholder('Paste your tracking code here')
                                    ->rows(5)
                                    ->required()
                                    ->helperText('This code will be inserted in the <head> section'),
                            ])
                            ->collapsed()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Metric')
                            ->columns(1)
                            ->defaultItems(0),
                        
                        Repeater::make('body_metrics')
                            ->label('Body Metrics (GTM, etc.)')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Name')
                                    ->placeholder('e.g., Google Tag Manager')
                                    ->required(),
                                Textarea::make('code')
                                    ->label('Code')
                                    ->placeholder('Paste your tracking code here')
                                    ->rows(5)
                                    ->required()
                                    ->helperText('This code will be inserted at the beginning of <body>'),
                            ])
                            ->collapsed()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Metric')
                            ->columns(1)
                            ->defaultItems(0),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('logo')->label('Logo'),
            Tables\Columns\IconColumn::make('is_multilingual')->boolean(),
            Tables\Columns\TextColumn::make('default_locale'),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSiteSettings::route('/'),
        ];
    }
}


