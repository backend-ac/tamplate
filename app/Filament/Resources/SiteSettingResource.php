<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
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
                Repeater::make('locales')
                    ->label('Available locales')
                    ->schema([
                        TextInput::make('value')->label('Locale code (e.g. ru, en, kk)')->required(),
                    ])
                    ->collapsed()
                    ->itemLabel('Locale')
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
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


