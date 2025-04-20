<?php

namespace App\Filament\Resources\DataPicResource\Pages;

use App\Filament\Resources\DataPicResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataPic extends EditRecord
{
    protected static string $resource = DataPicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
