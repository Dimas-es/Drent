<?php

namespace App\Filament\Resources\BookingHistoryResource\Pages;

use App\Filament\Resources\BookingHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBookingHistory extends EditRecord
{
    protected static string $resource = BookingHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
