<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\Kategori;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori_id')
                    ->label('Kategori')
                    ->options(Kategori::all()->pluck('kategori_nama', 'kategori_id'))  
                    //->relationship('kategori', 'kategori_id')
                    ->required(),
                TextInput::make('barang_kode')
                    ->label('Kode Barang')
                    ->maxLength(10)
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('barang_nama')
                    ->label('Nama Barang')
                    ->maxLength(100)
                    ->required(),
                TextInput::make('harga_beli')
                    ->label('Harga Beli')
                    ->required()
                    ->numeric(),
                TextInput::make('harga_jual')
                    ->label('Harga Jual')
                    ->required()
                    ->numeric(),
            ]);
    }
}
