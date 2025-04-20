<?php

namespace App\Filament\Resources\MesinJadwalResource\Pages;

use App\Filament\Resources\MesinJadwalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMesinJadwal extends EditRecord
{
    protected static string $resource = MesinJadwalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
