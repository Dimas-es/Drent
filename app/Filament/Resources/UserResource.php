<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Resources\Resource;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone_number')
                    ->tel()
                    ->maxLength(20),

                TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),

                TextInput::make('address')
                    ->maxLength(255),

                TextInput::make('driver_license_number')
                    ->maxLength(50),

                DatePicker::make('license_expiry_date')
                    ->required(),

                FileUpload::make('ktp_photo')
                    ->image(),

                FileUpload::make('license_photo')
                    ->image(),

                TextInput::make('verification_status')
                    ->label('Verified')
                    ->default(false)
                    ->disabled(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('phone_number')
                    ->sortable(),

                TextColumn::make('address')
                    ->sortable(),

                TextColumn::make('driver_license_number')
                    ->sortable(),

                TextColumn::make('license_expiry_date')
                    ->date()
                    ->sortable(),

                ImageColumn::make('ktp_photo')
                    ->label('KTP'),

                ImageColumn::make('license_photo')
                    ->label('License'),

                BadgeColumn::make('verification_status')
                    ->label('Verified')
                    ->sortable()
                    ->color(fn($state) => $state ? 'success' : 'danger')
                    ->formatStateUsing(fn($state) => $state ? 'Yes' : 'No'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
