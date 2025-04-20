<?php

namespace App\Filament\Resources\MonitoringBagMakingResource\Pages;

use App\Filament\Resources\MonitoringBagMakingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\MonitoringBagMakingResource\Widgets\OutputBagMakingChart;
use App\Filament\Resources\MonitoringBagMakingResource\Widgets\MonitoringBagMakingStats;

class ListMonitoringBagMakings extends ListRecords
{
    protected static string $resource = MonitoringBagMakingResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }

    public function getHeaderWidgets(): array
    {
        return [
            OutputBagMakingChart::class,
            MonitoringBagMakingStats::class,
        ];
    }
}
