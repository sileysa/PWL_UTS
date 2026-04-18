<?php

namespace App\Filament\Resources\BarangModels\Pages;

use App\Filament\Resources\BarangModels\BarangModelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBarangModel extends EditRecord
{
    protected static string $resource = BarangModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
