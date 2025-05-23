<?php

namespace App\Filament\Resources\DataProsesResource\Pages;

use App\Filament\Resources\DataProsesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDataProses extends CreateRecord
{
    protected static string $resource = DataProsesResource::class;

     // kemabli ke halaman sebelumnnya 
     protected function getRedirectUrl(): string
     {
         return $this->getResource()::getUrl('index');
     }
}
