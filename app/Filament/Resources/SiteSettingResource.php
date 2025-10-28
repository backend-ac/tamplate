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
    protected static ?string $navigationLabel = 'Настройки сайта';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Toggle::make('is_multilingual')->label('Многоязычность')->default(true),
                TextInput::make('default_locale')->label('Язык по умолчанию')->default('ru')->required(),
                FileUpload::make('logo')
                    ->label('Логотип')
                    ->image()
                    ->directory('logos')
                    ->visibility('public')
                    ->acceptedFileTypes(['image/svg+xml', 'image/png', 'image/jpeg', 'image/webp'])
                    ->maxSize(2048)
                    ->helperText('Загрузите логотип сайта (SVG, PNG, JPG, WEBP, макс 2МБ)'),
                Repeater::make('locales')
                    ->label('Доступные языки')
                    ->schema([
                        TextInput::make('value')->label('Код языка (напр. ru, en, kk)')->required(),
                    ])
                    ->collapsed()
                    ->itemLabel('Язык')
                    ->columns(1),
                
                Section::make('Метрики')
                    ->description('Добавьте скрипты аналитики и отслеживания')
                    ->schema([
                        Repeater::make('head_metrics')
                            ->label('Метрики в <head> (Google Analytics, Meta Pixel и т.д.)')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Название')
                                    ->placeholder('напр., Google Analytics, Яндекс Метрика')
                                    ->required(),
                                Textarea::make('code')
                                    ->label('Код')
                                    ->placeholder('Вставьте код отслеживания сюда')
                                    ->rows(5)
                                    ->required()
                                    ->helperText('Этот код будет вставлен в секцию <head>'),
                            ])
                            ->collapsed()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Метрика')
                            ->columns(1)
                            ->defaultItems(0),
                        
                        Repeater::make('body_metrics')
                            ->label('Метрики в <body> (GTM и т.д.)')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Название')
                                    ->placeholder('напр., Google Tag Manager')
                                    ->required(),
                                Textarea::make('code')
                                    ->label('Код')
                                    ->placeholder('Вставьте код отслеживания сюда')
                                    ->rows(5)
                                    ->required()
                                    ->helperText('Этот код будет вставлен в начало <body>'),
                            ])
                            ->collapsed()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Метрика')
                            ->columns(1)
                            ->defaultItems(0),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('logo')->label('Логотип'),
            Tables\Columns\IconColumn::make('is_multilingual')->label('Многоязычность')->boolean(),
            Tables\Columns\TextColumn::make('default_locale')->label('Язык по умолчанию'),
        ])->actions([
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
            'index' => Pages\ManageSiteSettings::route('/'),
        ];
    }
}


