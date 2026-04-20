<?php

namespace App\Filament\Resources\PenjualanDetails\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\Penjualan;
use App\Models\Barang;

class PenjualanDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('penjualan_id')
                    ->label('Penjualan(Kode Transaksi)')
                    ->options(Penjualan::all()->pluck('penjualan_kode', 'penjualan_id'))
                    //->relationship('penjualan', 'penjualan_id')
                    ->required()
                    ->searchable(),
                Select::make('barang_id')
                    ->label('Barang')
                    ->options(Barang::all()->pluck('barang_nama', 'barang_id'))
                    //->relationship('barang', 'barang_id')
                    ->required()
                    ->searchable()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $barang = Barang::find($state);
                            if ($barang) {
                                $set('harga', $barang->harga_jual);
                            }
                        }
                    }),
                TextInput::make('harga')
                    ->label('Harga Satuan')
                    ->required()
                    ->numeric()
                    ->prefix('Rp. ')
                    ->minValue(0),
                TextInput::make('jumlah')
                    ->label('Jumlah')
                    ->required()
                    ->numeric()
                    ->minValue(1),
            ]);
    }
}
