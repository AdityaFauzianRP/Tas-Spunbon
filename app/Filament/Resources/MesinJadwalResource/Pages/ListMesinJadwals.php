<?php

namespace App\Filament\Resources\MesinJadwalResource\Pages;

use App\Filament\Resources\MesinJadwalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMesinJadwals extends ListRecords
{
    protected static string $resource = MesinJadwalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
