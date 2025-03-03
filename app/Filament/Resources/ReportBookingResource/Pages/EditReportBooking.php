<?php

namespace App\Filament\Resources\ReportBookingResource\Pages;

use App\Filament\Resources\ReportBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReportBooking extends EditRecord
{
    protected static string $resource = ReportBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
