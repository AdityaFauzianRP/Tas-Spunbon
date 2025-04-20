<?php

namespace App\Filament\Resources\MonitoringPrintingResource\Pages;

use App\Filament\Resources\MonitoringPrintingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\MonitoringPrintingResource\Widgets\OutputPrintingChart;
use App\Filament\Resources\MonitoringPrintingResource\Widgets\MonitoringPrintingStats;

class ListMonitoringPrintings extends ListRecords
{
    protected static string $resource = MonitoringPrintingResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }

    public function getHeaderWidgets(): array
    {
        return [
            OutputPrintingChart::class,
            MonitoringPrintingStats::class,
        ];
    }
}
