<?php

namespace App\Filament\Resources\Stoks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use App\Models\Stok;
use App\Models\Supplier;
use App\Models\Barang;
use App\Models\UserPOS;

class StoksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('stok_id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('supplier.supplier_nama')
                    ->label('Supplier')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('barang.barang_nama')
                    ->label('Barang')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.nama')
                    ->label('User')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('stok_tanggal')
                    ->label('Tanggal Stok')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                TextColumn::make('stok_jumlah')
                    ->label('Jumlah Stok')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('supplier_id')
                    ->label('Filter Supplier')
                    ->options(Supplier::all()->pluck('supplier_nama', 'supplier_id'))
                    ->relationship('supplier', 'supplier_id'),
                SelectFilter::make('barang_id')
                    ->label('Filter Barang')
                    ->options(Barang::all()->pluck('barang_nama', 'barang_id'))
                    ->relationship('barang', 'barang_id'),
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
