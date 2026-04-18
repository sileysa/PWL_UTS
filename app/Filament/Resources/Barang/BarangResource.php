<?php

namespace App\Filament\Resources\Barang;

//use Filament\Forms;
//use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

use App\Filament\Resources\BarangModels\Pages\CreateBarang;
use App\Filament\Resources\BarangModels\Pages\EditBarang;
use App\Filament\Resources\BarangModels\Pages\ListBarang;
use App\Filament\Resources\BarangModels\Schemas\BarangForm;
use App\Filament\Resources\BarangModels\Tables\BarangTable;
use App\Models\Barang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return BarangForm::configure($schema);
        return $schema->components([

            Select::make('kategori_id')
                ->relationship('kategori', 'kategori_nama')
                ->required(),

            TextInput::make('barang_kode')->required(),
            TextInput::make('barang_nama')->required(),

            TextInput::make('harga_beli')
                ->numeric()
                ->required(),

            TextInput::make('harga_jual')
                ->numeric()
                ->required(),
        ]);
    
    }

    public static function table(Table $table): Table
    {
        return BarangTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBarang::route('/'),
            'create' => CreateBarang::route('/create'),
            'edit' => EditBarang::route('/{record}/edit'),
        ];
    }
}