<?php

namespace App\Filament\Resources\MonitoringDrylamiResource\Pages;

use App\Filament\Resources\MonitoringDrylamiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMonitoringDrylami extends EditRecord
{
    protected static string $resource = MonitoringDrylamiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
