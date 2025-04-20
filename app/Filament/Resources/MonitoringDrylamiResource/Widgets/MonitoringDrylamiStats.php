<?php

namespace App\Filament\Resources\MonitoringDrylamiResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Carbon;
use App\Models\MesinJadwal;
use Filament\Forms\Components\DatePicker;

class MonitoringDrylamiStats extends BaseWidget
{
    public $startDate;
    public $endDate;

    public function mount()
    {
        $this->startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
    }

    protected function getCards(): array
    {
        $dataRange = MesinJadwal::whereBetween('tanggal', [$this->startDate, $this->endDate])
            ->join('mesin', 'mesin_jadwal.mesin_id', '=', 'mesin.id')
            ->where('mesin.nama_mesin', 'DRYLAMI')
            ->get();

        $totalMeter = $dataRange->sum('qty');
        $totalBersih = $dataRange->sum('output');
        $totalWaste = $totalMeter - $totalBersih;

        $dateRange = Carbon::parse($this->startDate)->format('d M Y') . ' - ' . Carbon::parse($this->endDate)->format('d M Y');

        return [
            Card::make('Quantity (' . $dateRange . ')', number_format($totalMeter))
                ->description('Total meter periode ini')
                ->color('primary'),

            Card::make('Output (' . $dateRange . ')', number_format($totalBersih))
                ->description('Produksi bersih')
                ->color('success'),

            Card::make('Waste (' . $dateRange . ')', number_format($totalWaste))
                ->description('Total waste')
                ->color('danger'),
        ];
    }
}
