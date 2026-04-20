<?php

namespace App\Filament\Resources\Penjualans\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\UserPOS;
use App\Models\Penjualan;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

class PenjualanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('User')
                    ->options(UserPOS::all()->pluck('nama', 'user_id'))
                    //->relationship('user', 'user_id')
                    ->required()
                    ->searchable(),
                TextInput::make('pembeli')
                    ->label('Nama Pembeli')
                    ->maxLength(100)
                    ->required(),
                TextInput::make('penjualan_kode')  
                    ->label('Kode Penjualan')
                    ->maxLength(10)
                    ->unique(ignoreRecord: true)
                    ->default(fn() => 'TRX-' . strtoupper(uniqid()))
                    ->required(),
                DateTimePicker::make('penjualan_tanggal')
                    ->label('Tanggal Penjualan')
                    ->default(now())
                    ->required(),
            ]);
    }
}
