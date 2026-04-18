<?php

namespace App\Filament\Resources\BarangModels;

//use Filament\Forms;
//use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

use App\Filament\Resources\BarangModels\Pages\CreateBarangModel;
use App\Filament\Resources\BarangModels\Pages\EditBarangModel;
use App\Filament\Resources\BarangModels\Pages\ListBarangModels;
use App\Filament\Resources\BarangModels\Schemas\BarangModelForm;
use App\Filament\Resources\BarangModels\Tables\BarangModelsTable;
use App\Models\BarangModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BarangModelResource extends Resource
{
    protected static ?string $model = BarangModel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return BarangModelForm::configure($schema);
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
        return BarangModelsTable::configure($table);
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
            'index' => ListBarangModels::route('/'),
            'create' => CreateBarangModel::route('/create'),
            'edit' => EditBarangModel::route('/{record}/edit'),
        ];
    }
}
