<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('supplier_kode')
                    ->label('Kode Supplier')
                    ->maxLength(10)
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('supplier_nama')
                    ->label('Nama Supplier')
                    ->maxLength(100)
                    ->required(),
                TextInput::make('supplier_alamat')
                    ->label('Alamat Supplier')
                    ->maxLength(255)
                    ->rows(3)
                    ->required(),
            ]);
    }
}
