<?php

namespace App\Filament\Resources\DataPicResource\Pages;

use App\Filament\Resources\DataPicResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataPics extends ListRecords
{
    protected static string $resource = DataPicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
