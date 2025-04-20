<?php

namespace App\Filament\Resources\MonitoringDrylamiResource\Pages;

use App\Filament\Resources\MonitoringDrylamiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\MonitoringDrylamiResource\Widgets\OutputDrylamiChart;
use App\Filament\Resources\MonitoringDrylamiResource\Widgets\MonitoringDrylamiStats;

class ListMonitoringDrylamis extends ListRecords
{
    protected static string $resource = MonitoringDrylamiResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }

    public function getHeaderWidgets(): array
    {
        return [
            OutputDrylamiChart::class,
            MonitoringDrylamiStats::class,
        ];
    }
}
