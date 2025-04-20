<?php

namespace App\Filament\Resources\PemeriksaanMesinResource\Pages;

use App\Filament\Resources\PemeriksaanMesinResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPemeriksaanMesins extends ListRecords
{
    protected static string $resource = PemeriksaanMesinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
