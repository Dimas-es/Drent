<?php

namespace App\Filament\Resources\BookingHistoryResource\Pages;

use App\Filament\Resources\BookingHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBookingHistories extends ListRecords
{
    protected static string $resource = BookingHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
