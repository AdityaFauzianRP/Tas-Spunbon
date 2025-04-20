<?php

namespace App\Filament\Resources\MonitoringSlittingResource\Pages;

use App\Filament\Resources\MonitoringSlittingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMonitoringSlitting extends CreateRecord
{
    protected static string $resource = MonitoringSlittingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
