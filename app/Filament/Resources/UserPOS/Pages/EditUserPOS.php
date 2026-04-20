<?php

namespace App\Filament\Resources\UserPOS\Pages;

use App\Filament\Resources\UserPOS\UserPOSResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUserPOS extends EditRecord
{
    protected static string $resource = UserPOSResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
