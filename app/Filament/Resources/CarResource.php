<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Models\Car;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Cars';

    protected static ?string $pluralLabel = 'Cars';

    protected static ?string $slug = 'cars';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('brand')
                    ->required()
                    ->maxLength(255),
                TextInput::make('model')
                    ->required()
                    ->maxLength(255),
                TextInput::make('year')
                    ->required()
                    ->numeric(),
                Select::make('transmission_type')
                    ->options([
                        'manual' => 'Manual',
                        'automatic' => 'Automatic',
                    ])
                    ->required(),
                TextInput::make('passenger_capacity')
                    ->required()
                    ->numeric(),
                TextInput::make('daily_price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                TextInput::make('pickup_location')
                    ->required(),
                Select::make('availability_status')
                    ->options([
                        'available' => 'Available',
                        'rented' => 'Rented',
                        'maintenance' => 'Maintenance',
                    ])
                    ->required(),
                FileUpload::make('photo_url')
                    ->image()
                    ->directory('cars')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('brand')->sortable()->searchable(),
                TextColumn::make('model')->sortable()->searchable(),
                TextColumn::make('year')->sortable(),
                TextColumn::make('transmission_type')->sortable(),
                TextColumn::make('passenger_capacity')->sortable(),
                TextColumn::make('daily_price')->sortable()->money('IDR'),
                TextColumn::make('pickup_location')->sortable(),
                TextColumn::make('availability_status')
                    ->sortable()
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'available' => 'success',
                        'rented' => 'warning',
                        'maintenance' => 'danger',
                    }),
            ])
            ->filters([
                SelectFilter::make('availability_status')
                    ->options([
                        'available' => 'Available',
                        'rented' => 'Rented',
                        'maintenance' => 'Maintenance',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }
}
