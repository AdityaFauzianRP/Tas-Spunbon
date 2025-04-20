<?php

namespace App\Filament\Resources\DataPicResource\Pages;

use App\Filament\Resources\DataPicResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDataPic extends CreateRecord
{
    protected static string $resource = DataPicResource::class;

    // kemabli ke halaman sebelumnnya 
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
