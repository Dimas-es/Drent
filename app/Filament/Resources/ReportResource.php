<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Models\Report;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationGroup = 'Reports';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('report_type')->disabled(),
                Forms\Components\DatePicker::make('date_range')->disabled(),
                Forms\Components\TextInput::make('total_revenue')->numeric()->prefix('Rp')->disabled(),
                Forms\Components\TextInput::make('total_bookings')->numeric()->disabled(),
                Forms\Components\TextInput::make('vehicle_usage')->disabled(),
                Forms\Components\DateTimePicker::make('generated_at')->disabled(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('report_type')->sortable()->searchable(),
                TextColumn::make('date_range'),
                TextColumn::make('total_revenue')
                    ->sortable()
                    ->money('IDR')
                    ->label('Total Revenue'),
                TextColumn::make('total_bookings')->sortable(),
                TextColumn::make('vehicle_usage'),
                TextColumn::make('generated_at')->dateTime('d M Y, H:i'),
            ])
            ->filters([])
            ->actions([]) // Tidak ada tombol edit atau delete
            ->bulkActions([]); // Tidak ada aksi massal
    }

    public static function canCreate(): bool
    {
        return false;
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
        ];
    }
}
