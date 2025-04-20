<?php

namespace App\Filament\Resources\MonitoringSlittingResource\Pages;

use App\Filament\Resources\MonitoringSlittingResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\MonitoringSlittingResource\Widgets\OutputSlittingChart;
use App\Filament\Resources\MonitoringSlittingResource\Widgets\MonitoringSlittingStats;

class ListMonitoringSlittings extends ListRecords
{
    protected static string $resource = MonitoringSlittingResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }

    public function getHeaderWidgets(): array
    {
        return [
            OutputSlittingChart::class,
            MonitoringSlittingStats::class,
        ];
    }
}
