<?php

namespace App\Filament\Resources\MonitoringBagMakingResource\Pages;

use App\Filament\Resources\MonitoringBagMakingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMonitoringBagMaking extends EditRecord
{
    protected static string $resource = MonitoringBagMakingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
