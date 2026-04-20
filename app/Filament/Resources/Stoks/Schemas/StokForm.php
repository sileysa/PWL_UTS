<?php

namespace App\Filament\Resources\Stoks\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\Supplier;
use App\Models\Barang;
use App\Models\UserPOS;

class StokForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('supplier_id')
                    ->label('Supplier')
                    ->options(Supplier::all()->pluck('supplier_nama', 'supplier_id'))
                    //->relationship('supplier', 'supplier_id')
                    ->required()
                    ->searchable(),
                Select::make('barang_id')
                    ->label('Barang')
                    ->options(Barang::all()->pluck('barang_nama', 'barang_id'))
                    //->relationship('barang', 'barang_id')
                    ->required()
                    ->searchable(),
                Select::make('user_id')
                    ->label('User')
                    ->options(UserPOS::all()->pluck('nama', 'user_id'))
                    //->relationship('user', 'user_id')
                    ->required()
                    ->searchable(),
                DateTimePicker::make('stok_tanggal')
                    ->label('Tanggal Stok')
                    ->required()
                    ->default(now()),
                TextInput::make('stok_jumlah')
                    ->label('Jumlah Stok')
                    ->required()
                    ->numeric()
                    ->minValue(1),
            ]);
    }
}
