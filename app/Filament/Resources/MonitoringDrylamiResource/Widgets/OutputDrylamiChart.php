<?php

namespace App\Filament\Resources\MonitoringDrylamiResource\Widgets;

use App\Models\MesinJadwal;
use Filament\Widgets\LineChartWidget;
use Carbon\Carbon;

class OutputDrylamiChart extends LineChartWidget
{
    protected static ?string $heading = 'Grafik Hasil Bersih (Output)';

    protected int | string | array $columnSpan = 'full';

    protected static ?string $maxHeight = '200px';

    public ?string $filter = '30';

    protected function getFilters(): ?array
    {
        return [
            '7' => '7 hari terakhir',
            '14' => '14 hari terakhir',
            '30' => '30 hari terakhir',
            '60' => '60 hari terakhir',
            '90' => '90 hari terakhir',
        ];
    }

    protected function getData(): array
    {
        $data = MesinJadwal::query()
            ->selectRaw('mesin_jadwal.tanggal, SUM(mesin_jadwal.output) as total_output')
            ->join('mesin', 'mesin_jadwal.mesin_id', '=', 'mesin.id')
            ->where('mesin.nama_mesin', '=', 'DRYLAMI')
            ->whereNotNull('mesin_jadwal.output')
            ->where('mesin_jadwal.tanggal', '>=', Carbon::now()->subDays($this->filter))
            ->groupBy('mesin_jadwal.tanggal')
            ->orderBy('mesin_jadwal.tanggal')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Hasil Bersih',
                    'data' => $data->pluck('total_output'),
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)',
                ],
            ],
            'labels' => $data->pluck('tanggal')->map(function ($date) {
                return Carbon::parse($date)->format('d M');
            }),
        ];
    }
}
