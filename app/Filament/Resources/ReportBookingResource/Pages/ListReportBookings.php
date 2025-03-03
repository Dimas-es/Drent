<?php

namespace App\Filament\Resources\ReportBookingResource\Pages;

use App\Filament\Resources\ReportBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReportBookings extends ListRecords
{
    protected static string $resource = ReportBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
