<?php

namespace App\Filament\Resources\BarangModels;

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
