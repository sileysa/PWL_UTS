<?php

namespace App\Filament\Resources\UserPOS\Pages;

use App\Filament\Resources\UserPOS\UserPOSResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUserPOS extends ListRecords
{
    protected static string $resource = UserPOSResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
