<?php

namespace App\Filament\Resources\BarangModels\Pages;

use App\Filament\Resources\BarangModels\BarangModelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBarangModels extends ListRecords
{
    protected static string $resource = BarangModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
