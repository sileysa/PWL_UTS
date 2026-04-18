<?php

namespace App\Filament\Resources\BarangModels\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BarangModelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori_id')
                    ->relationship('kategori', 'kategori_id')
                    ->required(),
                TextInput::make('barang_kode')
                    ->required(),
                TextInput::make('barang_nama')
                    ->required(),
                TextInput::make('harga_beli')
                    ->required()
                    ->numeric(),
                TextInput::make('harga_jual')
                    ->required()
                    ->numeric(),
            ]);
    }
}
