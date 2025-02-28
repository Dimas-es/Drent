<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationGroup = 'Configuration';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('setting_name')
                    ->disabled()
                    ->label('Setting Name'),

                Forms\Components\TextInput::make('setting_value')
                    ->required()
                    ->label('Setting Value'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('setting_name')->sortable()->searchable(),
                TextColumn::make('setting_value'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(), // Hanya bisa edit
            ])
            ->bulkActions([]); // Tidak ada aksi massal
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
