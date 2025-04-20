<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    // kemabli ke halaman sebelumnnya 
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
