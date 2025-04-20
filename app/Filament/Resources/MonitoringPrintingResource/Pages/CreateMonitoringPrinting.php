<?php

namespace App\Filament\Resources\MonitoringPrintingResource\Pages;

use App\Filament\Resources\MonitoringPrintingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMonitoringPrinting extends CreateRecord
{
    protected static string $resource = MonitoringPrintingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
