<?php

namespace App\Filament\Resources\PenjualanDetails\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Models\Penjualan;
use App\Models\Barang;
use Filament\Tables\Filters\SelectFilter;

class PenjualanDetailsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('detail_id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('penjualan.penjualan_kode')
                    ->label('Kode Transaksi')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('barang.barang_nama')
                    ->label('Barang')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('harga')
                    ->label('Harga')
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('jumlah')
                    ->label('Jumlah')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('total_harga')
                    ->label('Total Harga')
                    ->money('IDR')
                    ->getStateUsing(fn($record) => $record->harga * $record->jumlah),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('penjualan_id')
                    ->label('Filter Transaksi')
                    ->options(Penjualan::all()->pluck('penjualan_kode', 'penjualan_id')),
                    //->relationship('penjualan', 'penjualan_id'),
                SelectFilter::make('barang_id')
                    ->label('Filter Barang')
                    ->options(Barang::all()->pluck('barang_nama', 'barang_id')),
                    //->relationship('barang', 'barang_id'),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Edit')
                    ->icon('heroicon-o-pencil'),
                DeleteBulkAction::make()
                    ->label('Delete')
                    ->icon('heroicon-o-trash'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
