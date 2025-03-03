<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingHistoryResource\Pages;
use App\Models\BookingHistory;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class BookingHistoryResource extends Resource
{
    protected static ?string $model = BookingHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Bookings';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('User')
                    ->required(),
                Select::make('car_id')
                    ->relationship('car', 'name')
                    ->label('Car')
                    ->required(),
                DatePicker::make('booking_date')
                    ->label('Booking Date')
                    ->required(),
                TextInput::make('booking_status')
                    ->label('Booking Status')
                    ->required(),
                TextInput::make('total_cost')
                    ->label('Total Cost')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable(),
                TextColumn::make('car.name')
                    ->label('Car')
                    ->searchable(),
                TextColumn::make('booking_date')
                    ->label('Booking Date')
                    ->date(),
                TextColumn::make('booking_status')
                    ->label('Status')
                    ->searchable(),
                TextColumn::make('total_cost')
                    ->label('Total Cost')
                    ->money('USD'),
            ])
            ->filters([
                Filter::make('booking_date')
                    ->form([
                        DatePicker::make('booking_date_from')->label('From'),
                        DatePicker::make('booking_date_to')->label('To'),
                    ])
                    ->query(
                        fn(Builder $query, array $data): Builder =>
                        $query->when($data['booking_date_from'], fn(Builder $query, $date) => $query->where('booking_date', '>=', $date))
                            ->when($data['booking_date_to'], fn(Builder $query, $date) => $query->where('booking_date', '<=', $date))
                    ),
            ])
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
            'index' => Pages\ListBookingHistories::route('/'),
            'create' => Pages\CreateBookingHistory::route('/create'),
            'edit' => Pages\EditBookingHistory::route('/{record}/edit'),
        ];
    }
}
