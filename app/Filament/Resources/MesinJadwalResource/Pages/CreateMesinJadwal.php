<?php

namespace App\Filament\Resources\MesinJadwalResource\Pages;

use App\Filament\Resources\MesinJadwalResource;
use App\Models\MesinJadwal;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateMesinJadwal extends CreateRecord
{
    protected static string $resource = MesinJadwalResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $exists = MesinJadwal::where('mesin_id', $data['mesin_id'])
            ->where('tanggal', $data['tanggal'])
            ->where('jam_mulai', $data['jam_mulai'])
            ->exists();

        if ($exists) {
            Notification::make()
                ->title('Jadwal bentrok!')
                ->body('Sudah ada jadwal untuk mesin ini pada tanggal dan jam mulai tersebut.')
                ->danger()
                ->persistent()
                ->send();

            $this->halt(); // Stop proses create
        }

       
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

}
